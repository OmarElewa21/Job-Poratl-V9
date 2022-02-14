@extends('web.layouts.app')
@section('title')
    {{ __('quizzes.take') }}
@endsection

@section('css')
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@endsection

@section('content')
    <div class="ptb40 custom-pt-40 bg-info">
        <div class="section-title custom-pb-30">
            <h2 class="text-center h2-title">{{ __('messages.quizzes.quizzes_results') }}</h2>
        </div>
        <div class="user text-uppercase change-font-family">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>RESULTS FOR</span>
            <span class="font-weight-bold"> {{$name}} </span>
        </div>
        <div class="calender text-uppercase">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <span class="change-font-family">
                @php
                    $categories = [];
                    foreach ($quiz_grades as $grade){
                        echo date_format($grade->created_at, "F j,Y , g:i A");
                        break;
                    }
                @endphp
            </span>
        </div>
    </div>
    
    <div class="results-content">
        <div class="chart_div">
            @foreach ($quiz_grades as $quiz_grade)
                @if (!is_null($quiz_grade->category_percentage) && count($quiz_grade->category->classes) == 2)
                    <div style="margin-bottom: 30px; padding-top:5px">
                        <p class="text-center font-weight-bold mb-2">{{$quiz_grade->category->name}}</p>
                        @if (!is_null($quiz_grade->category->description))
                            <p class="text-center text-secondary">{{$quiz_grade->category->description}}</p>
                        @endif

                        <div>
                            @php
                                $percentage = $quiz_grade->category_percentage/2 + 50;
                            @endphp
                            <label class="change-font-family text-success"> {{$quiz_grade->result_sign}}: <span class="font-wight-bold change-font-family">{{$percentage}}%</span> </label>
                            
                            <div class="progress" style="margin-bottom:0">
                                
                                <div class="progress-bar bg-success font-wieght-bold" role="progressbar" style="width: {{$percentage}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    {{$percentage}}%
                                </div>
                                <div class="progress-bar font-wieght-bold" role="progressbar" style="width: {{100 - $percentage}}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                    {{100 - $percentage}}%
                                </div>
                            </div>

                            <label class="float-right change-font-family text-primary">
                                @foreach ($quiz_grade->category->classes as $class)
                                    @if ($quiz_grade->result_sign != $class->name)
                                        {{$class->name}}: <span class="font-wight-bold change-font-family">{{100 - $percentage}}%</span>
                                    @endif
                                @endforeach
                            </label>
                        </div>
                    </div>
                    <hr>
                @endif
            @endforeach
        </div>

        <div class="d-flex flex-row flex-wrap chart_div" style="border:none; padding-top:0">
            @foreach ($quiz_grades as $quiz_grade)
                @if (count($quiz_grade->category->classes) != 2)
                    <div style="width: 30%; margin-bottom:1%">
                        <p class="font-weight-bold text-dark">{{$quiz_grade->category->name}}</p>
                        <p>
                            <span class="font-weight-bold text-secondary">{{$quiz_grade->result_sign}}</span>:
                            <span class="text-success">{!! is_null($quiz_grade->category_percentage) ? "<i class=\"fas fa-check-circle\"></i>" : $quiz_grade->category_percentage . "%" !!}</span>
                        </p>
                    </div>
                @endif
            @endforeach
        </div>

        <div style="margin-top:2%;">
            <h3 class="text-primary">Interpretation of Results</h3>
            <div class="ml-5">
                @foreach ($quiz_grades as $cat_grade)
                    <ul class="cat">
                        @php
                            $result_text = explode("\n", $cat_grade->result_text);
                            foreach($result_text as $text){
                                $text = str_replace("\\n", "", $text);
                                echo "<li>$text</li>";
                            }
                        @endphp
                    </ul>
                @endforeach
            </div>
            
        </div>
    </div>
@endsection

<style>
    .user, .calender {
        font-size: larger;
        margin-left: 5%;
        letter-spacing: 1px;
    }
    .change-font-family{
        font-family: Arial !important
    }
    .user {
        margin-bottom: 2%;
    }
    .fa-user,  .fa-calendar{
        font-size: xx-large !important;
        position: relative;
        top: 5px;
        margin-right: 1%;
    }
    .results-content {
        padding: 3% 5%;
    }
    .element {
        margin-bottom: 4%; 
    }
    .text {
        margin-top: 1%;
    }
    .text p {
        padding-left: 10px;
    }
    .cat {
        margin-top: 1%;
        margin-bottom: 1%;
    }
    .cat li{
        list-style-type: initial;
        font-size: larger;
        margin-top: 1%
    }
    .h2-title {
        margin-top: 7%;
    }

    @media screen and (max-width: 800px) {
        .bg-info {
            padding-bottom: 40px !important;
        }
    }
    #graph-img {
        width: 300px;
    }
    .chart_div {
        width:75%;
        margin:auto;
        margin-bottom:2%;
        border:1px solid #dcdcdc;
        padding: 1% 3%;
    }
</style>
