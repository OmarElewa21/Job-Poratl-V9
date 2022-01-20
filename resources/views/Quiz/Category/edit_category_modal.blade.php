<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"> {{ __('messages.quizzes.edit_category') }} </h5>
            <button class="btn btn-primary" onclick="show({{$category->id}})">
                <i class="fas fa-arrow-left"></i> {{__('messages.common.back')}}
            </button>
        </div>
        {!! Form::open(['id'=>'editCategoryForm', 'route' => ['category.update', $category->id] ]) !!}
        <div class="modal-body">
            <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
            <div class="row">
                <div class="form-group col-sm-12">
                    {!! Form::label('name', __('messages.quizzes.category_name').':') !!}<span class="text-danger">*</span>
                    {!! Form::text('name', $category->name, ['id'=>'name','class' => 'form-control','required']) !!}
                </div>
                @if (count($category->classes) > 0)
                    <div class="col-12 text-center">
                        {!! Form::label('class', __('messages.quizzes.class'), ['class' => 'regular-color col-5']) !!}
                    </div>
                    <div class="form-group col-sm-12 row text-center classParentDiv">
                    @foreach ($category->classes as $index=>$class)
                        <div id="classes" class="row col-12 mt-2">

                            <div class="col-1">
                                <i class="fas fa-minus-circle text-danger fas-delete" onclick="deleteClass(this)"></i>
                            </div>

                            <div class="col-10">
                                {{Form::text('class[]', $class->name, ['class' => 'col-12', 'id' => 'class_name'])}}
                            </div>

                            <div class="col-1">
                                <i class="fas fa-plus-circle text-success fas-add" onclick="addClass()"></i>
                            </div>

                        </div>
                    @endforeach
                    </div>
                @endif

                <div class="form-group col-sm-12">
                    {!! Form::label('Description', __('messages.quizzes.category_description').':') !!}
                    {!! Form::textarea('description', $category->description, ['id'=>'description', 'class' => 'description-box']) !!}
                </div>

                <div class="d-none">
                    <input name="id" id="cat_id" type="number" value="{{$category->id}}">
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>

<style>
    .text-right{
        position: relative;
        left: 70%;
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
</style>