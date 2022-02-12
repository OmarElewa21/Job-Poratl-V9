<?php

namespace App\Http\Controllers;

use App\Models\CategoryClass;
use App\Models\CategoryCombinations;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizTakeAnswers;
use App\Models\QuizUser;
use App\Models\QuizGrade;
use App\Models\Ranges;
use App\Models\Guest;
use App\Models\User;
use App\Models\QuizClassGrade;
use App\Models\QuizQuizCategory;
use Exception;

class QuizTakeAnswersController extends Controller
{
    private function is_sibling($quizGrade1, $quizGrade2){
        if(count($quizGrade1->category->parent_category) == 0){
            return false;
        }
        $category_siblings = $quizGrade1->category->parent_category[0]->sub_categories;
        foreach($category_siblings as $sibling){
            if($sibling->id == $quizGrade2->category->id){
                return true;
            }
        }
        return false;
    }


    private function siblings_sorting($quizGrades = []){
        $quizGradesSiblingsSorting = [];
        foreach($quizGrades as $index=>$quizGrade){
            if($index == 0){
                $quizGradesSiblingsSorting[$index][] = $quizGrade;
            }
            else{
                if($quizGrade->category->is_first_parent){
                    $quizGradesSiblingsSorting[$index][] = $quizGrade;
                }
                else{
                    $added = false;
                    foreach($quizGradesSiblingsSorting as $i=>$q){
                        if($this->is_sibling($q[0], $quizGrade)){
                            $quizGradesSiblingsSorting[$i][] = $quizGrade;
                            $added = true;
                        }
                    }
                    if(!$added){
                        $quizGradesSiblingsSorting[$index][] = $quizGrade;
                    }
                }
            }
        }
        return $this->quizGradeCategoryCombinationsStoring(array_values($quizGradesSiblingsSorting));
    }


    private function quizGradeCategoryCombinationsStoring($quizGradesSiblingsSorting = []){
        $quizGrades = [];
        foreach($quizGradesSiblingsSorting as $quizGradesSiblingsSortingItem){
            if(sizeof($quizGradesSiblingsSortingItem) > 1){
                $category_ids = [];
                $signs = [];
                foreach($quizGradesSiblingsSortingItem as $Item){
                    $category_ids[] = $Item->category->id;
                    $signs[]        = $Item->result_sign;
                }
                sort($category_ids);
                sort($signs);
                $categoryCombination = CategoryCombinations::where('quiz_id', $Item->quiz_id)->where('category_ids', implode(',', $category_ids))->where('signs', implode(',', $signs))->first();                
                if(!is_null($categoryCombination)){
                    if( 
                        QuizGrade::where('quiz_id', $Item->quiz_id)
                        ->where('guest_id', $Item->guest_id)
                        ->where('user_id', $Item->user_id)
                        ->where('category_id', $categoryCombination->parent_category_id)
                        ->where('take_number', $Item->take_number)
                        ->exists()
                    ){
                        $quizGrade = QuizGrade::where('quiz_id', $Item->quiz_id)
                        ->where('guest_id', $Item->guest_id)
                        ->where('user_id', $Item->user_id)
                        ->where('category_id', $categoryCombination->parent_category_id)
                        ->where('take_number', $Item->take_number)
                        ->first();
                    }
                    else{
                        $quizGrade = new QuizGrade();
                        $quizGrade->fill([
                            'quiz_id'       => $Item->quiz_id,
                            'guest_id'      => $Item->guest_id,
                            'user_id'       => $Item->user_id,
                            'category_id'   => $categoryCombination->parent_category_id,
                            'result_sign'   => $categoryCombination->result_sign,
                            'result_text'   => $categoryCombination->result_meaning,
                            'take_number'   => $Item->take_number,
                            'show'          => 1
                        ])->save();

                        if(!CategoryClass::where('category_id', $categoryCombination->parent_category_id)->where('name', $categoryCombination->result_sign)->exists()){
                            $class = new CategoryClass();
                            $class->fill([
                                'category_id'      => $categoryCombination->parent_category_id,
                                'name'             => $categoryCombination->result_sign
                            ])->save();    
                        }
                        else{
                            $class  = CategoryClass::where('category_id', $categoryCombination->parent_category_id)->where('name', $categoryCombination->result_sign)->first();
                        }
                        QuizClassGrade::create([
                            'quiz_id'           => $Item->quiz_id,
                            'class_id'          => $class->id,
                            'guest_id'          => $Item->guest_id,
                            'user_id'           => $Item->user_id,
                            'take_number'       => $Item->take_number,
                            'is_parent_class'   => 1
                        ]);

                        $quizGrades[] = $quizGrade;
                    }
                }
                else{
                    foreach($quizGradesSiblingsSortingItem as $item){
                        $quizGrades[] = $item;
                    }
                }
            }
            else{
                foreach($quizGradesSiblingsSortingItem as $item){
                    $quizGrades[] = $item;
                }
            }
        }
        return $quizGrades;
    }


