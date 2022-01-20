@extends('web.layouts.app')
@section('title')
    {{ __('web.home') }}
@endsection
{{--@section('page_css')--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/web-popular-categories.css') }}">--}}
{{--    <!-- Template CSS -->--}}
{{--    <link rel="stylesheet" href="{{ asset('web/backend/css/components.css')}}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">--}}
{{--@endsection--}}
@section('content')
{{--    <!-- ===== Start of Main Search Section ===== -->--}}
{{--    @if($settings->value)--}}
{{--        <div class="item">--}}
{{--            <section class="main overlay-black">--}}
{{--                <!-- Start of Wrapper -->--}}
{{--                <div class="container wrapper">--}}
{{--                    <h1 class="capitalize text-center text-white"> {{ __('web.home_menu.your_career_starts_now') }}</h1>--}}

{{--                    <!-- Start of Form -->--}}
{{--                    <form class="job-search-form row pt40" action="{{ route('front.search.jobs') }}"--}}
{{--                          method="get">--}}

{{--                        <!-- Start of keywords input -->--}}
{{--                        <div class="col-md-4 col-sm-12 search-keywords">--}}
{{--                            <label for="search-keywords">{{ __('web.home_menu.keywords') }}</label>--}}
{{--                            <input type="text" name="keywords" id="search-keywords"--}}
{{--                                   placeholder="Job title, skill or company"--}}
{{--                                   autocomplete="off">--}}
{{--                            <div id="jobsSearchResults" class="position-absolute w100"></div>--}}
{{--                        </div>--}}

{{--                        <!-- Start of category input -->--}}
{{--                        <div class="col-md-3 col-sm-12 search-categories">--}}
{{--                            <label for="search-categories">{{ __('web.home_menu.any_category') }}</label>--}}
{{--                            <select name="categories" class="selectpicker" id="search-categories"--}}
{{--                                    data-live-search="true"--}}
{{--                                    title="Any Category" data-size="5">--}}
{{--                                @foreach($jobCategories as $key => $jobCategory)--}}
{{--                                    <option value="{{ $key }}">{{ html_entity_decode($jobCategory) }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <!-- Start of location input -->--}}
{{--                        <div class="col-md-3 col-sm-12 search-location">--}}
{{--                            <label for="search-location">{{ __('web.common.location') }}</label>--}}
{{--                            <input type="text" name="location" id="search-location" placeholder="Location">--}}
{{--                        </div>--}}

{{--                        <!-- Start of submit input -->--}}
{{--                        <div class="col-md-2 col-sm-12 search-submit">--}}
{{--                            <button type="submit" class="btn btn-purple btn-effect btn-large"><i--}}
{{--                                        class="fa fa-search"></i>{{ __('web.common.search') }}--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <!-- End of Form -->--}}

{{--                    <div class="extra-info pt20">--}}
{{--                        <span class="text-left text-white"><b>{{ $dataCounts['jobs'] }}</b> {{ __('web.home_menu.jobs_offers_for') }} <b> {{ __('web.home_menu.you') }}.</b></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End of Wrapper -->--}}
{{--                @if(count($headerSliders) > 0)--}}
{{--                    <div class="search-middle-image">--}}

{{--                    </div>--}}
{{--                @endif--}}
{{--                @if(count($headerSliders) > 0)--}}
{{--                    <div class="owl-carousel header-image-slider" id="image-search-carousel">--}}
{{--                        @foreach($headerSliders as $headerSlider)--}}
{{--                            <div class="item">--}}
{{--                                <div class="display-text">--}}
{{--                                    <img src="{{ $headerSlider->header_slider_url }}" alt="" class="full-width-height">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </section>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    @if(count($imageSliders) > 0 && $imageSliderActive->value)--}}
{{--        <div class=" {{ ($slider->value == 0) ? 'container' : ' ' }} ">--}}
{{--            <div class="owl-carousel image-slider mt20" id="image-slider-carousel">--}}
{{--                @foreach($imageSliders as $imageSlider)--}}
{{--                    <div class="item">--}}
{{--                        <span class="bg-image"><img src="{{ $imageSlider->image_slider_url }}" alt=""--}}
{{--                                                    class="image-height"></span>--}}
{{--                        <div class="display-text">--}}
{{--                            <img src="{{ $imageSlider->image_slider_url }}" alt=""--}}
{{--                                 class=" {{ ($slider->value == 0) ? 'image-height' : 'full-width-height' }}">--}}
{{--                            @if($imageSlider->description)--}}
{{--                                <div class="content slider-description">--}}
{{--                                    {!! Str::limit($imageSlider->description, 495, ' ...') !!}--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <!-- ===== End of Main Search Section ===== -->--}}

{{--    <!-- ===== Start of Popular Categories Section ===== -->--}}
{{--    @if(count($categories) > 0)--}}
{{--    <section class="ptb40 custom-pt-40 {{ (($imageSliderActive->value == 0) && ($settings->value == 0)) ? 'mt80' : ''  }} bg-gray"--}}
{{--             id="categories">--}}
{{--        <div class="container">--}}
{{--            <div class="section-title custom-pb-30">--}}
{{--                <h2>{{ __('web.home_menu.popular_categories') }}</h2>--}}
{{--            </div>--}}
{{--            <div class="row d-flex flex-wrap justify-content-center">--}}
{{--                @foreach($categories as $category)--}}
{{--                    <div class="col-12 col-lg-3 col-md-4 col-sm-6 col-xs-6 mt30 custom-flex-12">--}}
{{--                        <div class="top-categories">--}}
{{--                            <div align="center" class="margin-top">--}}
{{--                                <h4 class="category-name"><a--}}
{{--                                            href="{{ route('front.search.jobs',array('categories'=> $category->id)) }}">--}}
{{--                                        {{ html_entity_decode($category->name) }} <span class="d-inline-flex"> {{ ($category->jobs_count > 0) ? '( '.$category->jobs_count.' )' : '' }}</span>--}}
{{--                                    </a></h4>--}}
{{--                                <br>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    @endif--}}
{{--    <!-- ===== End of Popular Categories Section ===== -->--}}

{{--    <!-- ===== Start of Job Post Section ===== -->--}}
{{--    @if(count($latestJobs) > 0)--}}
{{--        <section class="ptb80 bg-gray custom-ptb-60" id="job-post">--}}
{{--        <div class="container">--}}
{{--            <!-- Start of Job Post Main -->--}}
{{--            <div class="col-md-12 col-sm-12 col-xs-12 job-post-main">--}}
{{--                <h2 class="capitalize text-center">{{ __('web.home_menu.latest_jobs') }}</h2>--}}
{{--                <!-- Start of Job Post Wrapper -->--}}
{{--                <div class="job-post-wrapper mt40 custom-mt-40">--}}
{{--                    <div class="row justify-content-center d-flex flex-wrap">--}}
{{--                        @if(count($latestJobs) > 0)--}}
{{--                            @if(\Illuminate\Support\Facades\Auth::check() && isset(auth()->user()->country_name) && $latestJobsEnable->value)--}}
{{--                                @if(in_array(auth()->user()->country_name, array_column($latestJobs->toArray(),'country_name')))--}}
{{--                                    @foreach($latestJobs as $job)--}}
{{--                                        @if($job->country_name == auth()->user()->country_name)--}}
{{--                                            @include('web.common.job_card')--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                    <div class="col-md-12 text-center">--}}
{{--                                        <a href="{{ route('front.search.jobs') }}"--}}
{{--                                           class="btn btn-purple btn-effect mt50">{{ __('web.common.browse_all') }}</a>--}}
{{--                                    </div>--}}
{{--                                @else--}}
{{--                                    <div class="related-job-not-found">--}}
{{--                                        <h5 class="text-center">{{ __('web.home_menu.latest_job_not_available') }}</h5>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            @else--}}
{{--                                @foreach($latestJobs as $job)--}}
{{--                                    @include('web.common.job_card')--}}
{{--                                @endforeach--}}
{{--                                <div class="col-md-12 text-center">--}}
{{--                                    <a href="{{ route('front.search.jobs') }}"--}}
{{--                                       class="btn btn-purple btn-effect mt50">{{ __('web.common.browse_all') }}</a>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <div class="related-job-not-found">--}}
{{--                                <h5 class="text-center">{{ __('web.home_menu.latest_job_not_available') }}</h5>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End of Job Post Wrapper -->--}}
{{--            </div>--}}
{{--            <!-- End of Job Post Main -->--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    @endif--}}
{{--    <!-- ===== End of Job Post Section ===== -->--}}

{{--    <!-- ===== Start of Job Post Section ===== -->--}}
{{--    @if(count($featuredJobs) > 0)--}}
{{--        <section class="pb80 bg-gray custom-pb-15" id="job-post">--}}
{{--        <div class="container">--}}
{{--            <!-- Start of Job Post Main -->--}}
{{--            <div class="col-md-12 col-sm-12 col-xs-12 job-post-main">--}}
{{--                <h2 class="capitalize text-center">{{ __('web.home_menu.featured_jobs') }}</h2>--}}

{{--        <!-- Start of Job Post Wrapper -->--}}
{{--                <div class="job-post-wrapper mt40">--}}
{{--                    <div class="row justify-content-center d-flex flex-wrap">--}}
{{--                        @foreach($featuredJobs as $job)--}}
{{--                            @include('web.common.job_card')--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End of Job Post Wrapper -->--}}
{{--            </div>--}}
{{--            <!-- End of Job Post Main -->--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    @endif--}}
{{--    <!-- ===== End of Job Post Section ===== -->--}}

{{--    <!-- ===== Start of Featured Companies Section ===== -->--}}
{{--    @if(count($featuredCompanies) > 0)--}}
{{--        <section class="pt40 pb80 bg-gray custom-pb-40 " id="job-post">--}}
{{--        <div class="container">--}}
{{--            <!-- Start of Job Post Main -->--}}
{{--            <div class="col-md-12 col-sm-12 col-xs-12 job-post-main">--}}
{{--                <h2 class="capitalize text-center">{{ __('web.home_menu.featured_companies') }}--}}
{{--                </h2>--}}

{{--                <!-- Start of Job Post Wrapper -->--}}
{{--                <div class="job-post-wrapper mt40 custom-mt-40">--}}
{{--                    <div class="row">--}}
{{--                            @foreach($featuredCompanies as $company)--}}
{{--                                @include('web.common.company_card')--}}
{{--                            @endforeach--}}
{{--                            <div class="col-md-12 text-center">--}}
{{--                                <a href="{{ route('front.company.lists',['is_featured' => true]) }}"--}}
{{--                                   class="btn btn-purple btn-effect mt50">{{ __('web.common.browse_all') }}</a>--}}
{{--                            </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- End of Job Post Wrapper -->--}}
{{--            </div>--}}
{{--            <!-- End of Job Post Main -->--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    @endif--}}
{{--    <!-- ===== End of Featured Companies Section ===== -->--}}

{{--    <!-- ===== Start of CountUp Section ===== -->--}}
{{--    <section class="ptb40 bg-gray" id="countup">--}}
{{--        <div class="container">--}}
{{--            <!-- 1st Count up item -->--}}
{{--            <div class="col-md-3 col-sm-3 col-xs-12">--}}
{{--                <span class="counter text-purple" data-from="0" data-to="{{ $dataCounts['candidates'] }}"></span>--}}
{{--                <h4>{{ __('messages.front_home.candidates') }}</h4>--}}
{{--            </div>--}}

{{--            <!-- 2nd Count up item -->--}}
{{--            <div class="col-md-3 col-sm-3 col-xs-12">--}}
{{--                <span class="counter text-purple" data-from="0" data-to="{{ $dataCounts['jobs'] }}"></span>--}}
{{--                <h4>{{ __('messages.front_home.jobs') }}</h4>--}}
{{--            </div>--}}

{{--            <!-- 3rd Count up item -->--}}
{{--            <div class="col-md-3 col-sm-3 col-xs-12">--}}
{{--                <span class="counter text-purple" data-from="0" data-to="{{ $dataCounts['resumes'] }}"></span>--}}
{{--                <h4>{{ __('messages.front_home.resumes') }}</h4>--}}
{{--            </div>--}}

{{--            <!-- 4th Count up item -->--}}
{{--            <div class="col-md-3 col-sm-3 col-xs-12">--}}
{{--                <span class="counter text-purple" data-from="0" data-to="{{ $dataCounts['companies'] }}"></span>--}}
{{--                <h4>{{ __('messages.front_home.companies') }}</h4>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- ===== End of CountUp Section ===== -->--}}

{{--    <!-- ===== Start of Testimonial Section ===== -->--}}
{{--    @if(count($testimonials) > 0)--}}
{{--        @include('web.home.testimonials')--}}
{{--    @endif--}}
{{--    <!-- ===== End of Testimonial Section ===== -->--}}

{{--    <!-- ===== Start of Notices Section ===== -->--}}
{{--    @if(count($notices) > 0)--}}
{{--        @include('web.home.notices')--}}
{{--    @endif--}}
{{--    --}}{{--    {{  getCountries()  }}--}}
{{--    <!-- ===== End of Notices Section ===== -->--}}

{{--    <!-- ===== Start of Pricing Table Section ===== -->--}}
{{--    <section class="pricing-tables pb80 custom-pb-40">--}}
{{--        <div class="container">--}}
{{--            <h2 class="capitalize text-center pt30">{{ __('messages.pricings_table') }}</h2>--}}
{{--            <div class="row align-items-stretch">--}}
{{--                <div class="container">--}}
{{--                    <div class="owl-carousel pricing-slider">--}}
{{--                        @foreach($plans as $plan)--}}
{{--                            <div class="item">--}}
{{--                                <div class="col-lg-12 col-md-12 col-sm-12 mt80">--}}
{{--                                    <div class="pricing-table shadow-hover {{ Auth::check() && Auth::user()->hasRole('Candidate') ? 'pricing-height-auto' : 'pricing-height'}}">--}}
{{--                                        <div class="pricing-header">--}}
{{--                                            <h2 title="{{ html_entity_decode($plan->name) }}">{{ html_entity_decode( Str::limit($plan->name, 12, '...') ) }}</h2>--}}
{{--                                        </div>--}}
{{--                                        <div class="pricing-hover">--}}
{{--                                            <span class="amount plan__price">{{empty($plan->salaryCurrency->currency_icon)?'$':$plan->salaryCurrency->currency_icon}}{{ $plan->amount }}</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="pricing-body">--}}
{{--                                            <ul class="list ml-0">--}}
{{--                                                <li><i class="fa fa-circle pricing-dot" aria-hidden="true"></i>--}}
{{--                                                    {{ $plan->allowed_jobs.' '.($plan->allowed_jobs > 1 ? __('messages.plan.jobs_allowed') : __('messages.plan.job_allowed')) }}</li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                        <div class="pricing-footer">--}}
{{--                                            @if(Auth::check() && Auth::user()->hasRole('Candidate'))--}}
{{--                                                <a href="#"--}}
{{--                                                   class="btn btn-blue btn-effect displayNone">{{ __('messages.pricing_table.get_started') }}</a>--}}
{{--                                            @elseif(Auth::check() && Auth::user()->hasRole('Employer'))--}}
{{--                                                <a href="{{ route('manage-subscription.index') }}"--}}
{{--                                                   class="btn btn-blue btn-effect">{{ __('messages.pricing_table.get_started') }}</a>--}}
{{--                                            @elseif(Auth::check() && Auth::user()->hasRole('Admin'))--}}
{{--                                                <a href="#"--}}
{{--                                                   class="btn btn-blue btn-effect displayNone">{{ __('messages.pricing_table.get_started') }}</a>--}}
{{--                                            @else--}}
{{--                                                <a href="{{ route('employer.register') }}"--}}
{{--                                                   class="btn btn-blue btn-effect">{{ __('messages.pricing_table.get_started') }}</a>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- ===== End of Pricing Table Section ===== -->--}}

{{--    <!-- ===== Start of Branding Slider Section ===== -->--}}
{{--    @if(count($branding) > 0)--}}
{{--        <section class="bg-light">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="container">--}}
{{--                        <div class="d-flex justify-content-center">--}}
{{--                            <h2 class="text-center pt40 pb40">{{ __('messages.brands') }}</h2>--}}
{{--                        </div>--}}
{{--                        <div class="owl-carousel" id="brandingSlider">--}}
{{--                            @foreach($branding as $brand)--}}
{{--                                <div class="item">--}}
{{--                                    <div class="branding-item">--}}
{{--                                        <!-- Branding slider -->--}}
{{--                                        <div class="text-center branding-item">--}}
{{--                                            <img src="{{ $brand->branding_slider_url }}" alt="Branding Slider"--}}
{{--                                                 data-toggle="tooltip" data-placement="right"--}}
{{--                                                 title="{{ html_entity_decode($brand->title) }}"/>--}}
{{--                                        </div>--}}
{{--                                        <!-- End Branding slider -->--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    @endif--}}
{{--    <!-- ===== End of Branding Slider Section ===== -->--}}
{{--    @if(count($recentBlog) > 0)--}}
{{--        <section class="section pricing-tables ptb40 custom-ptb-20">--}}
{{--            <div class="section-body">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="container d-flex flex-column">--}}
{{--                        <div class="col-md-12 col-sm-12 col-xs-12 mb40 mt15 custom-mb-20">--}}
{{--                            <h2 class="capitalize text-center">{{ __('messages.recent_blog') }}</h2>--}}
{{--                        </div>--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body overflow-hidden d-flex justify-content-center flex-wrap">--}}
{{--                                @foreach($recentBlog as $post)--}}
{{--                                    <div class="col-sm-6 col-md-6 col-lg-4 h-100 mb-30px mobile-width-100">--}}
{{--                                        <div class="hover-effect-blog position-relative mb-5 border-hover-primary blog-border">--}}
{{--                                            <div class="blog-card-details">--}}
{{--                                                <img class="article-image"--}}
{{--                                                     src="{{ empty($post->blog_image_url) ? asset('assets/img/article-image.png') : $post->blog_image_url }}"--}}
{{--                                                     alt="Blog Article"/>--}}
{{--                                                <div class="mb-auto w-100 blog-category height-280">--}}
{{--                                                    <div class="post-detail-category-badge mt-5 mb-0 web-post-box mt-mobile-0">--}}
{{--                                                        @foreach($post->postAssignCategories as $counter => $category)--}}
{{--                                                            @if($counter < 1)--}}
{{--                                                                <span class="font-size-13px post-badge white-space-normal badge-pill {{ $counter }} badge-primary">{{html_entity_decode($category->name)}}</span>--}}
{{--                                                            @elseif($counter == (count($post->postAssignCategories )) - 1)--}}
{{--                                                                <label class="badge badge-pill badge-warning font-size-13px">{{ "+" . $counter ." "."more"}}</label>--}}
{{--                                                            @endif--}}
{{--                                                        @endforeach--}}
{{--                                                    </div>--}}
{{--                                                    <div class="card-article-title two-line-ellip m-b-10px">--}}
{{--                                                        <a href="{{ route('front.posts.details',$post->id) }}">--}}
{{--                                                            {{ html_entity_decode($post->title) }}</a>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="text-left line-height-20px blog-post-description four-line-ellip">--}}
{{--                                                        {!! !empty($post->description) ? $post->description : __('messages.common.n/a') !!}--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="article-footer position-absolute l-0-r-0">--}}
{{--                                                <div class="d-flex justify-content-between">--}}
{{--                                                    <span><img src="{{ $post->user->avatar }}"--}}
{{--                                                               class="thumbnail-rounded front-thumbnail"/> {{ $post->user->full_name }}</span>--}}
{{--                                                    <small><i class="fa fa-clock-o"></i>&nbsp;{{$post->created_at->diffForHumans()}}--}}
{{--                                                    </small>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    @endif--}}
{{--    <!-- ===== End of Recent Blog Section ===== -->--}}
<!-- Banner Section Three-->
{{--
{{--                @if(count($headerSliders) > 0)--}}
{{--                    <div class="owl-carousel header-image-slider" id="image-search-carousel">--}}
{{--                        @foreach($headerSliders as $headerSlider)--}}
{{--                            <div class="item">--}}
{{--                                <div class="display-text">--}}
{{--                                    <img src="{{ $headerSlider->header_slider_url }}" alt="" class="full-width-height">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                @endif--}}

<section class="banner-section-three">
@if($settings->value)
    @if(count($headerSliders) > 0)
        <!-- Testimonial Carousel -->
            {{--            <div class="search-middle-image">--}}

            {{--            </div>--}}
            <div class="banner-carousel owl-carousel owl-theme default-nav">
                @foreach($headerSliders as $headerSlider)
                    <div class="slide-item bg-image"
                         style="background-image: url({{ $headerSlider->header_slider_url }});"></div>
                @endforeach
            </div>
        @endif
    @endif
    <div class="auto-container">
        <div class="row">
            <div class="content-column {{($settings->value==1 && count($headerSliders) > 0)?'col-lg-12':'col-lg-7'}} col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="title-box wow fadeInUp">
                        <h3>{{$cmsServices['home_title']}}</h3>
                        <div class="text text-dark">{{$cmsServices['home_description']}}</div>
                    </div>
                    <!-- Job Search Form -->
                    <div class="job-search-form-two wow fadeInUp" data-wow-delay="500ms">
                        <form action="{{ route('front.search.jobs') }}" method="get">
                            <div class="row">
                                <div class="form-group col-lg-5 col-md-12 col-sm-12">
                                    <label class="title">{{ __('web.home_menu.keywords') }}</label>
                                    <span class="icon flaticon-search-1"></span>
                                    <input type="text" name="keywords" id="search-keywords"
                                           placeholder="@lang('web.web_home.job_title_keywords_company')"
                                           autocomplete="off">
                                </div>
                                <div id="jobsSearchResults" class="position-absolute w100 job-search"></div>
                                <!-- Form Group -->
                                <div class="form-group col-lg-4 col-md-12 col-sm-12 location">
                                    <label class="title">{{ __('web.common.location') }}</label>
                                    <span class="icon flaticon-map-locator"></span>
                                    <input type="text" name="location" id="search-location"
                                           placeholder="@lang('web.web_home.city_or_postcode')" autocomplete="off">
                                </div>
                                <!-- Form Group -->
                                <div class="form-group col-lg-3 col-md-12 col-sm-12 btn-box">
                                    <button type="submit" class="theme-btn btn-style-one"><span
                                                class="btn-title">{{ __('web.web_home.find_jobs') }}</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Job Search Form -->

                    <!-- Popular Search -->
                {{--                                                                <div class="popular-searches wow fadeInUp" data-wow-delay="1000ms">--}}
                {{--                                                                    <span class="title">Popular Searches : </span>--}}
                {{--                                                                    <a href="#">Designer</a>,--}}
                {{--                                                <a href="#">Developer</a>,--}}
                {{--                                                <a href="#">Web</a>,--}}
                {{--                                                <a href="#">IOS</a>,--}}
                {{--                                                <a href="#">PHP</a>,--}}
                {{--                                                <a href="#">Senior</a>,--}}
                {{--                                                <a href="#">Engineer</a>,--}}
                {{--                                            </div>--}}
                <!-- End Popular Search -->
                </div>
            </div>
            @if($settings->value==0)
                <div class="image-column col-lg-5 col-md-12">
                    <div class="image-box">
                        <figure class="main-image wow fadeInRight" data-wow-delay="1500ms">
                            <img class="home-banner"
                                 src="{{ $cmsServices['home_banner']?asset($cmsServices['home_banner']) : asset('web_front/images/resource/home_banner.png')}}"
                                 alt=""></figure>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- End Banner Section Three-->
{{--@if(count($imageSliders) > 0 && $imageSliderActive->value)--}}
{{--    <div class="slideshow{{ ($slider->value == 0) ? '-container' : ' ' }}">--}}
{{--        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>--}}
{{--        @foreach($imageSliders as $imageSlider)--}}
{{--            <div class="mySlides">--}}
{{--                <img src="{{ $imageSlider->image_slider_url }}" style="width:100%">--}}
{{--                @if($imageSlider->description)--}}
{{--                    <div class="text">{!! Str::limit($imageSlider->description, 495, ' ...') !!}</div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--        <a class="next" onclick="plusSlides(1)">&#10095;</a>--}}

{{--    </div>--}}
{{--@endif--}}


@if(count($imageSliders) > 0 && $imageSliderActive->value)
    <div class="{{ ($slider->value == 0) ? 'container' : ' ' }} mt-5">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($imageSliders as $key=>$imageSlider)
                    <div class="carousel-item {{($key==0)?'active':''}}">
                        <img class="d-block w-100 slider-img" src="{{ $imageSlider->image_slider_url }}"
                             alt="First slide">
                        @if($imageSlider->description)
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{!! Str::limit($imageSlider->description, 495, ' ...') !!}</h5>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endif
<!--Clients Section-->
@if(count($branding) > 0)
    <section class="clients-section-two">
        <div class="sponsors-outer wow fadeInUp touch-none">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel owl-carousel owl-theme">
                @foreach($branding as $brand)
                    <li class="slide-item">
                        <figure class="image-box"><img src="{{ $brand->branding_slider_url }}"
                                                       alt="Branding Slider">
                            </figure>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
@endif
<!-- End Clients Section-->
@if(count($jobCategories) > 0)
    <!-- Job Categories -->
        <section class="job-categories">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>{{ __('web.web_home.popular_job_categories') }}</h2>
                    {{--                <div class="text">2020 jobs live - 293 added today.</div>--}}
                </div>
                <div class="row wow fadeInUp justify-content-center">
                    <!-- Category Block -->
                    @foreach($jobCategories as $jobCategory)
                        <div class="category-block-two col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="content">
                                    <img class="icon job-category-avatar" src="{{ $jobCategory->image_url}}"
                                         alt="Job Category Image">
                                    <h4>
                                        <a href="{{ route('front.search.jobs',array('categories'=> $jobCategory->id)) }}">{{ html_entity_decode($jobCategory->name) }}</a>
                                    </h4>

                                    <p>{{ '('.(($jobCategory->jobs_count) ? $jobCategory->jobs_count : 0) .' open positions)'}}</p>
                                </div>
                                @if($jobCategory->is_featured)
                                    <button class="bookmark-btn"><i class="fas fa-bookmark featured"></i></button>
                                @endif
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </section>
@endif
<!-- End Job Categories -->
@if(count($latestJobs) > 0)
        <section class="job-section">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>{{ __('web.home_menu.latest_jobs') }}</h2>
                </div>
                <div class="row wow fadeInUp justify-content-center">
                    @if(count($latestJobs) > 0)
                        @if(\Illuminate\Support\Facades\Auth::check() && isset(auth()->user()->country_name) && isset($latestJobsEnable)?$latestJobsEnable->value:'')
                            @if(in_array(auth()->user()->country_name, array_column($latestJobs->toArray(),'country_name')))
                                @foreach($latestJobs as $job)
                                    @if($job->country_name == auth()->user()->country_name)
                                        @include('web.common.job_card')
                                    @endif
                                @endforeach
                                <div class="col-md-12 text-center">
                                    <a href="{{ route('front.search.jobs') }}"
                                       class="theme-btn btn-style-three">{{ __('web.common.browse_all') }}</a>
                                </div>
                            @else
                                <div class="col-md-12 text-center">
                                    <h5>{{ __('web.home_menu.latest_job_not_available') }}</h5>
                                </div>
                            @endif
                        @else
                            @foreach($latestJobs as $job)
                                @include('web.common.job_card')
                            @endforeach
                            <div class="col-md-12 text-center">
                                <a href="{{ route('front.search.jobs') }}"
                                   class="theme-btn btn-style-one bg-blue">{{ __('web.common.browse_all') }}</a>
                            </div>
                        @endif
                    @else
                        <div class="col-md-12 text-center">
                            <h5>{{ __('web.home_menu.latest_job_not_available') }}</h5>
                        </div>
                    @endif
                </div>
            </div>
        </section>
@endif

<!-- Job Section -->
@if(count($featuredJobs) > 0)
        <section class="job-section padding-0">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>{{ __('web.home_menu.featured_jobs') }}</h2>
                    <div class="text">Know your worth and find the job that qualify your life</div>
                </div>

                <div class="row wow fadeInUp">
                    @foreach($featuredJobs as $job)
                        @include('web.common.job_card')
                    @endforeach
                    <div class="col-md-12 text-center">
                        <a href="{{ route('front.company.lists',['is_featured' => true]) }}"
                           class="theme-btn btn-style-one bg-blue">{{ __('web.common.browse_all') }}</a>
                    </div>
                </div>
            </div>
        </section>
@endif
<!-- End Job Section -->
<!-- App Section -->
<!-- ===== Start of Notices Section ===== -->
@if(count($notices) > 0)
    <section class="app-section p-0 notice-div">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2 class="capitalize text-center">{{ __('web.home_menu.notices') }}</h2>
            </div>
            <div class="row justify-content-center">

                <!-- Image Column -->
                {{--                <div class="image-column col-lg-6 col-md-12 col-sm-12">--}}
                {{--                    <div class="bg-shape"></div>--}}
                {{--                <figure class="image wow fadeInLeft"><img src="{{asset('web_front/images/resource/mobile-app.png')}}"--}}
                {{--                                                          alt=""></figure>--}}
                {{--            </div>--}}
                {{--    <!-- ===== Start of Notices Section ===== -->--}}
                {{--    @if(count($notices) > 0)--}}
                {{--        @include('web.home.notices')--}}
                {{--    @endif--}}
                {{--    --}}{{--    {{  getCountries()  }}--}}
                {{--    <!-- ===== End of Notices Section ===== -->--}}
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInRight p-0">
                        <div class="sec-title">
                            <marquee direction="up" scrolldelay="150" id="notices">
                                @foreach($notices as $key=>$notice)
                                    <div class="notice color{{$key}}" role="listitem">
                                        <div class="d-flex justify-content-between mb-2"><span>{{ html_entity_decode($notice->title) }} | {{ $notice->created_at->diffForHumans() }}</span>
                                            <span
                                                    class="sec-date date-color{{$key}}">{{ date('jS M, Y', strtotime($notice->created_at)) }}</span>
                                        </div>
                                        <p>{!! nl2br(strip_tags($notice->description)) !!}</p>
                                    </div>
                                @endforeach
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--{{  getCountries()  }}--}}
@endif

<!-- ===== End of Notices Section ===== -->-
<!-- End App Section -->
<!-- ===== Start of Testimonial Section ===== -->
    @if(count($testimonials) > 0)
        @include('web.home.testimonials')
    @endif
@if(count($recentBlog) > 0)
<section class="news-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2>{{ __('messages.recent_blog') }}</h2>
        </div>

        <div class="row wow fadeInUp justify-content-center">
            <!-- News Block -->

            @foreach($recentBlog as $post)
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box h-100">
                        <div class="image-box">
                            <figure class="image"><img
                                    src="{{ empty($post->blog_image_url) ? asset('assets/img/article-image.png') : $post->blog_image_url }}"
                                    alt=""/></figure>
                        </div>
                        <div class="lower-content">
                            <ul class="post-meta">
                                <li><a href="#">{{ \Carbon\Carbon::parse($post->created_at)->isoFormat('MMM Do YYYY')}}</a>
                                </li>
                                <li><a href="#">{{  $post->comments_count }} Comment</a></li>
                            </ul>
                            <h3>
                                <a href="{{ route('front.posts.details',$post->id) }}">{{ html_entity_decode($post->title) }}</a>
                            </h3>
                            <p class="text"> {!! !empty($post->description) ? Str::limit(strip_tags($post->description),100,'...') : __('messages.common.n/a') !!}</p>
                            <a href="{{ route('front.posts.details',$post->id) }}"
                               class="read-more">{{ __('web.post_menu.read_more') }} <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endif
<!-- ===== End of Testimonial Section ===== -->
<!-- Top Companies -->
@if(count($featuredCompanies) > 0)
        <section class="top-companies">
            <div class="auto-container">
                <div class="sec-title">
                    <h2>{{ __('web.home_menu.featured_companies') }}</h2>
                </div>

                <div class="carousel-outer wow fadeInUp">

                    <div class="companies-carousel owl-carousel owl-theme default-dots mb-3">
                        <!-- Company Block -->
                        @foreach($featuredCompanies as $company)
                            <div class="job-block-three company-block">
                                <div class="inner-box">
                                    <figure class="image"><img class="h-100 w-100 home-banner"
                                                               src="{{$company->company_url}}" alt=""></figure>
                                    <h4 class="name"><a
                                            href="{{ route('front.company.details', $company->unique_id) }}">{{$company->user->full_name}}</a>
                                    </h4>
                                    @if(!empty($company->location) || !empty($company->location2))
                                        <div class="location"><i class="flaticon-map-locator"></i>
                                            {{ (isset($company->location)) ? html_entity_decode(Str::limit($company->location,40,'...')) : __('messages.common.n/a') }}
                                        </div>
                                    @else
                                        <div class="location">
                                            <i class="flaticon-map-locator"></i>
                                            <span>{{ __('web.web_home.no_location_added') }}</span>
                                        </div>
                                    @endif
                                    <a href="{{route('front.company.details', $company->unique_id)}}"
                                       class="theme-btn btn-style-three">{{ $company->jobs_count }} {{ __('web.web_home.open_position') }}</a>
                                    @if($company->activeFeatured)
                                        <button class="bookmark-btn"><i class="fas fa-bookmark featured"></i></button>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="col-md-12 text-center">
                        <a href="{{ route('front.company.lists',['is_featured' => true]) }}"
                           class="theme-btn btn-style-one bg-blue">{{ __('web.common.browse_all') }}</a>
                    </div>
                </div>
            </div>
        </section>
@endif
<!-- End Top Companies -->
<section class="about-section-three countdown-background ">
    <div class="fun-fact-section">
        <div class="row">
            <!--Column-->
            <div class="counter-column col-lg-3 col-md-3 col-sm-12 wow fadeInUp">
                <div class="count-box text-blue"><span class="count-text" data-speed="3000"
                                                       data-stop="{{ $dataCounts['candidates'] }}">0</span></div>
                <h4 class="counter-title">{{ __('messages.front_home.candidates') }}</h4>
            </div>
            <!--Column-->
            <div class="counter-column col-lg-3 col-md-3 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                <div class="count-box text-blue"><span class="count-text" data-speed="3000"
                                                       data-stop="{{ $dataCounts['jobs'] }}"></span></div>
                <h4 class="counter-title">{{ __('messages.front_home.jobs') }}</h4>
            </div>

            <!--Column-->
            <div class="counter-column col-lg-3 col-md-3 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                <div class="count-box text-blue"><span class="count-text" data-speed="3000" data-stop="{{ $dataCounts['resumes'] }}"></span></div>
                <h4 class="counter-title">{{ __('messages.front_home.resumes') }}</h4>
            </div>
            <!--Column-->
            <div class="counter-column col-lg-3 col-md-3 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                <div class="count-box text-blue"><span class="count-text" data-speed="3000" data-stop="{{ $dataCounts['companies'] }}"></span></div>
                <h4 class="counter-title">{{ __('messages.front_home.companies') }}</h4>
            </div>
        </div>
    </div>
</section>
@if(count($plans) > 0)
    <!-- Pricing Sectioin -->
        <section class="pricing-section">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>{{ __('web.web_home.pricing_packages') }}</h2>
                    {{--                    <div class="text">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor.</div>--}}
                </div>
                <!--Pricing Tabs-->
                <div class="pricing-tabs tabs-box wow fadeInUp">
                    <!--Tab Btns-->
                {{--                    <div class="tab-buttons">--}}
                {{--                        <h4>Save up to 10%</h4>--}}
                {{--                        <ul class="tab-btns">--}}
                {{--                            <li data-tab="#monthly" class="tab-btn active-btn">Monthly</li>--}}
                {{--                            <li data-tab="#annual" class="tab-btn">AnnualSave</li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                <!--Tabs Container-->
                    <div class="tabs-content">
                        <!--Tab / Active Tab-->
                        <div class="tab active-tab" id="monthly">
                            <div class="content">
                                <div class="row justify-content-center">
                                    @foreach($plans as $plan)
                                        <div class="pricing-table col-lg-4 col-md-6 col-sm-12">
                                            <div class="inner-box">
                                                <div class="title">{{ html_entity_decode( Str::limit($plan->name, 50, '...') ) }}</div>
                                                <div class="price">{{empty($plan->salaryCurrency->currency_icon)?'$':$plan->salaryCurrency->currency_icon}}{{ $plan->amount }}
                                                    <span class="duration"><label
                                                                class="font-weight-bolder ">/{{ __('web.web_home.monthly') }}</label></span>
                                                </div>
                                                <div class="table-content">
                                                    <ul>
                                                        <li>
                                                            <span>  {{ $plan->allowed_jobs.' '.($plan->allowed_jobs > 1 ? __('messages.plan.jobs_allowed') : __('messages.plan.job_allowed')) }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="table-footer">
                                                    @if(Auth::check() && Auth::user()->hasRole('Candidate'))
                                                        <a href="#"
                                                           class="theme-btn btn-style-three d-none">{{ __('messages.pricing_table.get_started') }}</a>
                                                    @elseif(Auth::check() && Auth::user()->hasRole('Employer'))
                                                        <a href="{{ route('manage-subscription.index') }}"
                                                           class="theme-btn btn-style-three">{{ __('messages.pricing_table.get_started') }}</a>
                                                    @elseif(Auth::check() && Auth::user()->hasRole('Admin'))
                                                        <a href="#"
                                                           class="theme-btn btn-style-three d-none">{{ __('messages.pricing_table.get_started') }}</a>
                                                    @else
                                                        <a href="{{ route('employer.register') }}"
                                                           class="theme-btn btn-style-three">{{ __('messages.pricing_table.get_started') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endif
<!-- End Pricing Section -->
@endsection
@section('page_scripts')
    <script>
        var availableLocation = [];
        let jobsSearchUrl = "{{ route('get.jobs.search') }}";
        @foreach(getCountries() as $county)
        availableLocation.push("{{ $county  }}");
        @endforeach

        let color = @json($color);
        $.each(color, function (key, val) {
            $('.color' + key).css({ 'border-left': '5px solid' + val, 'border-bottom': '5px solid' + val });
            $('.date-color' + key).css({ 'background-color': val });
        });
    </script>
    <script src="{{mix('assets/js/home/home.js')}}"></script>
@endsection

