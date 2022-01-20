@extends('layouts.app')
@section('title')
    {{ __('messages.quizzes.category') }}
@endsection
@push('css')
    <link href="{{ asset('assets/css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.quizzes.category_title') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn back-btn-right" onclick="optionBox.add('0', 'parent')">
                    {{ __('messages.quizzes.add_category') }}
                    <i class="fas fa-plus"></i>
                </a>

                <a href="#" class="btn btn-success ml-2 form-btn back-btn-right" onclick="importExcel('/admin/quizzes/category/loading/uploadexcel')">
                    {{ __('messages.quizzes.importExcel') }}
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>

        <div class="section-body">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @elseif(session()->has('Error'))
                <div class="alert alert-danger">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    @forelse($categories as $category)
                        <details>
                            <summary>
                                <span> ({{$category->id}}) {{$category->name}} </span>
                                <a href="#" class="float-right arrow mr-1 ml-2 category_click_options"
                                    title="{{ __('messages.quizzes.category_click_options') }}"
                                    onclick="show({{$category->id}})">
                                    <i class="fas fa-th-large"></i>
                                </a>
                                @if (count($category->category_questions) > 0)
                                    <a href="{{route('question.index', ["category_id" => $category->id])}}" class="float-right arrow mr-1 ml-2"
                                        title="{{ __('messages.common.view') }}"
                                        onclick="">
                                        {{__('messages.common.view') . ' ' . count($category->category_questions) . ' ' . __('messages.quizzes.questions')}} 
                                    </a>
                                @endif
                                
                            </summary>
                            <ul>
                                @php
                                    rec_categories($category->sub_categories);
                                @endphp
                            </ul>
                        </details>
                    @empty
                        <h4 class="text-center"> {{ __('messages.quizzes.no_category_found') }} </h4>
                    @endforelse
                </div>
            </div>
        </div>

        <div id="categoryModal" class="modal fade" role="dialog"></div>
    </section>
@endsection


@push('css')
    <style>
        .arrow {
            color: aliceblue;
        }
        .arrow:hover {
            color: rgb(208, 219, 230);
        }
        .arrow > .fas {
            font-size: 20px !important;
        } 
        .card-body > details {
            width: 100%;
            margin-bottom: 10px;
        }
        .card-body > details summary {
            color: white;
            padding: 8px;
            background-color: #255896;
            border: 1px solid #174378;
            border-radius: 3px;
            line-height: 20px;
        }
        .card-body > details summary span {
            color: white !important;
        }
        .card-body > details summary::-webkit-details-marker {
            margin-right: 14px;
        }
        .card-body > details > details {
            margin: 5px 0;
            margin-left: 15px;
            position: relative;
        }
        .card-body > details > details::after {
            content: "";
            position: absolute;
            top: -5px;
            left: -10px;
            width: 1px;
            height: calc(36px + 10px);
            background-color: #c7d3df;
        }
        .card-body > details > details:last-child::after {
            height: calc(36px / 2 + 5px);
        }
        .card-body > details > details::before {
            content: "";
            position: absolute;
            top: calc(36px / 2);
            left: -10px;
            width: 8px;
            height: 1px;
            background-color: #c7d3df;
        }
        .card-body > details > details[open]:not(:last-child)::after {
            height: calc(100% + 5px);
        }
        .card-body > details > details summary {
            color: white;
            padding: 8px;
            background-color: #174378;
            border: 1px solid #174378;
            border-radius: 3px;
        }
        .card-body > details > details summary::-webkit-details-marker {
            margin-right: 14px;
        }
        .card-body > details > details > details {
            margin: 5px 0;
            margin-left: 15px;
            position: relative;
        }
        .card-body > details > details > details::after {
            content: "";
            position: absolute;
            top: -5px;
            left: -10px;
            width: 1px;
            height: calc(28px + 10px);
            background-color: #c7d3df;
        }
        .card-body > details > details > details:last-child::after {
            height: calc(28px / 2 + 5px);
        }
        .card-body > details > details > details::before {
            content: "";
            position: absolute;
            top: calc(28px / 2);
            left: -10px;
            width: 8px;
            height: 1px;
            background-color: #c7d3df;
        }
        .card-body > details > details > details[open]:not(:last-child)::after {
            height: calc(100% + 5px);
        }
        .card-body > details > details > details summary {
            margin: 5px 0;
            padding: 5px 10px;
            background-color: #dfe7ec;
            border: 1px solid #c7d3df;
            border-radius: 3px;
            color: #545f69;
            position: relative;
        }
        .card-body > details > details > details summary span {
            color: #7698b6;
        }
        .card-body ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .card-body li {
            margin: 5px 0;
            padding: 5px 10px;
            background-color: #dfe7ec;
            border: 1px solid #c7d3df;
            border-radius: 3px;
            color: #545f69;
            position: relative;
            margin-left: 15px;
            position: relative;
        }
        .card-body li span {
            color: #041320;
        }
        .card-body li > a {
            color: #174378;
        }
        .card-body li > a:hover {
            color: #3a5577;
        }
        .card-body li::after {
            content: "";
            position: absolute;
            top: -5px;
            left: -10px;
            width: 1px;
            height: calc(28px + 10px);
            background-color: #c7d3df;
        }
        .card-body li:last-child::after {
            height: calc(28px / 2 + 5px);
        }
        .card-body li::before {
            content: "";
            position: absolute;
            top: calc(28px / 2);
            left: -10px;
            width: 8px;
            height: 1px;
            background-color: #c7d3df;
        }
        .card-body li[open]:not(:last-child)::after {
            height: calc(100% + 5px);
        }
    </style>
@endpush

@push('scripts')
    <script>
        let categorySaveUrl = "{{ route('category.store') }}";
    </script>
    <script src="{{asset('assets/js/quizzes/category.js')}}?<?= time() ?>"></script>
    <script src="{{asset('assets/js/quizzes/questions.js')}}?<?= time() ?>"></script>
    <script src="{{asset('assets/js/notify.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-confirm.min.js')}}"></script>
@endpush

@php
    function rec_categories($category){
        if(count($category) > 0){
            foreach($category as $sub_category){
                if(count($sub_category->sub_categories) == 0){
                    echo "<li>
                        <span>  ($sub_category->id) $sub_category->name </span>
                            <a href=\"#\" class=\"float-right ml-2 arrow category_click_options\"
                                title=\"" . __('messages.quizzes.category_click_options') . "\"
                                onclick=\"show($sub_category->id)\">
                                <i class=\"fas fa-th-large\"></i>
                            </a>";
                    if (count($sub_category->category_questions) > 0)
                        echo "<a href=" . route('question.index', ["category_id" => $sub_category->id]). " class=\"float-right mr-2\"
                                title=\"" . __('messages.common.view') . "\"
                                onclick=\"  \">" .
                                __('messages.common.view') . ' ' . count($sub_category->category_questions) . ' ' . __('messages.quizzes.questions') .
                            "</a>
                        </li>";
                    rec_categories($sub_category->sub_categories);
                }
                else{
                    echo "<li><details>
                        <summary>
                            <span> ($sub_category->id) $sub_category->name </span>
                            <a href=\"#\" class=\"float-right arrow category_click_options\"
                                title=\"" . __('messages.quizzes.category_click_options') . "\"
                                onclick=\"show($sub_category->id)\">
                                <i class=\"fas fa-th-large\"></i>
                            </a>
                        </summary>
                    <ul>";
                    rec_categories($sub_category->sub_categories);
                    echo "</ul></details></li>";
                }
            }
        }
    }
@endphp