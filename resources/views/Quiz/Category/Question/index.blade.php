@extends('layouts.app')
@section('title')
    {{ __('messages.quizzes.quiz_question_title') }}
@endsection
@push('css')
    <link href="{{ asset('assets/css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $category->name }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{route('category.index')}}" class="btn btn-primary form-btn back-btn-right mr-2">
                    <i class="fas fa-arrow-left"></i> {{__('messages.common.back')}}
                </a>
                <a href="#" class="btn btn-primary form-btn back-btn-right" onclick="questions.add({{$category->id}}, 'true')">{{ __('messages.quizzes.question_add') }}
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('Quiz.Category.Question.table')
                </div>
            </div>
        </div>

        <div id="categoryModal" class="modal fade" role="dialog"></div>
    </section>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/jquery-confirm.min.js')}}"></script>
    <script src="{{asset('assets/js/notify.min.js')}}"></script>
    <script src="{{asset('assets/js/quizzes/questions.js')}}?<?= time() ?>"></script>
@endpush
