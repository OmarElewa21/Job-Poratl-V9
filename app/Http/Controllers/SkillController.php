<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\CategoryClass;
use App\Models\Skill;
use App\Models\SkillCategoryClass;
use App\Queries\SkillDataTable;
use App\Repositories\SkillRepository;
use DataTables;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\View\View;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use App\Imports\SkillImport;

class SkillController extends AppBaseController
{
    /** @var SkillRepository */
    private $skillRepository;

    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    /**
     * Display a listing of the Skill.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        return view('skills.index');
    }

    /**
     * Store a newly created Skill in storage.
     *
     * @param  CreateSkillRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateSkillRequest $request): JsonResponse
    {
        $input = $request->all();
        $skill = $this->skillRepository->create($input);

        return $this->sendResponse($skill,'Skill saved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Skill  $skill
     *
     * @return JsonResponse
     */
    public function edit(Skill $skill)
    {
        return $this->sendResponse($skill, 'Skill Retrieved Successfully.');
    }

    /**
     * Show the form for editing the specified Skill.
     *
     * @param  Skill  $skill
     *
     * @return JsonResource
     */
    public function show(Skill $skill)
    {
        return $this->sendResponse($skill, 'Skill Retrieved Successfully.');
    }

    /**
     * Update the specified Skill in storage.
     *
     * @param  UpdateSkillRequest  $request
     *
     * @param  Skill  $skill
     *
     * @return JsonResource
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $input = $request->all();
        $this->skillRepository->update($input, $skill->id);

        return $this->sendSuccess('Skill updated successfully.');
    }

    /**
     * Remove the specified Skill from storage.
     *
     * @param  Skill  $skill
     *
     * @throws Exception
     *
     * @return JsonResource
     */
    public function destroy(Skill $skill)
    {
        $candidateskillIds = $skill->candidate()->pluck('skill_id')->toArray();
        $jobskillIds = $skill->jobs()->pluck('skill_id')->toArray();
        if (in_array($skill->id, $candidateskillIds) || in_array($skill->id, $jobskillIds)) {
            return $this->sendError('Skill can\'t be deleted.');
        } else {
            $skill->delete();
        }

        return $this->sendSuccess('Skill deleted successfully.');
    }

    public function showClasses($skill_id)
    {
        try{
            $skill = Skill::where('id', $skill_id)->with('classes')->first();
            $classes = CategoryClass::all();
            return view('skills.classes', compact('skill', 'classes'));
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }


    public function storeClasses($skill_id, Request $request)
    {
        try{
            Skill::find($skill_id)->SkillCategoryClasses()->delete();
            foreach($request->classes as $index=>$class_id){
                $class = CategoryClass::find($class_id);
                SkillCategoryClass::create([
                    'skill_id'                 => $skill_id,
                    'class_name'               => $class->name,
                    'min_score_percentage'     => $request->min_score_percentage[$index],
                    'max_score_percentage'     => $request->max_score_percentage[$index],
                    'class_weight_from_skill'  => $request->class_weight_from_skill[$index]
                ]);
            }
            return response('Successfully added classes to skill', 200);
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }


    public function uploadExcel(Request $request){
        try{
            $file_path = $request->file('file')->store('excels');
            Excel::import(new SkillImport, $file_path);
            File::cleanDirectory(storage_path() . '/app/excels');
            return redirect()->back()->with('success', 'Import made successfully');
        }catch (Exception $e){
            return response($e->getMessage(), 500);
        }
    }
}
