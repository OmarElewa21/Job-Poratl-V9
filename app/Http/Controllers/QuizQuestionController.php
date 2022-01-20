<?php

namespace App\Http\Controllers;

use App\Models\QuizCategory;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\QuizQuestionAnswer;
use App\Models\CategoryClass;
use Exception;
use Illuminate\Support\Facades\View;


class QuizQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index(Request $request){
        if(is_null($request->input('category_id'))){
            return response("category id is unspecified", 500);
        }
        try{
            $category = QuizCategory::where('id', $request->input('category_id'))->with('category_questions')->first();
            return view('Quiz.Category.Question.index', compact('category'));
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Illuminate\Support\Facades\View
     */
    public function create(Request $request){ 
        if(is_null($request->input('category_id'))){
            return response("category id is unspecified", 500);
        }
        $first_question = count(QuizCategory::find($request->input('category_id'))->category_questions) == 0 ? true : false;
        return View::make('Quiz.Category.Question.add_modal', [
            'category_id'       => $request->input('category_id'),
            'first_question'    => $first_question
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_text' => 'required',
            'category_id'   => 'required',
        ]);

        $newQuestion = new QuizQuestion();
        $newAnswer = new QuizQuestionAnswer();
        try{
            $newQuestion->fill([
                'category_id' => $request->category_id,
                'question_text' => $request->question_text,
                'is_checkbox' => $request->is_checkbox == 'on' ? 1 : 0,
                'min_answer_weight' => min( $request->answer_weight),
                'max_answer_weight' =>  max( $request->answer_weight)
            ])->save();
            
            if(!is_null($request->class)){
                $category = QuizCategory::find($request->category_id);
                $category->classes()->delete();
                foreach($request->class as $class){
                    CategoryClass::create([
                        'category_id'  => $category->id,
                        'name'         => $class
                    ]);
                }
            }

            foreach($request->answer_text as $index=>$value){
                $newAnswer->create([
                    'question_id'   => $newQuestion->id,
                    'answer_text'   => $value,
                    'answer_weight' => $request->answer_weight[$index],
                    'order'         => $request->order[$index]
                ])->save();
            }
            return response("Successfully Created New Question", 200);
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit($question_id)
    {
        $question = QuizQuestion::where('id', $question_id)->with('answers')->first();
        return View::make('Quiz.Category.Question.edit_modal', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return back
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'question_text' => 'required',
            'question_id'   => 'required',
        ]);

        $question = QuizQuestion::find($id);
        $question->answers()->delete();
        try{
            $question->update([
                'question_text' => $request->question_text,
                'is_checkbox' => $request->is_checkbox == 'on' ? 1 : 0,
                'min_answer_weight' => min( $request->answer_weight),
                'max_answer_weight' =>  max( $request->answer_weight)
            ]);

            foreach($request->answer_text as $index=>$value){
                QuizQuestionAnswer::create([
                    'question_id' => $id,
                    'answer_text' => $value,
                    'answer_weight' => $request->answer_weight[$index],
                    'order'         => $request->order[$index]
                ])->save();
            }
            return response("Question updated successfully", 200);

        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            QuizQuestion::find($id)->forceDelete();
            return response("Question deleted successfully", 200);

        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
        
    }
}