    private function getQuizGrades($__quizGrades = [])
    {
        $quizGrades = $this->siblings_sorting($__quizGrades);
        $check = $quizGrades;
        while(true){
            $quizGrades = $this->siblings_sorting($__quizGrades);
            if($quizGrades == $check){
                break;
            }
            else{
                $check = $quizGrades;
            }
        }
        return $quizGrades;
    }


    private function quiz_grades($quiz_id, $user_id, $take_number, $is_guest=false){
        if($is_guest){
            $quiz_answers = QuizTakeAnswers::where('quiz_id', $quiz_id)
                ->where('guest_id', $user_id)
                ->where('take_number', $take_number)->with('question', 'answer')->get();
        }
        else{
            $quiz_answers = QuizTakeAnswers::where('quiz_id', $quiz_id)
                ->where('user_id', $user_id)
                ->where('take_number', $take_number)->with('question', 'answer')->get();
        }
        $categories = [];
        foreach($quiz_answers as $q_answer){
            $category_id  = $q_answer->question->category->id;
            if(array_key_exists($category_id, $categories)){
                $categories[$category_id] += $q_answer->answer->answer_weight;
            }else{
                $categories[$category_id] = $q_answer->answer->answer_weight;
            }
        }
        foreach($categories as $category_id=>$score){
            $range = Ranges::where('quiz_id', $quiz_id)
                    ->where('category_id', $category_id)
                    ->where('range_min_val', '<=', $score)
                    ->where('range_max_val', '>=', $score)
                    ->first();
            QuizGrade::create([
                'quiz_id'           => $quiz_id,
                'user_id'           => $is_guest ? null : $user_id,
                'guest_id'          => $is_guest ? $user_id: null,
                'category_id'       => $category_id,
                'category_grade'    => $score,
                'category_percentage' => $score > 0 ? $score/$range->range_max_val *100 : $score/$range->range_min_val *100,
                'take_number'       => $take_number,
                'result_sign'       => $range->result_sign,
                'result_text'       => $range->result_text,
                'show'              => 1
            ]);

            if(!CategoryClass::where('category_id', $category_id)->where('name', $range->result_sign)->exists()){
                $class = new CategoryClass();
                $class->fill([
                    'category_id'      => $category_id,
                    'name'             => $range->result_sign
                ])->save();    
            }
            else{
                $class  = CategoryClass::where('category_id', $category_id)->where('name', $range->result_sign)->first();
            }
            $max_score = abs($range->range_max_val) < abs($range->range_min_val) ?  $range->range_min_val : $range->range_max_val;
            QuizClassGrade::create([
                'quiz_id'           => $quiz_id,
                'class_id'          => $class->id,
                'user_id'           => $is_guest ? null : $user_id,
                'guest_id'          => $is_guest ? $user_id: null,
                'take_number'       => $take_number,
                'score'             => $score,
                'max_score'         => $max_score,
                'score_percentage'  => $score/$max_score * 100
            ]);
        }
    }


    public function take_quiz($quiz_name){
        $quiz = Quiz::where('name', $quiz_name)
            ->with(['quiz_categories' => function($q){
                $q->inRandomOrder();
            }])->first();
        if(!$quiz->enable_guests){
            if(!auth()->check() || auth()->user()->roles[0]->id == 2){
                abort(403, 'You are not allowed to view or take this quiz');
            }
            $quizUser = QuizUser::where('quiz_id', $quiz->id)->where('user_id', auth()->id())->first();
            if(auth()->user()->roles[0]->id != 1){
                if(is_null($quizUser) || !$quizUser->is_assigned){
                    abort(403, 'You are not allowed to view or take this quiz');
                }
            }
        }
        $questions = [];
        foreach($quiz->quiz_categories as $quiz_category){
            $questions = array_merge(
                $questions,
                json_decode(QuizQuestion::where('category_id', $quiz_category->id)
                            ->inRandomOrder()
                            ->take($quiz_category->pivot->n_questions)
                            ->with('answers')
                            ->get(), true)
            );
        }
        shuffle($questions);
        if($quiz->horizontal_display){
            return view('candidate.quiz_take.load_quiz_horizontal_display', compact('quiz', 'questions'));
        }else{
            return view('candidate.quiz_take.load_quiz', compact('quiz', 'questions'));
        }
    }


