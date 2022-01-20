<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

use App\Models\Quiz;
use App\Models\QuizCategory;
use App\Models\QuizQuestion;
use App\Models\QuizQuizCategory;

use Exception;


class QuizImport implements ToCollection, WithMultipleSheets, WithHeadingRow, WithValidation
{

    use Importable;


    private function create($rows, $row, $index){
        $quiz = new Quiz();
        $quiz->fill([
            'id'                => $row['id'],
            'name'              => $row['quiz_name'],
            'description'       => $row['description'],
        ])->save();

        if($row['categories'] == 'start'){
            while(true){
                $index++;
                $row = $rows[$index];
                if($row['categories'] != 'end'){
                    $category = QuizCategory::where('name', $row['categories'])->first();
                    $question = QuizQuestion::where('category_id', $category->id)->first();
                    QuizQuizCategory::create([
                        'quiz_id'       => $quiz->id,
                        'category_id'   => $category->id,
                        'n_questions'   => $row['n_questions'],
                        'min_score'     => $question->min_answer_weight * $row['n_questions'],
                        'max_score'     => $question->max_answer_weight * $row['n_questions'],
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
        $quiz = Quiz::find($row['id']);

        $quiz->fill([
            'id'                => $row['id'],
            'name'              => $row['quiz_name'],
            'description'       => $row['description'],
        ])->save();
        
        $quiz->quiz_quiz_categories()->delete();

        if($row['categories'] == 'start'){
            while(true){
                $index++;
                $row = $rows[$index];
                if($row['categories'] != 'end'){
                    $category = QuizCategory::where('name', $row['categories'])->first();
                    $question = QuizQuestion::where('category_id', $category->id)->first();
                    QuizQuizCategory::create([
                        'quiz_id'       => $quiz->id,
                        'category_id'   => $category->id,
                        'n_questions'   => $row['n_questions'],
                        'min_score'     => $question->min_answer_weight * $row['n_questions'],
                        'max_score'     => $question->max_answer_weight * $row['n_questions'],
                    ]);
                }
                else{
                    break;
                }
            }
        }
        else{
            throw new Exception('No start answers found for question in row number ' . ($index+2));
        }
    }

    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        $counter = 0;
        foreach ($rows as $index=>$row){

            if($row['id'] == 'end_quizzes'){
                return true;
            }

            elseif(!is_null($row['quiz_name'])){
                $counter = 0;

                if(Quiz::where('id', $row['id'])->exists()){
                    $this->update($rows, $row, $index);
                }
                else{
                    $this->create($rows, $row, $index);
                }
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
            'quizzes' => $this,
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
