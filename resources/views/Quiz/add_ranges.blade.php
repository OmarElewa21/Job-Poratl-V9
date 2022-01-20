<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"> {{ __('messages.quizzes.add_ranges') }} </h5>
            <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
        </div>

        {!! Form::open(['id'=>'addRangeForm']) !!}
        <div class="modal-body">
            <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <div class="row">
                        <label class="col-1"></label>
                        <label class="col-1">{{__('messages.quizzes.range_min_value')}}</label>
                        <label class="col-1"></label>
                        <label class="col-1">{{__('messages.quizzes.range_max_value')}}</label>
                        <label class="col-1"></label>
                        <label class="col-2">{{__('messages.quizzes.result_sign')}}</label>
                        <label class="col-1"></label>
                        <label class="col-3">{{__('messages.quizzes.result_text')}}</label>
                        <label class="col-1"></label>
                    </div>
                </div>

                <input id="quiz_id" class="d-none" value="{{$quiz->id}}">
                <input id="category_id" class="d-none" value="{{$quiz->quiz_categories[0]->id}}">

                <div class="form-group col-sm-12 parentTarget">
                    @forelse($ranges as $range)
                        <div class="row mt-2" id="target">
                            <div class="col-1">
                                <i class="fas fa-minus-circle text-danger fas-delete" onclick="ranges.removeRangeRow(this)"></i>
                            </div>
                            {!! Form::number('range_min[]', $range->range_min_val, [
                                    'class' => 'form-control col-1 range_min',
                                    'required',
                                    'min' => $quiz->quiz_categories[0]->pivot->min_score,
                                    'max' => $quiz->quiz_categories[0]->pivot->max_score
                                ])!!}

                            <label class="col-1"></label>
                            {!! Form::number('range_max[]', $range->range_max_val, [
                                'class' => 'form-control col-1 range_max',
                                'required',
                                'min' => $quiz->quiz_categories[0]->pivot->min_score,
                                'max' => $quiz->quiz_categories[0]->pivot->max_score
                            ])!!}

                            <label class="col-1"></label>
                            {!! Form::text('result_sign[]', $range->result_sign, [
                                'class' => 'form-control col-2 range_sign',
                                'required',
                            ])!!}

                            <label class="col-1"></label>
                            {!! Form::text('result_text[]', $range->result_text, [
                                'class' => 'form-control col-2 range_sign',
                                'required',
                            ])!!}
                            <div class="col-1">
                                <i class="fas fa-plus-circle text-success fas-add" onclick="ranges.addRangeRow()"></i>
                            </div>
                        </div>

                    @empty
                    <div class="row mt-2" id="target">
                        <div class="col-1">
                            <i class="fas fa-minus-circle text-danger fas-delete" onclick="ranges.removeRangeRow(this)"></i>
                        </div>
                        {!! Form::number('range_min[]', null, [
                                'class' => 'form-control col-1',
                                'required',
                                'min' => $quiz->quiz_categories[0]->pivot->min_score,
                                'max' => $quiz->quiz_categories[0]->pivot->max_score
                            ])!!}
                        <label class="col-1"></label>
                        {!! Form::number('range_max[]', null, [
                            'class' => 'form-control col-1',
                            'required',
                            'min' => $quiz->quiz_categories[0]->pivot->min_score,
                            'max' => $quiz->quiz_categories[0]->pivot->max_score
                        ])!!}
                        <label class="col-1"></label>
                        {!! Form::text('result_sign[]', null, [
                            'class' => 'form-control col-2 range_sign',
                            'required',
                        ])!!}

                        <label class="col-1"></label>
                        {!! Form::text('result_text[]', null, [
                            'class' => 'form-control col-2 range_sign',
                            'required',
                        ])!!}

                        <div class="col-1">
                            <i class="fas fa-plus-circle text-success fas-add" onclick="ranges.addRangeRow()"></i>
                        </div>
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
<div>

<style>
    .modal-dialog {
        max-width: 800px !important;
    }
    .fas-add, .fas-delete {
        font-size: large;
        position: relative;
        top: 30%;
        cursor: pointer;
    }
</style>