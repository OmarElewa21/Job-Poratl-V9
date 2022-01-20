<?php

namespace App\Http\Controllers;

use App\Models\QuizUser;

use Exception;

class QuizTakeController extends Controller
{
    /**
     * Display a listing pending quizzes.
     *
     * @return list of pending quizzes
     */
    public function show_pending_quizzes(){
        try{
            $quizzes = QuizUser::where('user_id', auth()->id())->where('is_pending', 1)->with('quiz')->get();
            $sectionName = 'pending_quizzes';
            return view('candidate.quiz_take.index_pending', compact('quizzes', 'sectionName'));
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }

    /**
     * Display a listing taken quizzes.
     *
     * @return list of taken quizzes
     */
    public function show_taken_quizzes(){
        try{
            $quizzes = QuizUser::where('user_id', auth()->id())->where('is_pending', 0)->with('quiz')->get();
            $pending_quizzes = QuizUser::where('user_id', auth()->id())->where('is_pending', 1)->count();
            $sectionName = 'taken_quizzes';
            return view('candidate.quiz_take.index_taken', compact('quizzes', 'sectionName', 'pending_quizzes'));
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }
}
