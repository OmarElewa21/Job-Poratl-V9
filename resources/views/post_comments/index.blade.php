@extends('layouts.app')
@section('title')
    {{ __('messages.post.comment') }}
@endsection
@push('css')
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/summernote.min.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    <section class="section">
        <div class="section-header flex-wrap">
            <h1>{{ __('messages.post_comments') }}</h1>
        </div>
        <div class="section-body">
            @include('flash::message')
            <div class="card">
                <div class="card-body overflow-hidden">
                    @include('post_comments.table')
                </div>
            </div>
        </div>
        @include('post_comments.templates.templates')
        @include('post_comments.show_model')
    </section>
@endsection
@push('scripts')
    <script>
        let postCommentsUrl = "{{ route('post.comments') }}";
        let deleteComment = "{{ url('/post-comments/') }}"
        let showComment = "{{ url('admin/post-comments/') }}"
    </script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/post_comments/post_comments.js')}}"></script>
@endpush

