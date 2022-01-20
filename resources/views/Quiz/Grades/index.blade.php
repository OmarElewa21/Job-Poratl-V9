@extends('layouts.app')
@section('title')
    {{ __('messages.quizzes.quiz_takers') }}
@endsection

@push('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $quiz->name }}</h1>
            <div class="section-header-breadcrumb">
                <a href="{{route('quiz.index')}}" class="btn btn-primary form-btn back-btn-right mr-2">
                    <i class="fas fa-arrow-left"></i> {{__('messages.common.back')}}
                </a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('Quiz.Grades.table')
                </div>
            </div>
        </div>

        <div id="gradesModel" class="modal fade" role="dialog"></div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('assets/js/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{asset('assets/js/quizzes/quizzes.js')}}?<?= time() ?>"></script>
@endpush
