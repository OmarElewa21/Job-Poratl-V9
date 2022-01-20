<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"> {{ __('messages.quizzes.skills_matching') }} </h4>
            <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
            {{Form::open(['id' => 'skillSelectionForm'])}}
                <div class="row">
                    @foreach ($skills as $skill)
                        <div class="d-inline col-3">
                            <input type="checkbox" class="select" name="skill[]" value="{{$skill->id}}" 
                            {{in_array($skill->id, $defaultSkillsIdsList) ? 'checked' : ''}}>
                            <label class="ml-2">{{$skill->name}}</label>
                        </div>
                    @endforeach
                </div>
            {{ Form::close() }}

            @foreach ($data as $item)
                @php
                    $totalScore = 0;
                    $notNullCategories = [];
                @endphp
            <div class="mt-3 shadow bg-white rounded pr-3 pl-3 pt-5 pb-5">
                <h5 class="text-center">
                    {{$item['skill']->name}}
                </h5>

                @if (count($item['skill']->classes) == 0)
                    <h6 class="text-center"> No Classes found for this Skill to match </h6>
                @else
                    <div class="row pl-4 pr-4">
                        <table>
                            <tr class="row">
                                <th class="col-2"> {{ __('messages.quizzes.category_name_') }} </th>
                                <th class="col-2"> {{ __('messages.quizzes.class_name') }} </th>
                                <th class="col-2"> {{ __('messages.quizzes.min_score_percentage') }} </th>
                                <th class="col-2"> {{ __('messages.quizzes.max_score_percentage') }} </th>
                                <th class="col-2"> {{ __('messages.quizzes.class_weight_from_skill') }} </th>
                                <th class="col-1"> {{ __('messages.quizzes.user_score') }} </th>
                                <th class="col-1"> {{ __('messages.quizzes.is_achieved') }} </th>
                            </tr>

                            @foreach ($item['classes'] as $class)
                                @if (!is_null($class['userClass']))
                                    @php
                                        $notNullCategories[] = $class['skillClass']->category->id;
                                    @endphp
                                    <tr class="row">
                                        <td class="col-2">
                                            {{$class['skillClass']->category->name}}
                                        </td>
                                        <td class="col-2">
                                            {{$class['skillClass']->name}}
                                        </td>
                                        @if ($class['userClass']->is_parent_class)
                                            <td class="col-2">
                                                ----
                                            </td>
                                            <td class="col-2">
                                                ----
                                            </td>
                                        @else
                                            <td class="col-2">
                                                {{$class['skillClass']->pivot->min_score_percentage}}
                                            </td>
                                            <td class="col-2">
                                                {{$class['skillClass']->pivot->max_score_percentage}}
                                            </td>
                                        @endif
                                        
                                        <td class="col-2">
                                            {{$class['skillClass']->pivot->class_weight_from_skill}}
                                        </td>
                                        @if ($class['userClass']->is_parent_class)
                                            <td class="col-1">
                                                ----
                                            </td>
                                        @else
                                            <td class="col-1">
                                                {{$class['userClass']->score_percentage}}
                                            </td>
                                        @endif
                                        
                                        <td class="col-1">
                                            @if (
                                                $class['userClass']->score_percentage <= $class['skillClass']->pivot->max_score_percentage &&
                                                $class['userClass']->score_percentage >=  $class['skillClass']->pivot->min_score_percentage
                                                )
                                                @php
                                                    $totalScore += $class['skillClass']->pivot->class_weight_from_skill;
                                                @endphp
                                                <i class="fas fa-check-circle text-success grade-fas"></i>
                                            @else
                                                <i class="fas fa-times-circle text-danger grade-fas"></i>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            @foreach ($item['classes'] as $class)
                                @if (is_null($class['userClass']) && !in_array($class['skillClass']->category->id, $notNullCategories))
                                    @php
                                        $notNullCategories[] = $class['skillClass']->category->id;
                                    @endphp
                                    <tr class="row">
                                        <td class="col-2">
                                            {{$class['skillClass']->category->name}}
                                        </td>
                                        <td class="col-6 text-center h6 font-weight-bold">
                                            Category hasn't been tested
                                        </td>
                                        <td class="col-2">
                                            {{$class['skillClass']->pivot->class_weight_from_skill}}
                                        </td>
                                        <td class="col-1">
                                            -------
                                        </td>
                                        <td class="col-1">
                                            <i class="fas fa-times-circle text-danger grade-fas"></i>
                                        </td>
                                @endif
                            @endforeach
                        </table>
                    </div>
                    <div class="w-75" style="margin: auto">
                        <h5 class="mt-4 text-center">
                            Skill Achieved Score: &nbsp;&nbsp;&nbsp;&nbsp; {{$totalScore}}%
                        </h5>
                        <div class="progress" style="height: 25px;">
                            <div class="progress-bar progress-bar-striped {{$totalScore > 50 ? 'bg-success': 'bg-danger'}}" role="progressbar" style="width: {{$totalScore}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                {{$totalScore}}%
                            </div>
                        </div>

                    </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .modal-dialog{
        max-width: 1200px;
    }
    .grade-fas {
        font-size: larger !important;
    }
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #e9e9e9;
        }
</style>
