<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;


use App\Models\CategoryCombinations;
use App\Models\Quiz;
use App\Models\QuizCategory;


class CategoryCombinationsImport implements ToCollection, WithMultipleSheets, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        $counter = 0;
        CategoryCombinations::query()->delete();

        foreach ($rows as $row){
            
            if($row['quiz_name'] == 'end_combinations'){
                return true;
            }

            elseif(!is_null($row['quiz_name'])){
                $counter = 0;
                $category_names = explode(',', $row['category_names']);
                $category_ids = [];
                foreach($category_names as $name){
                    $category_ids[] = QuizCategory::where('name', $name)->first()->id;
                }
                sort($category_ids);
                $__signs = explode(',', $row['signs']);
                sort($__signs);
                $signs = implode(',', $__signs);

                CategoryCombinations::create([
                    'quiz_id'               => Quiz::where('name', $row['quiz_name'])->first()->id,
                    'category_ids'          => implode(',', $category_ids),
                    'signs'                 => $signs,
                    'parent_category_id'    => QuizCategory::where('name', $row['parent_category_name'])->first()->id,
                    'result_sign'           => $row['result_sign'],
                    'result_meaning'        => $row['result_meaning']
                ]);
            }

            elseif(is_null($row['quiz_name'])){
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
            'category_combinations' => $this,
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
