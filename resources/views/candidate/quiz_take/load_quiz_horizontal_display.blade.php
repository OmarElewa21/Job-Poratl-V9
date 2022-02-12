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
                        <i class="fas fa-arrow-left text-red mr-2"></i>
                        <span class="font-weight-bold text-red">Back</span>
                    </a>
                @else
                    <a href="/" class="d-flex align-items-center back">
                        <span class="font-weight-bold text-info">Home</span>
                    </a>
                @endauth
                
            </div>
            <div class="mr-5 d-flex text-info">
                <h4 class="font-weight-bold">Quiz# </h4>
                <span class="h4 ml-2">{{$quiz->name}}</span>
            </div>
            <div>
                <input type="checkbox" name="night_mode" id="night_mode">
                <label for="night_mode"> Night Mode </label>
            </div>
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
                            {!! Form::label('name', 'Name', ['class' => 'font-weight-bold']) !!}<span class="text-red">*</span>
                            {!! Form::text('name', null, ['id'=>'name','class' => 'form-control','required']) !!}
                        </div>
                        <div class="form-group col-sm-12 col-md-5">
                            {!! Form::label('email', 'Email' , ['class' => 'font-weight-bold']) !!}<span class="text-red">*</span>
                            {!! Form::text('email', null, ['id'=>'email','class' => 'form-control','required']) !!}
                        </div>
                    </div>
                @endif

                <div class="mb-5">
                    <div class="mr-5 text-center">
                        <span class="h3 ml-2">{{$quiz->name}}</span>
                    </div>
                </div>

                @foreach($questions as $index=>$question)
                    <table class="w-100 mt-5">
                        <tr class="row mb-3">
                            <th class="col-7 text-red">
                                <span class="font-weight-bold mr-1">{{$index+1}}.</span>
                                <span class="font-weight-normal">{{$question['question_text']}}</span>
                            </th>

                            @foreach ($question['answers'] as $answer)
                                <th class="col-1 text-center">
                                    <span class="font-weight-normal">{{ $answer['answer_text'] }}</span>
                                </th>
                            @endforeach
                            
                        </tr>
                        <tr class="row tr-answer">
                            <td class="col-7"></td>
                            @foreach ($question['answers'] as $answer)
                                <td class="col-1 text-center">
                                    <input name="{{'question[' . $question['id'] . ']'}}" value="{{$answer['id']}}" type="radio" class="mb-1" style="font-size:large; line-height: 1.4; padding:20px;" required>
                                </td>
                            @endforeach
                        </tr>
                    </table>
                @endforeach
                <div class="text-center mb-5">
                    <input class="btn btn-outline-danger btn-lg" id="submit_button" type="submit" value="Send my answers">
                </div>
            </section>
            {{ Form::close() }}
        </main>
    </div>

    <style>
        table{
            margin-bottom: 10% !important;
        }
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
        .td {
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: normal !important;
            font-weight: normal !important;
        }
        input[type="radio"] {
                -ms-transform: scale(1.5); /* IE 9 */
                -webkit-transform: scale(1.5); /* Chrome, Safari, Opera */
                transform: scale(1.5);
        }
        body {
            display: flex;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: white;
            font-family: verdana, sans-serif;
            color: black;
        }
        .text-red{
            color: #dc3545;
        }
    </style>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script>
        function checkAnswers(color=false){
            let tr_answers = document.querySelectorAll(".tr-answer");
                tr_answers.forEach((tr_answer)=> {
                    let checked = 0;
                    let inputs = tr_answer.querySelectorAll('input');
                    inputs.forEach((input)=>{
                        if(input.checked){
                            checked = 1;
                        }
                    })
                    if(color){
                        tr_answer.parentElement.parentElement.style.backgroundColor = $("body").css("background-color");
                    }else{
                        if(checked == 0){
                            if($("body").css("background-color") == 'rgb(255, 255, 255)'){
                                tr_answer.parentElement.parentElement.style.backgroundColor = "#CEC5C5";
                            }else{
                                tr_answer.parentElement.parentElement.style.backgroundColor = "#2a2f3b";
                            }
                        }
                        else{
                            tr_answer.parentElement.parentElement.style.backgroundColor = $("body").css("background-color");
                        }
                    }
                });
        }

        $(document).ready(function(){
            $(".alert").delay(3000).slideUp(300);
        });

        let submit_button = document.getElementById("submit_button");

        submit_button.addEventListener("click", function(){checkAnswers()});

        $("#night_mode").change(function(){
            if($(this).is(':checked')){
                $("body").css({
                    "background-color": '#313645',
                    "color" : "white"
                });
                $(".text-red").css("color", "rgb(243, 144, 144)");
                checkAnswers(true)
            }else{
                $("body").css({
                    "background-color": 'white',
                    "color" : "black"
                });
                $(".text-red").css("color", "#dc3545");
                checkAnswers(true)
            }
        })
    </script>
</body>
