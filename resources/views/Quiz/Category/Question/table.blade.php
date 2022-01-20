@foreach ($category->category_questions as $question)
    <div class="question-card d-flex flex-column mt-3 p-2 border border-light pl-3">
        <div class="row mb-4">
            <div class="col-10">
                <span> {{$question->question_text}} </span>
                @if ($question->is_checkbox)
                    <span class="text-primary"> ({{__('messages.quizzes.is_checkbox')}}) </span>
                @endif
            </div>

            <div class="col-2">
                <a class="pl-1 pr-1 m-auto" href="#" title="Edit" onclick="questions.edit({{$question->id}})">
                    <i class="fas fa-edit details"></i>
                </a>
                <a class="pl-2 m-auto" href="#" title="Delete" onclick="questions.delete({{$question->id}})">
                    <i class="fas fa-trash-alt text-danger details"></i>  
                </a>
            </div>
        </div>

        @foreach ($question->answers as $answer)
            <div class="row pl-3">
                <div class="col-10">
                    <p><span>{{$answer->order}}. </span> {{$answer->answer_text}} </p>
                </div>

                <div class="col-2">
                    <p> {{$answer->answer_weight . ' ' . __('messages.quizzes.answers_points_label')}} </p>
                </div>
            </div>
        @endforeach
    </div>
@endforeach

<style>
    .question-card {
        color: black;
        font-size: medium;
        box-shadow: 3px 3px 3px 3px grey;
    }
    .details {
        font-size: medium;
    }
</style>
