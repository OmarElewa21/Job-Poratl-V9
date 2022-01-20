<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"> {{ __('messages.quizzes.add_combination') }} </h5>
            <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
        </div>

        {!! Form::open(['id'=>'addSignsForm']) !!}
        <div class="modal-body">
            <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <div class="row">
                        <label class="col-1"></label>
                        <label class="col-1">{{__('messages.quizzes.category_identifiers')}}</label>
                        <label class="col-1"></label>
                        <label class="col-2">{{__('messages.quizzes.category_signs')}}</label>
                        <label class="col-1"></label>
                        <label class="col-1">{{__('messages.quizzes.parent_category_identifier')}}</label>
                        <label class="col-1"></label>
                        <label class="col-1">{{__('messages.quizzes.result_sign')}}</label>
                        <label class="col-1"></label>
                        <label class="col-2">{{__('messages.quizzes.result_text')}}</label>

                    </div>
                </div>

                <input id="quiz_id" class="d-none" value="{{$quiz->id}}">

                <div class="form-group col-sm-12 parentTarget">
                    @forelse ($quiz->signs as $sign)
                        <div class="row" id="target">

                            <div class="col-1">
                                <i class="fas fa-minus-circle text-danger fas-delete" onclick="ranges.removeRangeRow(this)"></i>
                                <i class="fas fa-plus-circle text-success fas-add" onclick="ranges.addRangeRow()"></i>
                            </div>

                            {!! Form::text('category_ids[]', $sign->category_ids, [
                                'class' => 'form-control col-1',
                                'required',
                            ])!!}

                            <label class="col-1"></label>

                            {!! Form::text('signs[]', $sign->signs, [
                                'class' => 'form-control col-2',
                                'required',
                            ])!!}
                            
                            <label class="col-1"></label>

                            {!! Form::text('parent_category_id[]', $sign->parent_category_id, [
                                'class' => 'form-control col-1',
                                'required',
                            ])!!}

                            <label class="col-1"></label>

                            {!! Form::text('parent_sign[]', $sign->result_sign, [
                                'class' => 'form-control col-1',
                                'required',
                            ])!!}

                            <label class="col-1"></label>

                            {!! Form::text('parent_meaning[]', $sign->result_meaning, [
                                'class' => 'form-control col-2',
                                'required',
                            ])!!}

                        </div>

                    @empty
                        <div class="row mt-2" id="target">

                            <div class="col-1">
                                <i class="fas fa-minus-circle text-danger fas-delete mb-2" onclick="ranges.removeRangeRow(this)"></i>
                                <i class="fas fa-plus-circle text-success fas-add" onclick="ranges.addRangeRow()"></i>
                            </div>

                            {!! Form::text('category_ids[]', null, [
                                'class' => 'form-control col-1',
                                'required',
                            ])!!}

                            <label class="col-1"></label>

                            {!! Form::text('signs[]', null, [
                                'class' => 'form-control col-2',
                                'required',
                            ])!!}
                            
                            <label class="col-1"></label>

                            {!! Form::text('parent_category_id[]', null, [
                                'class' => 'form-control col-1',
                                'required',
                            ])!!}

                            <label class="col-1"></label>

                            {!! Form::text('parent_sign[]', null, [
                                'class' => 'form-control col-1',
                                'required',
                            ])!!}

                            <label class="col-1"></label>

                            {!! Form::text('parent_meaning[]', null, [
                                'class' => 'form-control col-2',
                                'required',
                            ])!!}

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
    .modal-dialog {
        max-width: 1000px !important;
    }
    .fas-add, .fas-delete {
        font-size: large;
        position: relative;
        cursor: pointer;
    }
</style>