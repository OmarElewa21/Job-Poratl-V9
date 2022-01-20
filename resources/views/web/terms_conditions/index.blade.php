@extends('web.layouts.app')
@section('title')
    {{ __('messages.setting.terms_conditions') }}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/header-span.css') }}">
@endsection
@section('content')
    {{--    <!-- =============== Start of Page Header 1 Section =============== -->--}}
    {{--    <section class="page-header">--}}
    {{--        <div class="container">--}}
    {{--            <!-- Start of Page Title -->--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <h2>{{ __('messages.setting.terms_conditions') }}</h2>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <!-- End of Page Title -->--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <!-- =============== End of Page Header 1 Section =============== -->--}}

    {{--    <!-- ===== Privacy Policy ===== -->--}}
    {{--    <section class="ptb80">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="col-md-8 col-md-offset-2">--}}
    {{--                            <p>{!! nl2br($termsConditions->value) !!} </p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <!-- End of Tab Content -->--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <!-- ===== End Privacy Policy ===== -->--}}

    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>{{ __('messages.setting.terms_conditions') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('front.home') }}">{{ __('web.home') }}</a></li>
                    <li>{{ __('messages.setting.terms_conditions') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="tnc-section">
        <div class="auto-container">
            <div class="text-box">
                <p>{!! nl2br($termsConditions[0]['value']) !!}</p>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        let registerSaveUrl = "{{ route('front.save.register') }}";
        let logInUrl = "{{ route('login') }}";
    </script>
    <script src="{{mix('assets/js/front_register/front_register.js')}}"></script>
@endsection
