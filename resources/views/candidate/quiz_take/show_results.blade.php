@extends('web.layouts.app')
@section('title')
    {{ __('quizzes.take') }}
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
                    foreach ($quiz_grades as $grade){
                        echo date_format($grade->created_at, "F j,Y , g:i A");
                        break;
                    }
                @endphp
            </span>
        </div>
    </div>
    <div class="results-content">
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
        margin-top: 4%;
        margin-bottom: 4%;
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
</style>