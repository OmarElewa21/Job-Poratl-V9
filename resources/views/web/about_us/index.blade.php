@extends('web.layouts.app')
@section('title')
    {{ __('messages.about_us') }}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/header-span.css') }}">
@endsection
@section('content')
    {{--    <section class="page-header">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <h2>{{ __('web.about_us') }}</h2>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    {{--    <section class="about-us ptb80 custom-ptb-60-30">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12 col-xs-12">--}}
    {{--                    <h3 class="text-purple">{{ __('web.about_us') }}</h3>--}}
    {{--                    <p class="pt30">{!! getSettingValue('about_us') !!}</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    {{--    <section class="about-process ptb80 custom-ptb-60-30">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}

    {{--                <div class="col-md-12">--}}
    {{--                    <div class="section-title custom-pb-40">--}}
    {{--                        <h2>{{ __('web.about_us_menu.how_it_works') }}</h2>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <!-- Start of First Column -->--}}
    {{--                <div class="col-md-4 col-xs-12 text-center custom-mb-30">--}}
    {{--                    <div class="process-icon">--}}
    {{--                        <i class="fa fa-pencil" aria-hidden="true"></i>--}}
    {{--                    </div>--}}

    {{--                    <h5 class="uppercase text-purple pt20 step-no">{{ __('web.about_us_menu.step_1') }}</h5>--}}
    {{--                    <h3 class="pb20">{{ __('web.about_us_menu.register') }}</h3>--}}
    {{--                    <p>{{ __('web.about_us_menu.start_by_creating_an_account') }}</p>--}}
    {{--                </div>--}}
    {{--                <!-- End of First Column -->--}}


    {{--                <!-- Start of Second Column -->--}}
    {{--                <div class="col-md-4 col-xs-12 text-center custom-mb-30">--}}
    {{--                    <div class="process-icon">--}}
    {{--                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i>--}}
    {{--                    </div>--}}

    {{--                    <h5 class="uppercase text-purple pt20 step-no">{{ __('web.about_us_menu.step_2') }}</h5>--}}
    {{--                    <h3 class="pb20">{{ __('web.about_us_menu.submit_resume') }}</h3>--}}
    {{--                    <p>{{ __('web.about_us_menu.fill_out_our_forms_and_submit') }}</p>--}}
    {{--                </div>--}}
    {{--                <!-- End of Second Column -->--}}


    {{--                <!-- Start of Third Column -->--}}
    {{--                <div class="col-md-4 col-xs-12 text-center custom-mb-30">--}}
    {{--                    <div class="process-icon">--}}
    {{--                        <i class="fa fa-money" aria-hidden="true"></i>--}}
    {{--                    </div>--}}

    {{--                    <h5 class="uppercase text-purple pt20 step-no">{{ __('web.about_us_menu.step_3') }}</h5>--}}
    {{--                    <h3 class="pb20">{{ __('web.about_us_menu.start_working') }}</h3>--}}
    {{--                    <p>{{ __('web.about_us_menu.start_your_new_career_by_working') }}</p>--}}
    {{--                </div>--}}
    {{--                <!-- End of Third Column -->--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    {{--    <section class="ptb80 custom-ptb-60-30" id="faq-page">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}

    {{--                <div class="col-md-12">--}}
    {{--                    <div class="section-title custom-pb-40">--}}
    {{--                        <h2>{{ __('web.about_us_menu.frequently_asked_questions') }}</h2>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <!-- Start of Topic 1 -->--}}
    {{--                @if(count($faqLists) > 0)--}}
    {{--                    @foreach($faqLists as $key => $faqList)--}}
    {{--                        <div class="col-lg-12 col-md-10 col-sm-10 col-xs-10 col-xs-offset-1 topic">--}}
    {{--                            <!-- Question -->--}}
    {{--                            <div class="open">--}}
    {{--                                <h6 class="question text-dark">{{ $loop->iteration }}--}}
    {{--                                    . {{ html_entity_decode($faqList->title) }}</h6>--}}
    {{--                                <i class="fa fa-angle-down hidden-xs"></i>--}}
    {{--                            </div>--}}

    {{--                            <!-- Answer -->--}}
    {{--                            <div class="answer ml-3">--}}
    {{--                                <p>{!!  nl2br( $faqList->description) !!}</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    @endforeach--}}
    {{--                @else--}}
    {{--                    <div class="faq-not-available">--}}
    {{--                        <h5 class="text-center">{{__('web.about_us_menu.faq_not_available')}}.</h5>--}}
    {{--                    </div>--}}
    {{--            @endif--}}
    {{--            <!-- End of Topic 1 -->--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>{{ __('web.about_us') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('front.home') }}">{{ __('web.home') }}</a></li>
                    <li>{{ __('web.about_us') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- About Section Three -->
    <section class="about-section-three">
        <div class="auto-container">
            <div class="text-box">
                <h4>{{ __('web.about_us') }}</h4>
                <p>{!! getSettingValue('about_us') !!}</p>
            </div>
        </div>
    </section>
    <!-- End About Section Three -->

    <!-- Work Section -->
    <section class="work-section style-two">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>{{ __('web.about_us_menu.how_it_works') }}?</h2>
                <div class="text">{{ __('web.web_jobSeeker.job_for_anyone_anywhere') }}</div>
            </div>

            <div class="row">
                <!-- Work Block -->
                <div class="work-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box h-100">
                        <figure class="image custom-about-image"><img class="h-100 w-100 home-banner"
                                                                      src="{{$settings['about_image_one']}}" alt="">
                        </figure>
                        <h5 class="uppercase text-purple pt20 step-no">{{ __('web.about_us_menu.step_1') }}</h5>
                        <h5> {{$settings['about_title_one']}}</h5>
                        <p>{{ $settings['about_description_one'] }}</p>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="work-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box h-100">
                        <figure class="image custom-about-image"><img class="h-100 w-100 home-banner" src="{{$settings['about_image_two']}}" alt=""></figure>
                        <h5 class="uppercase text-purple pt20 step-no">{{ __('web.about_us_menu.step_2') }}</h5>
                        <h5> {{$settings['about_title_two']}}</h5>
                        <p>{{ $settings['about_description_two'] }}</p>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="work-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box h-100">
                        <figure class="image custom-about-image"><img class="h-100 w-100 home-banner" src="{{$settings['about_image_three']}}" alt=""></figure>
                        <h5 class="uppercase text-purple pt20 step-no">{{ __('web.about_us_menu.step_3') }}</h5>
                        <h5> {{$settings['about_title_three']}}</h5>
                        <p>{{ $settings['about_description_three'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Work Section -->

    <!-- Frequently Asked Questions -->
    <section class="faqs-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>{{ __('web.about_us_menu.frequently_asked_questions') }}</h2>
            </div>

            <!--Accordian Box-->
            <ul class="accordion-box">
            @if(count($faqLists) > 0)
                @foreach($faqLists as $key => $faqList)
                    <!--Block-->
                        <li class="accordion block">
                            <div class="acc-btn"> {{ html_entity_decode($faqList->title) }} <span
                                        class="icon flaticon-add"></span></div>
                            <div class="acc-content">
                                <div class="content">
                                    <p>{!!  nl2br( $faqList->description) !!}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <div class="faq-not-available">
                        <h5 class="text-center">{{__('web.about_us_menu.faq_not_available')}}.</h5>
                    </div>
            @endif
            <!--Block-->
            </ul>
        </div>
    </section>
    <!-- Frequently Asked Questions -->

@endsection
