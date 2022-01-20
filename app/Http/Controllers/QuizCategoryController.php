<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\File;
use App\Models\QuizCategory;
use App\Models\CategoryClass;
use App\Models\QuizCategoryRelations;
use Illuminate\Support\Facades\View;

use App\Imports\QuizCategoryImport;
use App\Imports\QuizQuestionImport;
use Maatwebsite\Excel\Facades\Excel;

class QuizCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Support\Facades\View
     */
    public function index()
    {
        $categories = QuizCategory::where('is_first_parent', 1)->get();
        return view('Quiz.Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Illuminate\Support\Facades\View
     */
    public function create(Request $request)
    {
        if(is_null($request->input('id')) || is_null($request->input('mode'))){
            return response("category Id or creation mode is unspecified", 500);
        }
        else{
            return View::make('Quiz.Category.add_category_modal', [
                'id'    => $request->input('id'),
                'mode'  => $request->input('mode'),
            ]);
        }
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
            'name' => 'required|max:150',
            'id'   => 'required',
            'mode' =>  'required',
        ]);
        
        $newCategory = new QuizCategory();

        if($request->id == 0){
            $newCategory->create([
                'name'            => $request->name,
                'description'     => $request->description,
                'is_first_parent' => 1
            ]);
            return response('Category saved successfully.', 200);
        }
        else{
            if($request->mode == "parent"){
                try{
                    $category = QuizCategory::find($request->id);

                    if(count($category->parent_category) > 0){
                        $newCategory = $newCategory->create([
                            'name'            => $request->name,
                            'description'     => $request->description,
                            'is_first_parent' => 0
                        ]);
                        QuizCategoryRelations::create([
                                'parent_category_id' => $newCategory->id,
                                'sub_category_id'    => $category->id]);
                        QuizCategoryRelations::create([
                                'parent_category_id' => $category->parent_category[0]->id,
                                'sub_category_id'    => $newCategory->id]);

                        $old_parent_relation = QuizCategoryRelations::where('parent_category_id', $category->parent_category[0]->id)->
                            where('sub_category_id', $category->id)->first();
                        $old_parent_relation->delete();
                    }
                    else{
                        $newCategory = $newCategory->create([
                            'name'            => $request->name,
                            'description'     => $request->description,
                            'is_first_parent' => 1
                        ]);
                        QuizCategoryRelations::create([
                            'parent_category_id' => $newCategory->id,
                            'sub_category_id'    => $category->id,
                        ]);
                        $category->update([
                            'is_first_parent' => 0
                        ]);
                    }

                    return response("Successfully Created New Parent Category", 200);

                }catch (Exception $e) {
                    return response($e->getMessage(), 500);
                }
            }

            elseif($request->mode == "child"){
                try{
                    $category = QuizCategory::find($request->id);
                    $newCategory = $newCategory->create([
                        'name'            => $request->name,
                        'description'     => $request->description,
                        'is_first_parent' => 0
                    ]);
                    QuizCategoryRelations::create([
                        'parent_category_id' => $category->id,
                        'sub_category_id'    => $newCategory->id,
                    ]);
                }catch (Exception $e) {
                    return response($e->getMessage(), 500);
                }
            }
            else{
                return response("mode is not know under defined modes", 500);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $category = QuizCategory::find($id);
            return View::make('Quiz.Category.show', compact('category'));
        } catch (Exception $e) {
            return $this->response($e->getMessage(), 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = QuizCategory::find($id);
        return View::make('Quiz.Category.edit_category_modal', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $category = QuizCategory::find($id);
            if(!is_null($request->class)){
                $category->update([
                    'name'          => $request->name,
                    'description'   => $request->description
                ]);
                $category->classes()->delete();
                foreach($request->class as $class){
                    CategoryClass::create([
                        'category_id'  => $category->id,
                        'name'         => $class
                    ]);
                }
            }
            else{
                $category->update($request->all());
            }
            return response("Category Updated Successfully", 200);
        }catch (Exception $e) {
            return response($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            QuizCategory::find($id)->delete();
            return response("Category deleted successfully", 200);

        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }


    public function loadExcel(Request $request){
        return view('Quiz.load_excel', ['submitUrl'=> $request->submitUrl]);
    }


    public function uploadExcel(Request $request){
        try{
            $file_path = $request->file('file')->store('excels');
            Excel::import(new QuizCategoryImport, $file_path);
            Excel::import(new QuizQuestionImport, $file_path);
            File::cleanDirectory(storage_path() . '/app/excels');
            return redirect()->back()->with('success', 'Import made successfully');
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }            
    }
}