    public function results($quiz_id, $user_id, $is_guest, $take_number){
        if($is_guest){
            $__quiz_grades =  QuizGrade::where('quiz_id', $quiz_id)
                ->where('guest_id', $user_id)
                ->where('take_number', $take_number)
                ->where('show', 1)->with('category')->get();
        }else{
            $__quiz_grades = QuizGrade::where('quiz_id', $quiz_id)
                ->where('user_id', $user_id)
                ->where('take_number', $take_number)
                ->where('show', 1)->with('category')->get();
        }
        return $this->getQuizGrades($__quiz_grades);        
    }


    public function show_results($quiz_id, $user_id, $is_guest, $take_number){
        if($is_guest){
            $name = Guest::find($user_id)->name;
        }else{
            $user = User::find($user_id);
            $name = $user->first_name . ' ' . $user->last_name;
        }

        for($i = 0; $i<2; $i++){
            $quiz_grades = $this->results($quiz_id, $user_id, $is_guest, $take_number);
        }

        if($is_guest){
            $all_quiz_grades = QuizGrade::where('quiz_id', $quiz_id)
                                    ->where('guest_id', $user_id)
                                    ->where('take_number', $take_number)
                                    ->get();
        }else{
            $all_quiz_grades = QuizGrade::where('quiz_id', $quiz_id)
                                    ->where('user_id', $user_id)
                                    ->where('take_number', $take_number)
                                    ->with('category')
                                    ->get();
        }
        
        return view('candidate.quiz_take.show_results', compact('quiz_grades', 'all_quiz_grades', 'name'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return redirect back
     */
    public function store_quiz($quiz_id, Request $request)
    {
        try{
            $guest = null;
            if(!is_null($request->email)){
                if(Guest::where('email', $request->email)->exists()){
                    $guest = Guest::where('email', $request->email)->first();
                }
                else{
                    $guest = new Guest();
                    $guest->fill([
                        'name'  => $request->name,
                        'email' => $request->email
                    ])->save();
                }
            }

            if(!is_null($guest) && QuizTakeAnswers::where('quiz_id', $quiz_id)->where('guest_id', $guest->id)->exists()){
                $take_number = QuizTakeAnswers::where('quiz_id', $quiz_id)->where('guest_id', $guest->id)->latest()->first()->take_number + 1;
            }
            elseif(auth()->check() && QuizTakeAnswers::where('quiz_id', $quiz_id)->where('user_id', auth()->id())->exists()){
                $take_number = QuizTakeAnswers::where('quiz_id', $quiz_id)->where('user_id', auth()->id())->latest()->first()->take_number + 1;
            }
            else{
                $take_number = 0;
            }

            foreach($request->question as $question_id=>$answer_id){
                QuizTakeAnswers::create([
                    'quiz_id'       => $quiz_id,
                    'question_id'   => $question_id,
                    'answer_id'     => $answer_id,
                    'user_id'       => is_null($guest) ? auth()->id() : null,
                    'guest_id'      => is_null($guest) ? null : $guest->id,
                    'take_number'   => $take_number
                ]);
            }

            if(is_null($guest)){
                $this->quiz_grades($quiz_id, auth()->id(), $take_number);
                QuizUser::where('quiz_id', $quiz_id)
                    ->where('user_id', auth()->id())
                    ->where('is_pending', 1)
                    ->update([
                        'is_pending'    => 0,
                        'take_number'   => $take_number
                    ]);
                return redirect()->route('quiz_results', [
                    'quiz_id'       => $quiz_id,
                    'user_id'       => auth()->id(),
                    'is_guest'      => 0,
                    'take_number'   => $take_number
                ]);

            }else{
                $this->quiz_grades($quiz_id, $guest->id, $take_number, true);
                return redirect()->route('quiz_results', [
                    'quiz_id'       => $quiz_id,
                    'user_id'       => $guest->id,
                    'is_guest'      => 1,
                    'take_number'   => $take_number
                ]);
            }
            
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }
}
