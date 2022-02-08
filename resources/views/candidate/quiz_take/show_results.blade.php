@extends('web.layouts.app')
@section('title')
    {{ __('quizzes.take') }}
@endsection

@section('css')
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@endsection

@section('content')
    <div class="pt-4 bg-info pl-4">
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
                        $categories = [];
                        break;
                    }
                @endphp
            </span>
        </div>
    </div>
    
    <div class="results-content">
        <div id="chart_div">
        </div>

        <div class="d-flex flex-row flex-wrap justify-content-center">
            @foreach ($all_quiz_grades as $all_cat_grade)
                <div style="width: 30%; margin-bottom:2%">
                    <p class="font-weight-bold h6 text-dark">{{$all_cat_grade->category->name}}</p>
                    <p>
                        <span class="font-weight-bold h6 text-secondary">{{$all_cat_grade->result_sign}}</span>:
                        <span class="text-success">{!! is_null($all_cat_grade->category_percentage) ? "<i class=\"fas fa-check-circle\"></i>" : $all_cat_grade->category_percentage . "%" !!}</span>
                    </p>
                </div>
            @endforeach
        </div>

        <div style="margin-top:3%;">
            <h3 class="text-primary">Interpretation of Results</h3>
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

            @foreach ($all_quiz_grades as $all_cat_grade)
                @if (!is_null($all_cat_grade->category_percentage))
                    @php
                        array_push($categories, [$all_cat_grade->category->name, $all_cat_grade->category_percentage])
                    @endphp
                @endif
            @endforeach
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
    #graph-img {
        width: 300px;
    }
    #chart_div > div > div > div {
        position: relative !important;
        left: unset !important;
        margin: auto !important;
        
    }
</style>

@section('scripts')
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'percentage');
        let categories = <?php echo json_encode($categories); ?>;
        console.log(categories);
        data.addRows(categories);

        if(window.matchMedia("(min-width: 1200px)").matches){
            var options = {'title':'Categories','width':1200,'height':600};
        }else if(window.matchMedia("(min-width: 1000px)").matches){
            var options = {'title':'Categories','width':1000,'height':600};
        } else if (window.matchMedia("(min-width: 800px)").matches) {
            var options = {'title':'Categories','width':800,'height':600};
        } else if(window.matchMedia("(min-width: 500px)").matches) {
            var options = {'title':'Categories','width':500,'height':600};
        }else{
            var options = {'title':'Categories','width':300,'height':600};
        }
        
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
        
    $(window).resize(()=>{
        drawChart();
    })
    </script>
@endsection

