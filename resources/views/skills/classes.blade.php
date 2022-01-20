<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="skillHeader">{{ __('messages.quizzes.classes') }}</h5>
            <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
        </div>
        {{ Form::open(['id'=>'skillClassesForm']) }}
        <div class="modal-body">

            <div class="form-group col-sm-12 classParentDiv">
                <div class="row">
                    <label class="col-1"></label>
                    <label class="col-4"> {{__('messages.quizzes.skill_class')}} </label>
                    <label class="col-1"></label>
                    <label class="col-1">{{__('messages.quizzes.min_score_percentage')}}</label>
                    <label class="col-1"></label>
                    <label class="col-1">{{__('messages.quizzes.max_score_percentage')}}</label>
                    <label class="col-1"></label>
                    <label class="col-2">{{__('messages.quizzes.class_weight_from_skill')}}</label>
                </div>
            <div class="d-none">
                <input type="number" name="skill_id" id="skill_id" value="{{ $skill->id }}">
            </div>

            @forelse ($skill->classes as $skillClass)
                <div id="class-div" class="row">
                    <div class="col-1">
                        <i class="fas fa-minus-circle text-danger fas-delete" onclick="deleteClass(this)"></i>
                    </div>

                    <div class="col-4">
                        <select name="classes[]" class="form-control col-sm-12" required>
                            @foreach ($classes as $class)
                                <option value="{{$class->id}}" {{$skillClass->id == $class->id ? 'selected': ''}}>{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-1">
                        <i class="fas fa-plus-circle text-success fas-add" onclick="addClass()"></i>
                    </div>

                    {{Form::text('min_score_percentage[]', $skillClass->pivot->min_score_percentage, ['class' => 'min_score_percentage col-1', 'required' => 'required'])}}
                    <label class="col-1"></label>

                    {{Form::text('max_score_percentage[]', $skillClass->pivot->max_score_percentage, ['class' => 'max_score_percentage col-1', 'required' => 'required'])}}
                    <label class="col-1"></label>

                    {{Form::text('class_weight_from_skill[]', $skillClass->pivot->class_weight_from_skill, ['class' => 'class_weight_from_skill col-2', 'required' => 'required'])}}
                </div>
            @empty
                <div id="class-div" class="row">
                    <div class="col-1">
                        <i class="fas fa-minus-circle text-danger fas-delete" onclick="deleteClass(this)"></i>
                    </div>

                    <div class="col-4">
                        <select name="classes[]" class="form-control col-sm-12" required>
                            @foreach ($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-1">
                        <i class="fas fa-plus-circle text-success fas-add" onclick="addClass()"></i>
                    </div>

                    {{Form::text('min_score_percentage[]', null, ['class' => 'min_score_percentage col-1', 'required' => 'required'])}}
                    <label class="col-1"></label>

                    {{Form::text('max_score_percentage[]', null, ['class' => 'max_score_percentage col-1', 'required' => 'required'])}}
                    <label class="col-1"></label>

                    {{Form::text('class_weight_from_skill[]', null, ['class' => 'class_weight_from_skill col-2', 'required' => 'required'])}}
                </div>
            @endforelse

            
        </div>

            <div class="text-right">
                {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" id="btnEditCancel" class="btn btn-light ml-1"
                        data-dismiss="modal">{{ __('messages.common.cancel') }}
                </button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

<style>
    .modal-dialog {
        max-width: 800px !important;
    }
    .fas-add, .fas-delete{
        font-size: large;
        position: relative;
        top: 25%;
    }
    .fas-add:hover, .fas-delete:hover{
        cursor: pointer;
    }
</style>