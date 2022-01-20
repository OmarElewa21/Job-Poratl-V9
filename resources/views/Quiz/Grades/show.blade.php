<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"> {{ __('messages.quizzes.quiz_results') }} </h5>
            <button type="button" aria-label="Close" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
            <div class="results-content">
                @foreach ($quiz_grades as $cat_grade)
                    <div>
                        <h5>
                            {{$cat_grade->category->name}}
                        </h5>
                        <h6 class="pl-2">
                            {{$cat_grade->result_sign}}
                        </h6>
                        <ul class="cat">
                            @php
                                $result_text = explode("\n", $cat_grade->result_text);
                                foreach($result_text as $text){
                                    $text = str_replace("\\n", "", $text);
                                    echo "<li>$text</li>";
                                }
                            @endphp 
                        </ul>
                    </div>
                    
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .modal-dialog{
        max-width: 700px;
    }
</style>