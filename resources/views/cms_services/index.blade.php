@extends('layouts.app')
@section('title')
    {{ __('messages.cms_services') }}
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('messages.cms_services') }}</h1>
        </div>
        <div class="section-body">
            @include('flash::message')
            @include('layouts.errors')
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['route' => 'cms.services.update','files' => true]) }}
                    @include('cms_services.fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{asset('assets/js/front_cms/front_cms_setting.js')}}"></script>
@endpush

