@extends('layouts.app')
@section('title')
    {{ __('messages.quizzes.quizzes_title') }}
@endsection
@push('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.quizzes.quizzes_title') }}</h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-primary form-btn back-btn-right" onclick="quizzes.add()">
                    {{ __('messages.quizzes.quiz_add') }}
                    <i class="fas fa-plus"></i>
                </a>
                <a href="#" class="btn btn-success ml-2 form-btn back-btn-right" onclick="importExcel('/admin/quizzes/quizzes/loading/uploadexcel')">
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
                    @include('Quiz.table')
                </div>
            </div>
        </div>

        <div id="quizModal" class="modal fade" role="dialog"></div>
    </section>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/jquery-confirm.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('assets/js/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{asset('assets/js/notify.min.js')}}"></script>
    <script src="{{asset('assets/js/quizzes/quizzes.js')}}?<?= time() ?>"></script>
@endpush
