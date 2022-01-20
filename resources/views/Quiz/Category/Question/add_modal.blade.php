<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ __('messages.quizzes.new_question') }}</h5>
            <button id="back-btn" class="btn btn-primary" onclick="show({{$category_id}})">
                <i class="fas fa-arrow-left"></i> {{__('messages.common.back')}}
            </button>
            <button type="button" aria-label="Close" class="close d-none" data-dismiss="modal">×</button>
        </div>
        {!! Form::open(['id'=>'addNewQuestionForm', 'route' => ['question.store', 'id' => $category_id]]) !!}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="option-box w-100 d-flex justify-content-between">
                        <div class="options">
                            <input type="checkbox" name="is_checkbox" class="ml-4 mr-1">
                            <label class="option-label regular-color"> {{__('messages.quizzes.checkbox_text')}} </label> <br>
                        </div>
                    </div>

                    <div class="d-none">
                        <input type="number" name="category_id" id="category_id" value="{{ $category_id }}">
                    </div>

                    <div class="form-group col-sm-12 mt-3">
                        {!! Form::label('question_text', __('messages.quizzes.question_text').':', ['class' => 'regular-color']) !!}<span class="text-danger">*</span><br>
                        <textarea id= 'question_text' name='question_text' class="text-area ml-2" rows="2" required></textarea><br>
                    </div>

                    <div class="form-group col-sm-12 mt-3">
                        @if ($first_question)
                            <div class="col-12 text-center">
                                {!! Form::label('class', __('messages.quizzes.class'), ['class' => 'regular-color col-5']) !!}
                            </div>
                        
                            <div class="form-group col-sm-12 row text-center classParentDiv">
                                <div id="classes" class="row col-12 mt-2">

                                    <div class="col-1">
                                        <i class="fas fa-minus-circle text-danger fas-delete" onclick="deleteClass(this)"></i>
                                    </div>
        
                                    <div class="col-10">
                                        {{Form::text('class[]', null, ['class' => 'col-12', 'id' => 'class_name'])}}
                                    </div>
        
                                    <div class="col-1">
                                        <i class="fas fa-plus-circle text-success fas-add" onclick="addClass()"></i>
                                    </div>
        
                                </div>
                            </div>
                        @endif
                        
                    </div>

                    <div class="form-group col-sm-12" id="answers">
                        <div class="answer-labels w-100 d-flex row">
                            <label class="col-1"></label>
                            <label class="regular-color col-5"> {{__('messages.quizzes.answers_label')}} </label>
                            <label class="col-1"></label>
                            <label class="regular-color col-2">{{__('messages.quizzes.answers_points_label')}}</label>
                            <label class="col-1"></label>
                            <label class="regular-color col-2">{{__('messages.quizzes.order')}}</label>
                        </div>

                        <div class="d-flex answer-box d-flex justify-content-between align-items-center mb-2">
                            <div class="answer-subbox d-flex justify-content-around align-items-center col-6">
                                <i class="fas fa-minus-circle answer-fas text-danger" onclick="remove_answer(this)"></i>
                                <textarea name="answer_text[]" class="text-area" rows="1" required></textarea>
                                <i class="fas fa-plus-circle answer-fas answer-fas-plus text-success" onclick="add_answer()"></i>
                            </div>
                            <label class="col-1"></label>
                            <input type="text" class="answer_weight col-2" name="answer_weight[]" size="3" required>
                            <label class="col-1"></label>
                            <input type="number" class="order col-2" name="order[]" size="3" required>
                        </div>

                        <div class="d-flex answer-box d-flex justify-content-between align-items-center mb-2">
                            <div class="answer-subbox d-flex justify-content-around align-items-center col-6">
                                <i class="fas fa-minus-circle answer-fas text-danger" onclick="remove_answer(this)"></i>
                                <textarea name="answer_text[]" class="text-area" rows="1" required></textarea>
                                <i class="fas fa-plus-circle answer-fas answer-fas-plus last_answer text-success" onclick="add_answer()"></i>
                            </div>
                            <label class="col-1"></label>
                            <input type="text" class="answer_weight col-2" name="answer_weight[]" size="3" required>
                            <label class="col-1"></label>
                            <input type="number" class="order col-2" name="order[]" size="3" required>
                        </div>
                    </div>

                    <div class="text-right">
                        {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                        <button type="button" id="btnCancel" class="btn btn-light"
                                data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                    </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>

<style>
    .text-right{
        position: relative;
        left: 80%;
    }
    @media screen and (max-width: 480px) {
        .text-right{
            position: relative;
            left: 60%;
        } 
    }

    .description-box {
        width: 100%;
        height: 70%;
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

    .modal-dialog{
        max-width: 700px;
    }

    .regular-color {
        color: black;
    }
    .option-label {
        font-size: small;
    }
    
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] {
    -moz-appearance: textfield;
    }

    .text-area{
        width: 90%;
    }

    .answer-subbox {
        width: 90%;
    }

    .answer-fas {
        font-size: large;
    }

    .answer-fas:hover {
        cursor: pointer;
    }

    .answer-fas-plus{
        visibility: hidden;
    }

    .last_answer{
        visibility: visible;
    }
</style>