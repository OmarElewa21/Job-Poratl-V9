<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use DB;
use Exception;
use Illuminate\Http\Request;
use App\Models\QuizQuestion;
use App\Models\QuizCategory;
use Illuminate\Support\Facades\File;
use App\Models\QuizQuizCategory;
use App\Models\Ranges;
use Illuminate\Support\Facades\View;

use App\Imports\QuizImport;
use App\Imports\RangesImport;
use App\Imports\CategoryCombinationsImport;
use App\Mail\SendQuizNotification;
use App\Models\CategoryCombinations;
use App\Models\QuizDefaultSkills;
use App\Models\QuizGrade;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Skill;
use App\Models\User;
use App\Models\Guest;
use App\Models\QuizClassGrade;
use App\Models\QuizTakeAnswers;
use App\Models\QuizUser;

use Illuminate\Support\Facades\Mail;

class QuizController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::with('quiz_categories', 'quiz_candidate_takers', 'quiz_guests_takers')->get();
        return view('Quiz.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Illuminate\Support\Facades\View
     */
    public function create(){
        try{
            $categories = QuizCategory::HasQuestions()->get();
            return View::make('Quiz.add_modal', compact('categories'));
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return back or error
     */
    public function store(Request $request)
    {
        $quiz = new Quiz();
        foreach($request->categories as $index=>$category_id){
            $category = QuizCategory::find($category_id);
            if($request->n_questions[$index] > count($category->category_questions)){
                return response("Category " . $category->name . " has no more than " . count($category->category_questions) . " questions in it - Please add more questions to the category first", 500);
            }
        }
        if(Quiz::where('name', $request->name)->exists()){
            return response("Quiz name is repeated, please enter different quiz name", 500);
        }

        $quiz->fill([
            'name'          => $request->name,
            'description'   => $request->description,
            'enable_guests'  => $request->allow_guests == 'on' ? 1 : 0,
            'horizontal_display'    => $request->horizontal_display == 'on' ? 1 : 0
        ])->save();

        foreach($request->categories as $index=>$category_id){
            try{
                $question = QuizQuestion::where('category_id', $category_id)->first();
                QuizQuizCategory::create([
                    'quiz_id'       => $quiz->id,
                    'category_id'   => $category_id,
                    'n_questions'   => $request->n_questions[$index],
                    'min_score'     => $question->min_answer_weight * $request->n_questions[$index],
                    'max_score'     => $question->max_answer_weight * $request->n_questions[$index],
                    'show'          => array_key_exists($category_id, $request->show) ? 0 : 1
                ]);
            }catch (Exception $e){
                $quiz->delete();
                return response($e->getMessage(), 500);
            }
        }
        return response("Quiz Created Successfully", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);
        $listOfQuizQuestion = QuizQuestion::where('quiz_id', $id)->with('question_answers')->get();
        return view('quizzes.questions.index', [
            'questionsList' => $listOfQuizQuestion,
            'quiz_name' => $quiz->name,
            'quiz_id' => $quiz->id,
            'disable_delete' => $quiz->disable_delete
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $quiz = Quiz::where('id', $id)->with('quiz_categories')->firstOrFail();
            $categories = QuizCategory::HasQuestions()->get();
            return View::make('Quiz.edit_modal', compact('quiz', 'categories'));
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quiz = Quiz::find($id);
        foreach($request->categories as $index=>$category_id){
            $category = QuizCategory::find($category_id);
            if($request->n_questions[$index] > count($category->category_questions)){
                return response("Category " . $category->name . " has no more than " . count($category->category_questions) . " questions in it - Please add more questions to the category first", 500);
            }
        }

        $quiz->update([
            'name'                  => $request->name,
            'description'           => $request->description,
            'enable_guests'         => $request->allow_guests == 'on' ? 1 : 0,
            'horizontal_display'    => $request->horizontal_display == 'on' ? 1 : 0,
        ]);

        try{
            $quiz->pivotModels()->delete();
            foreach($request->categories as $index=> $category_id){
                $question = QuizQuestion::where('category_id', $category_id)->first();
                QuizQuizCategory::create([
                    'quiz_id'       => $quiz->id,
                    'category_id'   => $category_id,
                    'n_questions'   => $request->n_questions[$index],
                    'min_score'     => $question->min_answer_weight * $request->n_questions[$index],
                    'max_score'     => $question->max_answer_weight * $request->n_questions[$index],
                    'show'          => (!is_null($request->show) && array_key_exists($category_id, $request->show)) ? 0 : 1
                ]);
            }
            return response("Quiz Updated Successfully", 200);
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Quiz::find($id)->delete();
            return response("Quiz deleted Successfully", 200);
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }

    public function add_range($quiz_id, $category_id){
        $quiz = Quiz::where('id', $quiz_id)->with(['quiz_categories' => function ($query) use($category_id){
            $query->where('id', $category_id);
        }])->first();
        $ranges = Ranges::where('quiz_id', $quiz_id)->where('category_id', $category_id)->get();
        return view('Quiz.add_ranges', compact('quiz', 'ranges'));
    }


    public function store_range($quiz_id, $category_id, Request $request){
        try {
            Ranges::where('quiz_id', $quiz_id)->where('category_id', $category_id)->delete();
            foreach($request->result_sign as $index=>$sign){
                Ranges::create([
                    'quiz_id' => $quiz_id,
                    'category_id' => $category_id,
                    'range_min_val' => $request->range_min[$index],
                    'range_max_val' => $request->range_max[$index],
                    'result_sign' => $sign,
                    'result_text' => $request->result_text[$index],
                ]);
            }
            return response("Ranges added Successfully", 200);
            
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }

    public function add_signs($quiz_id){
        $quiz = Quiz::where('id', $quiz_id)->with('signs')->first();
        return view('Quiz.add_signs', compact('quiz'));
    }

    public function store_signs(Request $request, $quiz_id){
        try{
            CategoryCombinations::where('quiz_id', $quiz_id)->delete();
            
            foreach($request->category_ids as $index=>$identifiers){
                $__identifiers =  explode(",", $identifiers);
                sort($__identifiers);
                $identifiers = implode(',', $__identifiers);

                $__signs = explode(",", $request->signs[$index]);
                sort($__signs);
                $signs = implode(',', $__signs);

                CategoryCombinations::create([
                    'quiz_id' => $quiz_id,
                    'category_ids' => $identifiers,
                    'signs'  => $signs,
                    'parent_category_id' => $request->parent_category_id[$index],
                    'result_sign' => $request->parent_sign[$index],
                    'result_meaning' => $request->parent_meaning[$index]
                ]);
            }
            return response("signs Added successfullt", 200);
            
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }

    /**
     * return a list of candidates to choose from
     *
     */
    public function assign_quiz_render($quiz_id){
        try{
            $candidates = User::whereHas('candidate')->with('quizUser', 'candidate')->get();
            return View::make('Quiz.load_candidates', compact('candidates', 'quiz_id'));
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }


    /**
     * store the assigned quiz to the assigned candidates
     *
    */
    public function assign_quiz_store($quiz_id, Request $request){
        try{
            foreach($request->candidateList as $user_id=>$val){
                $quizUser = QuizUser::where('quiz_id', $quiz_id)->where('user_id', $user_id)->with('user')->first();
                if(is_null($quizUser)){
                    QuizUser::create([
                        'quiz_id'       => $quiz_id,
                        'user_id'       => $user_id,
                        'is_assigned'   =>  1,
                        'is_pending'    =>  1
                    ]);
                }
                else{
                    if(!$quizUser->is_pending){
                        $quizUser->is_pending = 1;
                        $quizUser->save();
                    }
                }
                Mail::to($quizUser->user)->send(new SendQuizNotification());
            }
            return response('Quiz sent to candidates successfully', 200);
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }


    public function uploadExcel(Request $request){
        try{
            $file_path = $request->file('file')->store('excels');
            Excel::import(new QuizImport, $file_path);
            Excel::import(new RangesImport, $file_path);
            Excel::import(new CategoryCombinationsImport, $file_path);
            File::cleanDirectory(storage_path() . '/app/excels');
            return redirect()->back()->with('success', 'Import made successfully');
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }


    public function quiz_takers($quiz_id){
        $quiz = Quiz::where('id', $quiz_id)->with('quiz_candidate_grades', 'quiz_candidate_grades.user', 'quiz_guests_grades', 'quiz_guests_grades.guest')->first();
        return view('Quiz.Grades.index', compact('quiz'));
    }

    public function showGrades($quiz_id, Request $request){
        try{
            if($request->is_guest){
                $quiz_grades = QuizGrade::where('quiz_id', $quiz_id)->where('guest_id', $request->user_id)->where('take_number', $request->take_number)->with('category')->get();
            }
            else{
                $quiz_grades = QuizGrade::where('quiz_id', $quiz_id)->where('user_id', $request->user_id)->where('take_number', $request->take_number)->with('category')->get();
            }
            return view('Quiz.Grades.show', compact('quiz_grades'));

        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }

    public function showDetailedGrades($quiz_id, Request $request)
    {
        try{
            if($request->is_guest){
                $quiz_grades = QuizTakeAnswers::where('quiz_id', $quiz_id)->where('guest_id', $request->user_id)->where('take_number', $request->take_number)->with('question', 'question.answers')->get();
            }
            else{
                $quiz_grades = QuizTakeAnswers::where('quiz_id', $quiz_id)->where('user_id', $request->user_id)->where('take_number', $request->take_number)->with('question', 'question.answers')->get();
            }            
            return view('Quiz.Grades.show_detailed_grades', compact('quiz_grades'));
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }

    public function show_user($user_id, $is_guest)
    {
        if($is_guest){
            $user = Guest::find($user_id);
            return view('Quiz.Grades.showUser', compact('user', 'is_guest'));
        }else{
            $user = User::find($user_id);
            return view('Quiz.Grades.showUser', compact('user', 'is_guest'));
        }
    }

    public function skills($quiz_id){
        try{
            $quiz   = Quiz::where('id', $quiz_id)->with('defaultSkills')->first();
            $skills = Skill::all();
            return view('Quiz.skills_modal', compact('quiz', 'skills'));
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }

    public function store_skills($quiz_id, Request $request){
        try{
            Quiz::find($quiz_id)->defaultSkillsPivots()->delete();
            $defaultSkills = [];
            foreach($request->skills as $skill_id){
                if(!in_array($skill_id, $defaultSkills)){
                    $defaultSkills[] = $skill_id;
                    QuizDefaultSkills::create([
                        'quiz_id'   => $quiz_id,
                        'skill_id'  => $skill_id
                    ]);
                }
            }
            return response('Skills Added Successfully', 200);
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }


    // -------------  Get User Matching Skills ------------//
    public function showSkills($quiz_id, Request $request)
    {        
        $data = [];

        if(!is_null($request->skillIdsList)){
            $skills__ = Skill::whereIn('id', $request->skillIdsList)->with('classes', 'classes.category')->get();
        }else{
            $quiz_with_default_skills = Quiz::where('id', $quiz_id)->with('defaultSkills', 'defaultSkills.classes', 'defaultSkills.classes.category')->first();
            $skills__ = $quiz_with_default_skills->defaultSkills;
        }
        
        if($request->is_guest){
            $user_classes = QuizClassGrade::where('quiz_id', $quiz_id)->where('guest_id', $request->user_id)->where('take_number', $request->take_number)->get();
        }else{
            $user_classes = QuizClassGrade::where('quiz_id', $quiz_id)->where('user_id', $request->user_id)->where('take_number', $request->take_number)->get();
        }

        foreach($skills__ as $default_skill){
            $dict = [];
            $dict['skill'] = $default_skill;

            for($index=0; $index<sizeof($default_skill->classes); $index++){
                $class = $default_skill->classes[$index];
                $found = false;
                foreach($user_classes as $user_class){
                    if($class->id == $user_class->class_id){
                        $dict['classes'][$index]['skillClass'] = $class;
                        $dict['classes'][$index]['userClass'] = $user_class;
                        $found = true;
                        break;
                    }
                }
                if(!$found){
                    if(array_key_exists($index+1, json_decode($default_skill->classes, true)) && $class->category_id == $default_skill->classes[$index+1]->category_id){
                        $class = $default_skill->classes[$index+1];
                        $found2 = false;
                        foreach($user_classes as $user_class){
                            if($class->id == $user_class->class_id){
                                $dict['classes'][$index]['skillClass'] = $class;
                                $dict['classes'][$index]['userClass'] = $user_class;
                                $found2 = true;
                                $index++;
                                break;
                            }
                        }
                        if(!$found2){
                            $dict['classes'][$index]['skillClass'] = $class;
                            $dict['classes'][$index]['userClass']  =  null;
                            $index++;
                        }
                    }
                    else{
                        $dict['classes'][$index]['skillClass'] = $class;
                        $dict['classes'][$index]['userClass']  = null;
                    }
                }
            }

            $data[] = $dict;
        }

        $skills = Skill::all();
        $defaultSkillsIdsList = array_map(
            function($defaultSkills){
                return $defaultSkills['id'];
            },
            json_decode($skills__, true)
        );
        return view('Quiz.Grades.showSkills', compact('data', 'skills', 'defaultSkillsIdsList', 'quiz_id', 'request'));
    }
}
