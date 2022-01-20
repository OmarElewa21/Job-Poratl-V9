@php
    $settings  = settings();
@endphp
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title') | {{config('app.name')}} </title>
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/responsive.css') }}">

    <link rel="shortcut icon" href="{{ getSettingValue('favicon') }}" type="image/x-icon">
    <link rel="icon" href="{{ getSettingValue('favicon') }}" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/chosen.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/jquery.modal.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/line-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/mmenu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/custom.css') }}">
{{--        <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/owl.css') }}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/select2.min.css') }}">--}}
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="{{ asset('web/js/html5shiv.min.js') }}"></script><![endif]-->
<!--[if lt IE 9]><script src="{{ asset('web_front/js/respond.js') }}"></script><![endif]-->

    {{--    <!-- Meta Tags - Description for Search Engine purposes -->--}}
    {{--    <meta name="description" content="{{config('app.name')}}">--}}
    {{--    <meta name="keywords"--}}
    {{--          content="{{config('app.name')}}">--}}
    {{--    --}}{{--        <link rel="shortcut icon" href="{{ asset($settings['favicon'])}}" type="image/x-icon">--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Website Title -->

    {{--    <!-- Google Fonts -->--}}
    {{--    <link href="//fonts.googleapis.com/css?family=Raleway:300,400,400i,700,800|Varela+Round" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    {{--    <!-- CSS links -->--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/bootstrap.min.css') }}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/font-awesome.min.css') }}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/owl.carousel.min.css') }}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/style.css') }}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/responsive.css') }}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/custom.css') }}">--}}
    {{--    <link rel="stylesheet" href="{{ mix('assets/css/flex.css') }}">--}}
    {{--    <link rel="stylesheet" href="{{ mix('assets/css/custom.css') }}">--}}
    {{--    <link rel="stylesheet" href="{{ mix('assets/css/custom-theme.css') }}">--}}
    {{--    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">--}}
    {{--        @livewireStyles--}}
    {{--    @yield('page_css')--}}
    @yield('css')
</head>
<body data-anm=".anm">
<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader">
        <svg version="1.1" id="L7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
             y="0px"
             viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
 <path fill="#1a67d2" d="M31.6,3.5C5.9,13.6-6.6,42.7,3.5,68.4c10.1,25.7,39.2,38.3,64.9,28.1l-3.1-7.9c-21.3,8.4-45.4-2-53.8-23.3
  c-8.4-21.3,2-45.4,23.3-53.8L31.6,3.5z">
     <animateTransform
         attributeName="transform"
         attributeType="XML"
         type="rotate"
         dur="2s"
         from="0 50 50"
         to="360 50 50"
         repeatCount="indefinite"/>
 </path>
            <path fill="#1a67d2" d="M42.3,39.6c5.7-4.3,13.9-3.1,18.1,2.7c4.3,5.7,3.1,13.9-2.7,18.1l4.1,5.5c8.8-6.5,10.6-19,4.1-27.7
  c-6.5-8.8-19-10.6-27.7-4.1L42.3,39.6z">
                <animateTransform
                    attributeName="transform"
                    attributeType="XML"
                    type="rotate"
                    dur="1s"
                    from="0 50 50"
                    to="-360 50 50"
                    repeatCount="indefinite"/>
            </path>
            <path fill="#1a67d2" d="M82,35.7C74.1,18,53.4,10.1,35.7,18S10.1,46.6,18,64.3l7.6-3.4c-6-13.5,0-29.3,13.5-35.3s29.3,0,35.3,13.5
  L82,35.7z">
                <animateTransform
                    attributeName="transform"
                    attributeType="XML"
                    type="rotate"
                    dur="2s"
                    from="0 50 50"
                    to="360 50 50"
                    repeatCount="indefinite"/>
            </path>
</svg>
    </div>
@if(Request::segment(1)=='candidate-register' || Request::segment(1)== 'employer-register'|| Request::segment(1)=='users')
    <!-- Header Start -->
        @include('web.layouts.login_header')
    @else
        <span class="header-padding"></span>
    @include('web.layouts.header')
@endif
<!-- Header End -->

    <!-- Main Content Start -->
@yield('content')
<!-- Main Content End -->
    <!-- Footer Start -->
@if(Request::segment(1)!='candidate-register' && Request::segment(1)!= 'employer-register'&& Request::segment(1)!='users')
    @include('web.layouts.footer')
@endif
<!-- Footer End -->

</div>
<!-- End Page Wrapper -->
{{--<!-- ===== All Javascript at the bottom of the page for faster page loading ===== -->--}}
<script src="{{ asset('messages.js') }}"></script>
{{--<script src="{{ asset('web/js/bootstrap.min.js') }}"></script>--}}
{{--<script src="{{ asset('web/js/bootstrap-select.min.js') }}"></script>--}}
{{--<script src="{{ asset('web/js/swiper.min.js') }}"></script>--}}
{{--<script src="{{ asset('web/js/jquery.countTo.js') }}"></script>--}}
{{--<script src="{{ asset('web/js/jquery.inview.min.js') }}"></script>--}}
{{--<script src="{{ asset('web/js/jquery.magnific-popup.min.js') }}"></script>--}}
{{--<script src="{{ asset('web/js/jquery-ui.min.js') }}"></script>--}}
{{--<script src="{{ asset('web/js/owl.carousel.min.js') }}"></script>--}}
{{--<script src="{{ asset('web/js/countdown.js') }}"></script>--}}
{{--<script src="{{ asset('web/js/isotope.min.js') }}"></script>--}}
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
{{--<script src="{{ asset('web/js/custom.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>--}}
@livewireScripts
<script src="{{ asset('web_front/js/jquery.js') }}"></script>
<script src="{{ asset('web_front/js/popper.min.js') }}"></script>
<script src="{{ asset('web_front/js/chosen.min.js') }}"></script>
<script src="{{ asset('web_front/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('web_front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('web_front/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('web_front/js/jquery.modal.min.js') }}"></script>
<script src="{{ asset('web_front/js/mmenu.polyfills.js') }}"></script>
<script src="{{ asset('web_front/js/mmenu.js') }}"></script>
<script src="{{ asset('web_front/js/appear.js') }}"></script>
<script src="{{ asset('web_front/js/anm.min.js') }}"></script>
<script src="{{ asset('web_front/js/owl.js') }}"></script>
<script src="{{ asset('web_front/js/wow.js') }}"></script>
<script src="{{ asset('web_front/js/script.js') }}"></script>
<script src="{{ asset('web_front/js/chart.min.js') }}"></script>
{{--<script src="{{ asset('web_front/js/infobox.min.js') }}"></script>--}}
<script src="{{ asset('web_front/js/jquery.countdown.js') }}"></script>
<script src="{{ asset('web_front/js/knob.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
{{--<script src="{{ asset('web_front/js/map-script.js') }}"></script>--}}
{{--<script src="{{ asset('web_front/js/maps.js') }}"></script>--}}
<script src="{{ asset('web_front/js/markerclusterer.js') }}"></script>
{{--<script src="{{ asset('web_front/js/select2.min.js') }}"></script>--}}
<script src="{{ asset('web_front/js/validate.js') }}"></script>
<script src="{{ mix('assets/js/web/js/news_letter/news_letter.js') }}"></script>
<script>
    let currentLocale = "{{ Config::get('app.locale') }}";
    Lang.setLocale(currentLocale);
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
    $(document).ready(function () {
        $('.alert').delay(5000).slideUp(300);
    });
    $('[data-dismiss=modal]').on('click', function (e) {
        var $t = $(this),
            target = $t[0].href || $t.data('target') || $t.parents('.modal') || [];

        $(target).modal('hide');
    });
    let createNewLetterUrl = "{{ route('news-letter.create') }}";

    function mobileView () {
        $('#mobile-view').removeClass('d-none');
        $('#mobile-register').removeClass('d-none');
        $('#mobile-login').removeClass('d-none');
    }
    {{--let favicon = '{{ getSettingValue('favicon') }}';--}}
    // if(!favicon){
    // $(".preloader:after").css("background-image",  favicon);
    // $('.preloader:after').css({"background-image","url("+favicon+")"});
    // } 
</script>
@yield('page_scripts')
@yield('scripts')
</body>
</html>
