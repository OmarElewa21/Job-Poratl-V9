<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

use App\Models\QuizQuestion;
use App\Models\QuizCategory;
use App\Models\QuizQuestionAnswer;

use Exception;

class QuizQuestionImport implements ToCollection, WithMultipleSheets, WithHeadingRow 
{
    use Importable;


    private function create($rows, $row, $index){
        $question = new QuizQuestion();
        $category_id = QuizCategory::where('name', $row['category_name'])->first()->id;
        $question->fill([
            'id'                => $row['id'],
            'question_text'     => $row['question'],
            'is_checkbox'       => $row['is_checkbox'],
            'category_id'       => $category_id,
            'min_answer_weight' => $row['min_answer_weight'],
            'max_answer_weight' => $row['max_answer_weight'],
        ])->save();

        if($row['answer'] == 'start'){
            while(true){
                $index++;
                $row = $rows[$index];
                if($row['answer'] != 'end'){
                    QuizQuestionAnswer::create([
                        'question_id'   => $question->id,
                        'answer_text'   => $row['answer'],
                        'answer_weight' => $row['answer_weight'],
                        'order'         => $row['order']
                    ]);
                }
                else{
                    break;
                }
            }
        }
        else{
            throw new Exception('No start answers found for question in row number ' . $index);
        }
    }


    private function update($rows, $row, $index){
        $question = QuizQuestion::find($row['id']);

        $category_id = QuizCategory::where('name', $row['category_name'])->first()->id;
        $question->fill([
            'question_text'     => $row['question'],
            'is_checkbox'       => $row['is_checkbox'],
            'category_id'       => $category_id,
            'min_answer_weight' => $row['min_answer_weight'],
            'max_answer_weight' => $row['max_answer_weight'],
        ])->save();

        $question->answers()->delete();

        if($row['answer'] == 'start'){
            while(true){
                $index++;
                $row = $rows[$index];
                if($row['answer'] != 'end'){
                    QuizQuestionAnswer::create([
                        'question_id'   => $question->id,
                        'answer_text'   => $row['answer'],
                        'answer_weight' => $row['answer_weight'],
                        'order'         => $row['order']
                    ]);
                }
                else{
                    break;
                }
            }
        }
        else{
            throw new Exception('No start answers found for question in row number ' . $index);
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
            if($row['id'] == 'end_questions'){
                return true;
            }

            elseif(!is_null($row['question'])){
                $counter = 0;

                if(QuizQuestion::where('id', $row['id'])->exists())
                {
                    $this->update($rows, $row, $index);
                }
                else
                {
                    $this->create($rows, $row, $index);
                }
            }

            elseif(is_null($row['question'])){
                $counter++;
            }

            if($counter==100){
                return true;
            }
        }
    }


    public function sheets(): array
    {
        return [
            'questions'  => $this,
        ];
    }


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
