<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

use App\Models\Skill;
use App\Models\SkillCategoryClass;
use App\Models\QuizCategory;
use App\Models\CategoryClass;

use Exception;


class SkillImport implements ToCollection, WithMultipleSheets, WithHeadingRow, WithValidation
{
    use Importable;


    private function create($rows, $row, $index)
    {
        $skill = new Skill();
        $skill->fill([
            'id'                => $row['id'],
            'name'              => $row['skill_name'],
            'description'       => $row['description']
        ])->save();
        
        if($row['category_name'] == 'start'){
            $total_weight = 0;
            while(true){
                $index++;
                $row = $rows[$index];

                if(is_null($row['category_name'])){
                }

                elseif($row['category_name'] != 'end'){
                    $category = QuizCategory::where('name', $row['category_name'])->first();
                    $weight = $row['class_weight_from_skill'];
                    $total_weight += $weight;
                    if(is_null($category)){
                        throw new Exception('category name does not exist at row number' . ($index+2) . $row['category_name']);
                    }

                    if($row['class_name'] == 'start'){
                        while(true){
                            $index++;
                            $row = $rows[$index];

                            if(is_null($row['class_name'])){
                            }

                            elseif($row['class_name'] != 'end'){
                                if(
                                    !CategoryClass::where('name', $row['class_name'])->exists() ||
                                    !CategoryClass::where('category_id', $category->id)->where('name', $row['class_name'])->exists()
                                    ){
                                    $class = new CategoryClass();
                                    $class->fill([
                                        'category_id'   => $category->id,
                                        'name'          => $row['class_name']
                                    ])->save();
                                }else{
                                    $class = CategoryClass::where('category_id', $category->id)->where('name', $row['class_name'])->first();
                                }

                                SkillCategoryClass::create([
                                    'skill_id'                => $skill->id,
                                    'class_name'                => $class->name,
                                    'min_score_percentage'    => $row['min_score_percentage'],
                                    'max_score_percentage'    => $row['max_score_percentage'],
                                    'class_weight_from_skill' => $weight
                                ]);
                            }

                            else{
                                break;
                            }
                        }

                    }else{
                        throw new Exception('declaration of category name without starting class insertion ' . ($index+2));
                    }
                }
                else{
                    break;
                }
            }
            if($total_weight != 100 && $total_weight != 0){
                throw new Exception('sum of category weights of skill ' . ($skill->name)  . ' is not equal to 100');
            }
        }else{
            return true;
        }
    }


    private function update($rows, $row, $index)
    {
        $skill = Skill::find($row['id']);
        $skill->update([
            'name'              => $row['skill_name'],
            'description'       => $row['description']
        ]);
        $skill->SkillCategoryClasses()->delete();

        if($row['category_name'] == 'start'){
            $total_weight = 0;
            while(true){
                $index++;
                $row = $rows[$index];

                if(is_null($row['category_name'])){
                }

                elseif($row['category_name'] != 'end'){
                    $category = QuizCategory::where('name', $row['category_name'])->first();
                    $weight = $row['class_weight_from_skill'];
                    $total_weight += $weight;
                    if(is_null($category)){
                        throw new Exception('category name does not exist at row number' . ($index+2) . $row['category_name']);
                    }
                    
                    if($row['class_name'] == 'start'){
                        while(true){
                            $index++;
                            $row = $rows[$index];

                            if(is_null($row['class_name'])){
                            }

                            elseif($row['class_name'] != 'end'){
                                if(
                                    !CategoryClass::where('name', $row['class_name'])->exists() ||
                                    !CategoryClass::where('category_id', $category->id)->where('name', $row['class_name'])->exists()
                                    ){
                                    $class = new CategoryClass();
                                    $class->fill([
                                        'category_id'   => $category->id,
                                        'name'          => $row['class_name']
                                    ])->save();
                                }else{
                                    $class = CategoryClass::where('category_id', $category->id)->where('name', $row['class_name'])->first();
                                }
                                SkillCategoryClass::create([
                                    'skill_id'                => $skill->id,
                                    'class_name'                => $class->name,
                                    'min_score_percentage'    => $row['min_score_percentage'],
                                    'max_score_percentage'    => $row['max_score_percentage'],
                                    'class_weight_from_skill' => $weight
                                ]);
                            }

                            else{
                                break;
                            }
                        }

                    }else{
                        throw new Exception('declaration of category name without starting class insertion ' . ($index+2));
                    }
                }
                else{
                    break;
                }
            }
            if($total_weight != 100 && $total_weight != 0){
                throw new Exception('sum of category weights of skill ' . ($skill->name)  . ' is not equal to 100');
            }
        }else{
            return true;
        }
    }


    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $counter = 0;
        foreach ($rows as $index=>$row){

            if($row['id'] == 'end_skills'){
                return true;
            }

            elseif(!is_null($row['id'])){
                $counter = 0;

                if(Skill::where('id', $row['id'])->exists()){
                    $this->update($rows, $row, $index);
                }
                else
                {
                    $this->create($rows, $row, $index);
                }
            }

            elseif(is_null($row['id'])){
                $counter++;
            }

            if($counter==300){
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
            'skills' => $this,
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
