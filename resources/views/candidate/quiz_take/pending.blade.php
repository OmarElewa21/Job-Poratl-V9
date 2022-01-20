<div class="row mt-3">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body px-0 py-0">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a href="{{ route('quizzes.pending') }}" data-count={{count($quizzes)}}
                            class="nav-link {{count($quizzes) > 0 ? 'pending-quizzes'  : ''}} {{ $sectionName == 'pending_quizzes' ? 'active' : ''}}">
                            {{ __('messages.quizzes.pending_quizzes') }}
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <a href="{{ route('quizzes.taken') }}"
                            class="nav-link {{ $sectionName == 'taken_quizzes' ? 'active' : ''}}">
                            {{ __('messages.quizzes.taken_quizzes') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @if ($sectionName == 'pending_quizzes')
        <div class="col-md-9">
            <div class="h-100">
                @forelse ($quizzes as $index=>$quiz)
                    <div class="mb-4 d-flex justify-content-between align-items-stretch">
                        <div>
                            <span class="quiz_name h5 mr-3"> Quiz {{$index+1}}# </span>
                            <span class="quiz_name h5 font-weight-bold"> {{$quiz->quiz->name}} </span>
                        </div>
                        <div>
                            <a href="{{ url('/quiz/' . $quiz->quiz->name . '/take') }}">
                                <button class="btn btn-primary pt-2 pb-2 pr-5 pl-5"> Take Quiz </button>
                            </a>
                        </div>
                    </div>
                @empty
                    <div>
                        <p class="h5 text-center"> No pending quizzes are availble right now </p>
                    </div>
                @endforelse
            </div>
                <div>

                </div>
            </div>
    
    @else
        <div class="col-md-9">
                
        </div>
    @endif

</div>

<style>
    .take-quiz {
        background-color:rgb(0, 86, 210);
        color:rgb(255, 255, 255);
        box-shadow: rgb(0, 86, 210) 0px 0px 0px 1px inset;
    }
    .take-quiz:hover {
        background-color: #0000D9;
    }
    .take-quiz:active {
        background-color: #000085;
    }
    .quiz_name{
        color: black;
    }
    .pending-quizzes[data-count]{
        position:relative;
    }
    .pending-quizzes[data-count]:after{
        position: absolute;
        left: -0.75em;
        top: -.75em;
        content: attr(data-count);
        padding: .5em;
        border-radius: 10em;
        line-height: .9em;
        color: white;
        background: rgba(255,0,0,.75);
        text-align: center;
        min-width: 2em;
        font: bold 0.8em sans-serif;
    }
</style>

