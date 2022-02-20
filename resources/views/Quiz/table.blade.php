@forelse ($quizzes as $quiz)
    <div class="question-card d-flex flex-column mt-3 p-2 border border-light pl-3">
        <div class="row mb-4">
            <div class="col-7">
                <p class="font-weight-bold h4"> ({{$quiz->id}}) {{$quiz->name}} </p>
            </div>

            <div class="col-5 text-center">
                <a class="pl-2 m-auto" href="#" title="Assign Candidates" onclick="quizzes.assignUsers({{$quiz->id}})">
                    <i class="fas fa-user-plus text-success details mr-2"></i>
                </a>
                <a class="pr-4 m-auto" href="{{route('loadQuizGrades', ['quiz_id' => $quiz->id])}}" title="View Quiz Takers">
                    <i class="fas fa-users fa-lg" data-count={{$quiz->number_of_takes}}></i>
                    {{-- <i class="fas fa-users fa-lg" data-count={{count($quiz->quiz_candidate_takers) + count($quiz->quiz_guests_takers)}}></i>  --}}
                </a>
                <a class="pl-1 pr-1 m-auto" href="#" title="Edit" onclick="quizzes.edit({{$quiz->id}})">
                    <i class="fas fa-edit details"></i>
                </a>
                <a class="pl-2 m-auto" href="#" title="Delete" onclick="quizzes.delete({{$quiz->id}})">
                    <i class="fas fa-trash-alt text-danger details"></i>  
                </a>
                <a class="pl-2 m-auto" href="#" title="Skills" onclick="skills.skills({{$quiz->id}})">
                    <button class="btn btn-outline-danger"> {{__('messages.quizzes.skill')}} </button>  
                </a>
                <a class="pl-2 m-auto" href="#" title="Add Signs" onclick="add_signs({{$quiz->id}})">
                    <button class="btn btn-outline-success"> {{__('messages.quizzes.add_signs')}} </button>  
                </a>
            </div>
        </div>


        <div class="row pl-1===">
            <div class="col-4">
                <p class="font-weight-bold"> {{__('messages.quizzes.categories_list')}} </p>
            </div>
            <div class="col-2">
                <p class="font-weight-bold"> {{__('messages.quizzes.n_questions')}} </p>
            </div>
            <div class="col-2">
                <p class="font-weight-bold"> {{__('messages.quizzes.min_value')}} </p>
            </div>
            <div class="col-2">
                <p class="font-weight-bold"> {{__('messages.quizzes.max_value')}} </p>
            </div>
            <div class="col-2">
                <p class="font-weight-bold"> {{__('messages.quizzes.ranges')}} </p>
            </div>
        </div>

        @foreach ($quiz->quiz_categories as $category)
            <div class="row pl-3">
                <div class="col-4">
                    <p> {{$category->name}} </p>
                </div>
                <div class="col-2">
                    <p class="pl-md-5"> {{$category->pivot->n_questions}} </p>
                </div>
                <div class="col-2">
                    <p class="pl-md-4"> {{$category->pivot->min_score}} </p>
                </div>
                <div class="col-2">
                    <p class="pl-md-4"> {{$category->pivot->max_score}} </p>
                </div>
                <div class="col-2">
                    <p class="pl-md-4" title="ranges">
                        <i class="fas fa-plus-circle text-success fas-range" onclick="ranges.add({{$quiz->id}}, {{$category->id}})"></i> 
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    @empty
        <h4 class="text-center"> {{__('messages.quizzes.no_quizzes')}} </h4>
@endforelse

<style>
    .question-card {
        color: black;
        font-size: medium;
        box-shadow: 3px 3px 3px 3px grey;
    }
    .details {
        font-size: large;
    }
    .fas-range {
        font-size: large;
        cursor: pointer;
    }

    .fas[data-count]{
        position:relative;
    }
    .fas[data-count]:after{
        position: absolute;
        right: -0.75em;
        top: -.75em;
        content: attr(data-count);
        padding: .5em;
        border-radius: 10em;
        line-height: .9em;
        color: white;
        background: rgba(255,0,0,.75);
        text-align: center;
        min-width: 2em;
        font: bold .4em sans-serif;
    }
</style>
