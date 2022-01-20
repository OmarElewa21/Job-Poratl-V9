<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

use App\Models\Ranges;
use App\Models\Quiz;
use App\Models\QuizCategory;


class RangesImport implements ToCollection, WithMultipleSheets, WithHeadingRow, WithValidation
{
    use Importable;

    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $counter = 0;
        Ranges::query()->delete();

        foreach ($rows as $row){
            
            if($row['quiz_name'] == 'end_ranges'){
                return true;
            }

            elseif(!is_null($row['quiz_name'])){
                $counter = 0;
                Ranges::create([
                    'quiz_id'       => Quiz::where('name', $row['quiz_name'])->first()->id,
                    'category_id'   => QuizCategory::where('name', $row['category_name'])->first()->id,
                    'range_min_val' => $row['range_min_value'],
                    'range_max_val' => $row['range_max_value'],
                    'result_sign'   => $row['result_sign'],
                    'result_text'   => $row['result_text']
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
            'ranges' => $this,
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
