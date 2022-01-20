<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"> {{ __('messages.quizzes.quiz_detailed_results') }} </h5>
            <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
            

                @foreach ($quiz_grades as $index=>$grade)
                    <div class="row mt-3">
                        <div class="col-6">
                            <h6>
                                {{$index+1 . '. ' . $grade->question->question_text}}
                            </h6>
                        </div>
                        <div class="col-6 d-flex justify-content-between">
                            @foreach ($grade->question->answers as $answer)
                                <span class="{{$answer->id == $grade->answer_id ? 'text-success font-weight-bold' : ''}}">
                                    {{$answer->answer_text}}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>

<style>
    .modal-dialog{
        max-width: 1200px;
    }
</style>