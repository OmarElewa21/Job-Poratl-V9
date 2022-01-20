<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"> {{ __('messages.quizzes.skill') }} </h5>
            <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
        </div>

        {!! Form::open(['id'=>'skillsForm']) !!}
        <div class="modal-body">
            <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
            <div class="row">
                <input id="quiz_id" class="d-none" value="{{$quiz->id}}">

                <div class="form-group col-sm-12 parentTarget">
                    @forelse ($quiz->defaultSkills as $defaultSkill)
                        <div class="row d-flex align-items-center" id="target">
                            <i class="fas fa-minus-circle text-danger fas-delete col-1" onclick="skills.removeSkillRow(this)"></i>
                            <select name="skills[]" class="form-control col-sm-10" required>
                                @foreach ($skills as $skill)
                                    <option value="{{$skill->id}}" {{$skill->id == $defaultSkill->id ? 'selected': ''}}>{{$skill->name}}</option>
                                @endforeach
                            </select>
                            <i class="fas fa-plus-circle text-success fas-add col-1" onclick="skills.addSkillRow()"></i>
                        </div>
                    @empty
                        <div class="row d-flex align-items-center" id="target">
                            <i class="fas fa-minus-circle text-danger fas-delete col-1" onclick="skills.removeSkillRow(this)"></i>
                            <select name="skills[]" class="form-control col-sm-10" required>
                                @foreach ($skills as $skill)
                                    <option value="{{$skill->id}}">{{$skill->name}}</option>
                                @endforeach
                            </select>
                            <i class="fas fa-plus-circle text-success fas-add col-1" onclick="skills.addSkillRow()"></i>
                        </div>
                    @endforelse
                </div>

                <div class="col-sm-12 text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnCancel" class="btn btn-light"
                        data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<style>
    .fas-add, .fas-delete {
        font-size: large;
        position: relative;
        cursor: pointer;
    }
</style>