@extends('layouts.app')
@section('title')
    {{ __('About Us') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('About Us') }}</h1>
        </div>
        <div class="section-body">
            @include('flash::message')
            @include('layouts.errors')
            <div class="alert alert-danger d-none" id="validationErrorsBox"></div>
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['route' => 'cms.about-us.update','files' => true,]) }}

                    @include('cms_services.about-edit')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('assets/js/front_cms/front_cms_setting.js')}}"></script>
@endpush
