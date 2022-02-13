<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"> {{ __('messages.quizzes.new_quiz') }} </h5>
            <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
        </div>
        {!! Form::open(['id'=>'addQuizForm', 'url' => '/admin/quizzes/quiz']) !!}
        <div class="modal-body">
            <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
            <div class="row">
                <div class="option-box w-100 d-flex justify-content-between">
                    <div class="options">
                        <input type="checkbox" name="allow_guests" class="ml-4 mr-1">
                        <label class="option-label regular-color"> {{__('messages.quizzes.allow_guests')}} </label> <br>
                    </div>
                </div>
                <div class="options">
                    <input type="checkbox" name="horizontal_display" class="ml-4 mr-1">
                    <label class="option-label regular-color"> {{__('messages.quizzes.horizontal_display')}} </label> <br>
                </div>

                <div class="form-group col-sm-12 mt-3">
                    {!! Form::label('name', __('messages.quizzes.name').':') !!}<span class="text-danger">*</span>
                    {!! Form::text('name', null, ['id'=>'name','class' => 'form-control','required']) !!}
                </div>

                <div class="form-group col-sm-12">
                    {!! Form::label('Description', __('messages.quizzes.description').':') !!}
                    {!! Form::textarea('description', null, ['id'=>'description', 'class' => 'description-box', 'col' => 50, 'rows' => 6]) !!}
                </div>

                <div class="form-group col-sm-12 categoryParentDiv">
                    <div class="row">
                        <label class="col-1"></label>
                        <label class="col-4"> {{__('messages.quizzes.category')}} </label>

                        <label class="col-1"></label>
                        <label class="col-3">{{__('messages.quizzes.specify_number_of_questions')}}</label>
                        <label class="col-1"></label>

                        <label class="col-2">{{__('messages.quizzes.donnotShow')}}</label>
                    </div>

                    <div id="category-div" class="row mt-2">
                        <div class="col-1">
                            <i class="fas fa-minus-circle text-danger fas-delete" onclick="deleteCategory(this)"></i>
                        </div>

                        <select name="categories[]" class="form-control col-4 category_name" required>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>

                        <div class="col-1">
                            <i class="fas fa-plus-circle text-success fas-add" onclick="addCategory()"></i>
                        </div>

                        <div class="col-3">
                            {!! Form::number('n_questions[]', null, [
                                'class' => 'form-control n_questions',
                                'required',
                                'min' => 1
                                ])!!}
                        </div>

                        <div class="col-1">
                        </div>

                        <div class="col-2 d-flex align-items-center">
                            <input type="checkbox" name="show" class="donnotShowCheckbox" id="donnotShowCheckbox">
                        </div>
                    </div>
                </div>

                <div class="text-right">
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
    .modal-dialog {
        max-width: 800px !important;
    }
    .text-right{
        position: relative;
        left: 82%;
    }
    @media screen and (max-width: 480px) {
        .text-right{
            position: relative;
            left: 60%;
        } 
    }
    .description-box {
        width: 100%;
        height: 80%;
    }
    .fas-add, .fas-delete{
        font-size: large;
        position: relative;
        top: 25%;
    }
    .fas-add:hover, .fas-delete:hover{
        cursor: pointer;
    }
    .option-label {
        font-size:medium;
    }
</style>