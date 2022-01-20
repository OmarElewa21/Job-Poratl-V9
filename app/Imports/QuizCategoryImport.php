<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

use App\Models\QuizCategory;
use App\Models\QuizCategoryRelations;
use App\Models\CategoryClass;

use Exception;


class QuizCategoryImport implements ToCollection, WithMultipleSheets, WithHeadingRow, WithValidation
{
    use Importable;

    /**
     * @param row
     * 
     */
    private function create($rows, $row, $index){
        $category = new QuizCategory;
        $category->fill([
            'id'                => $row['id'],
            'name'              => $row['name'],
            'description'       => $row['description'],
            'is_first_parent'   => $row['is_sub_category'] ? 0 : 1,
        ])->save();

        if($row['is_sub_category']){
            QuizCategoryRelations::create([
                'parent_category_id' => QuizCategory::where('name', $row['parent_category'])->first()->id,
                'sub_category_id'    => $category->id
            ]);
        }

        if($row['has_classes']){
            if($row['class_names'] == 'start'){
                while(true){
                    $index++;
                    $row = $rows[$index];
                    if($row['class_names'] != 'end'){
                        CategoryClass::create([
                            'category_id'  => $category->id,
                            'name'         => $row['class_names']
                        ]);
                    }
                    else{
                        break;
                    }
                }
            }
            else{
                throw new Exception('No start string found while has_classes is 1 at row  ' . ($index+2));
            }   
        }
    }


    private function update($rows, $row, $index){
        $category = QuizCategory::find($row['id']);

        $category->fill([
            'name'              => $row['name'],
            'description'       => $row['description'],
            'is_first_parent'   => $row['is_sub_category'] ? 0 : 1,
        ])->save();

        QuizCategoryRelations::where('sub_category_id', $category->id)->delete();

        if($row['is_sub_category']){
            QuizCategoryRelations::create([
                'parent_category_id' => QuizCategory::where('name', $row['parent_category'])->first()->id,
                'sub_category_id'    => $category->id
            ]);
        }

        if($row['has_classes']){
            if($row['class_names'] == 'start'){
                $category->classes()->delete();
                while(true){
                    $index++;
                    $row = $rows[$index];
                    if($row['class_names'] != 'end'){
                        CategoryClass::create([
                            'category_id'  => $category->id,
                            'name'         => $row['class_names']
                        ]);
                    }
                    else{
                        break;
                    }
                }
            }
            else{
                throw new Exception('No start string found while has_classes is 1 at row  ' . ($index+2));
            }
        }
    }


    /**
     * @param array $row
     *
     * @return 
     */
    public function collection(Collection $rows)
    {
        $counter = 0;
        foreach ($rows as $index=>$row){

            if($row['id'] == 'end_categories'){
                return true;
            }

            elseif(!is_null($row['name'])){
                $counter = 0;

                if(QuizCategory::where('id', $row['id'])->exists()){
                    $this->update($rows, $row, $index);
                }
                else{
                    $this->create($rows, $row, $index);
                }
            }

            elseif(is_null($row['name'])){
                $counter++;
            }

            if($counter==100){
                return true;
            }
        }        
    }

    /**
     * Specify sheet name
     */
    public function sheets(): array
    {
        return [
            'categories' => $this,
        ];
    }

    /**
     * Specifiy heading row number
     */
    public function headingRow(): int
    {
        return 1;
    }

    
    public function rules(): array
    {
        return [
            // '1' => Rule::in(['patrick@maatwebsite.nl']),

            //  // Above is alias for as it always validates in batches
            //  '*.1' => Rule::in(['patrick@maatwebsite.nl']),
             
            //  // Can also use callback validation rules
            //  '0' => function($attribute, $value, $onFailure) {
            //       if ($value !== 'Patrick Brouwers') {
            //            $onFailure('Name is not Patrick Brouwers');
            //       }
            //   }
        ];
    }
}
