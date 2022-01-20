<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> {{$quiz->name}} | {{config('app.name')}} </title>
    <link rel="shortcut icon" href="{{ getSettingValue('favicon') }}" type="image/x-icon">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
</head>

<body>
    <div class="container-fluid">
        <header class="d-flex justify-content-between align-items-center border-bottom p-3 mb-5">
            <div class="ml-5">
                @auth
                    <a href="{{url('/candidate/users/quizzes/pending-quizzes')}}" class="d-flex align-items-center back">
                        <span class="font-weight-bold text-info">Back</span>
                    </a>
                @else
                    <a href="/" class="d-flex align-items-center back">
                        <span class="font-weight-bold text-info">Home</span>
                    </a>
                @endauth
                
            </div>
            <div class="mr-5 d-flex">
                <h4 class="font-weight-bold">Quiz# </h4>
                <span class="h4 ml-2">{{$quiz->name}}</span>
            </div>
            <div></div>
        </header>
    
        <main class="container">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
    
            {{ Form::open(array('url' => 'quiz/'.$quiz->id.'/take'))}}
            <section class="w-100">
                @if (!auth()->check())
                    <div class="d-flex flex-row flex-wrap justify-content-around mb-4">
                        <div class="form-group col-sm-12 col-md-5">
                            {!! Form::label('name', 'Name', ['class' => 'font-weight-bold']) !!}<span class="text-danger">*</span>
                            {!! Form::text('name', null, ['id'=>'name','class' => 'form-control','required']) !!}
                        </div>
                        <div class="form-group col-sm-12 col-md-5">
                            {!! Form::label('email', 'Email' , ['class' => 'font-weight-bold']) !!}<span class="text-danger">*</span>
                            {!! Form::text('email', null, ['id'=>'email','class' => 'form-control','required']) !!}
                        </div>
                    </div>
                @endif

                <div class="mb-4">
                    <div class="mr-5 d-flex">
                        <span class="h3 ml-2">{{$quiz->name}}</span>
                    </div>
                </div>

                @foreach($questions as $index=>$question)
    
                    <div class="w-100 d-flex justify-content-between mb-5">
                        <div>
                            <div class="mb-3">
                                <span class="font-weight-bold mr-1">{{$index+1}}.</span>
                                <span>{{$question['question_text']}}<span>
                            </div>
        
                            <div>
                                <ul class="tr-answer">
                                    @foreach ($question['answers'] as $answer)
                                        <div class="d-flex align-items-center">
                                            <input name="{{'question[' . $question['id'] . ']'}}" value="{{$answer['id']}}" type="radio" class="mb-1" style="font-size:large; line-height: 1.4; padding:20px;" required>
                                            <li class="ml-3 mb-2"> {{ $answer['answer_text'] }} </li>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center mb-5">
                    <input class="btn btn-outline-primary btn-lg" id="submit_button" type="submit" value="Send my answers">
                </div>
            </section>
            {{ Form::close() }}
        </main>
    </div>

    <style>
        .back {
            font-size: large;
        }
        .back:hover{
            text-decoration: none;
        }
        ul {
            list-style-type: none;
        }
        .width-100 {
            width: 100%;
        }
    </style>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(".alert").delay(3000).slideUp(300);
        });

        let submit_button = document.getElementById("submit_button");

        submit_button.addEventListener("click", function(e) {
        let tr_answers = document.querySelectorAll(".tr-answer");
            tr_answers.forEach((tr_answer)=> {
                let checked = 0;
                let inputs = tr_answer.querySelectorAll('input');
                inputs.forEach((input)=>{
                    if(input.checked){
                        checked = 1;
                    }
                })
                if(checked == 0){
                    tr_answer.parentElement.parentElement.parentElement.style.backgroundColor = "#fff7f8";
                }
                else{
                    tr_answer.parentElement.parentElement.parentElement.style.backgroundColor = "white";
                }
            });
        });
    </script>
</body>
