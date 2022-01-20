@extends('web.layouts.app')
@section('title')
    {{ html_entity_decode($companyDetail->user->full_name) }}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/header-span.css') }}">
@endsection
@section('content')
    <!-- ===== Start of Candidate Profile Header Section ===== -->
{{--    <section class="profile-header">--}}
{{--    </section>--}}
    <!-- ===== End of Candidate Header Section ===== -->


{{--    <section class="pb80 bg-gray" id="company-profile">--}}
{{--        <div class="container">--}}
{{--            <div class="row company-profile">--}}
{{--                <div class="col-md-3 col-xs-12">--}}
{{--                    <div class="profile-photo company-detail-logo ticket-sender-picture">--}}
{{--                        <img src="{{ (!empty($companyDetail->company_url)) ? $companyDetail->company_url : asset('assets/img/infyom-logo.png') }}"--}}
{{--                             class="img-responsive" alt="">--}}
{{--                    </div>--}}
{{--                    <ul class="social-btns list-inline text-center mt20">--}}
{{--                        @if(isset($companyDetail->user->facebook_url))--}}
{{--                            <li>--}}
{{--                                <a href="{{ (isset($companyDetail->user->facebook_url)) ? $companyDetail->user->facebook_url : 'javascript:void(0)' }}"--}}
{{--                                   class="social-btn-roll facebook transparent" target="_blank">--}}
{{--                                    <div class="social-btn-roll-icons">--}}
{{--                                        <i class="social-btn-roll-icon fa fa-facebook"></i>--}}
{{--                                        <i class="social-btn-roll-icon fa fa-facebook"></i>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @if(isset($companyDetail->user->twitter_url))--}}
{{--                            <li>--}}
{{--                                <a href="{{ (isset($companyDetail->user->twitter_url)) ? $companyDetail->user->twitter_url : 'javascript:void(0)' }}"--}}
{{--                                   class="social-btn-roll twitter transparent" target="_blank">--}}
{{--                                    <div class="social-btn-roll-icons">--}}
{{--                                        <i class="social-btn-roll-icon fa fa-twitter"></i>--}}
{{--                                        <i class="social-btn-roll-icon fa fa-twitter"></i>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @if(isset($companyDetail->user->google_plus_url))--}}
{{--                            <li>--}}
{{--                                <a href="{{ (isset($companyDetail->user->google_plus_url)) ? $companyDetail->user->google_plus_url : 'javascript:void(0)' }}"--}}
{{--                                   class="social-btn-roll google-plus transparent" target="_blank">--}}
{{--                                    <div class="social-btn-roll-icons">--}}
{{--                                        <i class="social-btn-roll-icon fa fa-google-plus"></i>--}}
{{--                                        <i class="social-btn-roll-icon fa fa-google-plus"></i>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @if(isset($companyDetail->user->pinterest_url))--}}
{{--                            <li>--}}
{{--                                <a href="{{ (isset($companyDetail->user->pinterest_url)) ? $companyDetail->user->pinterest_url : 'javascript:void(0)' }}"--}}
{{--                                   class="social-btn-roll pinterest transparent" target="_blank">--}}
{{--                                    <div class="social-btn-roll-icons">--}}
{{--                                        <i class="social-btn-roll-icon fa fa-pinterest"></i>--}}
{{--                                        <i class="social-btn-roll-icon fa fa-pinterest"></i>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        @if(isset($companyDetail->user->linkedin_url))--}}
{{--                            <li>--}}
{{--                                <a href="{{ (isset($companyDetail->user->linkedin_url)) ? $companyDetail->user->linkedin_url : 'javascript:void(0)' }}"--}}
{{--                                   class="social-btn-roll linkedin transparent" target="_blank">--}}
{{--                                    <div class="social-btn-roll-icons">--}}
{{--                                        <i class="social-btn-roll-icon fa fa-linkedin"></i>--}}
{{--                                        <i class="social-btn-roll-icon fa fa-linkedin"></i>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                <div class="col-md-9 col-xs-12">--}}
{{--                    <div class="profile-descr">--}}
{{--                        <div class="profile-title">--}}
{{--                            <h2 class="capitalize">{{ html_entity_decode($companyDetail->user->full_name) }}</h2>--}}
{{--                            <h5 class="pt10">{{ $companyDetail->user->email }}</h5>--}}
{{--                        </div>--}}
{{--                        <div class="profile-details mt20">--}}
{{--                            <p>{!! nl2br($companyDetail->details) !!}</p>--}}
{{--                        </div>--}}
{{--                        <ul class="profile-info mt20 nopadding d-flex justify-content-center flex-wrap">--}}
{{--                            @if(!empty($companyDetail->user->city_id) || (!empty($companyDetail->user->state_id)) || (!empty($companyDetail->user->country_id)))--}}
{{--                                <li>--}}
{{--                                    <i class="fa fa-map-marker"></i>--}}
{{--                                    <span>--}}
{{--                                            {{ (!empty($companyDetail->user->city_id)) ? $companyDetail->user->city_name.', ' : '' }}--}}
{{--                                        {{ (!empty($companyDetail->user->state_id)) ? $companyDetail->user->state_name.', ' : '' }}--}}
{{--                                        {{ (!empty($companyDetail->user->country_id)) ? $companyDetail->user->country_name : '' }}--}}
{{--                                        </span>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                            @isset($companyDetail->website)--}}
{{--                                <li>--}}
{{--                                    <i class="fa fa-globe"></i>--}}
{{--                                    <a href="{{ (isset($companyDetail->website)) ?  --}}
{{--                                                    (!str_contains($companyDetail->website,'https://') --}}
{{--                                                    ? 'https://'.$companyDetail->website--}}
{{--                                                    : $companyDetail->website) --}}
{{--                                                : 'javascript:void(0)' }}">--}}
{{--                                        {{ (isset($companyDetail->website)) ? preg_replace("(^https?://www.)", "", $companyDetail->website) : 'N/A' }}--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            @endisset--}}
{{--                            @isset($companyDetail->user->phone)--}}
{{--                                <li>--}}
{{--                                    <i class="fa fa-phone"></i>--}}
{{--                                    <span>{{ (isset($companyDetail->user->phone)) ? $companyDetail->user->phone : 'N/A' }}</span>--}}
{{--                                </li>--}}
{{--                            @endisset--}}
{{--                        </ul>--}}
{{--                        @auth--}}
{{--                            @role('Candidate')--}}
{{--                            <div class="row mt20">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <div class="company-add-favourite company-web clearfix">--}}
{{--                                        <a href="javascript:void(0)"--}}
{{--                                           class="btn btn-small btn-orange btn-effect"--}}
{{--                                           data-favorite-user-id="{{ (getLoggedInUserId() !== null) ? getLoggedInUserId() : null }}"--}}
{{--                                           data-favorite-company_id="{{ $companyDetail->id }}" id="addToFavourite">--}}
{{--                                            <div class="company-follow-text">--}}
{{--                                                <i class="fa fa-star"></i>--}}
{{--                                                <span class="favouriteText"></span>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 reportJobBtn">--}}
{{--                                    <div class="company-report-web company-web clearfix">--}}
{{--                                        <button class="btn btn-small btn-red btn-effect reportToCompany {{ ($isReportedToCompany) ? 'disabled' : '' }}"--}}
{{--                                                data-toggle="modal"--}}
{{--                                                data-target="#reportToCompanyModal">{{ __('messages.company.report_to_company') }}--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @endrole--}}
{{--                        @endauth--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section class="pt10 pb80 bg-gray" id="job-post">--}}
{{--        <div class="container">--}}
{{--            <div class="row mb30">--}}
{{--                <div class="col-md-12 text-center">--}}
{{--                    <h3 class="pb5">--}}
{{--                        {{ ($jobDetails->count() > 0 ) ? __('web.company_details.our_latest_jobs')  : __('web.home_menu.latest_job_not_available')}}--}}
{{--                    </h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- Start of Job Post Main -->--}}
{{--            <div class="row nomargin job-post-wrapper mt10">--}}
{{--                @foreach($jobDetails as $job)--}}
{{--                    @include('web.common.job_card')--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <!-- End of Job Post Main -->--}}
{{--            @if(($jobDetails->count() > 0 ))--}}
{{--                <div class="row mt30">--}}
{{--                    <div class="col-md-12 text-center">--}}
{{--                        <a href="{{ route('front.search.jobs',array('company'=> $companyDetail->id)) }}"--}}
{{--                           class="btn btn-purple btn-effect">{{ __('web.common.show_all') }}</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    @auth--}}
{{--        @role('Candidate')--}}
{{--        @include('web.company.report_to_company_modal')--}}
{{--        @endrole--}}
{{--    @endauth--}}
    <!-- Job Detail Section -->

    <section class="job-detail-section">
        <!-- Upper Box -->
        <div class="upper-box">
            <div class="auto-container">
                <!-- Job Block -->
                <div class="job-block-three">
                    <div class="inner-box">
                        <div class="content">
                            <span class="company-logo"><img
                                        src="{{ (!empty($companyDetail->company_url)) ? $companyDetail->company_url : asset('assets/img/infyom-logo.png') }}"
                                        alt="" class="job_detail_logo"></span>
                            <h4><a href="#">{{ html_entity_decode($companyDetail->user->full_name) }}</a></h4>
                            <ul class="job-info overflow-ellipsis">
                                <li>
                                    <span class="icon flaticon-briefcase"></span>{{!empty($companyDetail->industry->name)? $companyDetail->industry->name : __('messages.common.n/a')}}
                                </li>
                                @if(!empty($companyDetail->user->city_id) || (!empty($companyDetail->user->state_id)) || (!empty($companyDetail->user->country_id)))
                                    <li>
                                        <span class="icon flaticon-map-locator"></span> {{ (!empty($companyDetail->user->city_id)) ? $companyDetail->user->city_name.', ' : '' }}
                                        {{ (!empty($companyDetail->user->state_id)) ? $companyDetail->user->state_name.', ' : '' }}
                                        {{ (!empty($companyDetail->user->country_id)) ? $companyDetail->user->country_name : '' }}
                                    </li>
                                @endif
                                @isset($companyDetail->user->phone)
                                    <li><span class="icon flaticon-telephone-1"></span>{{$companyDetail->user->phone}}
                                    </li>
                                @endisset
                                <li><span class="icon flaticon-mail"></span>{{$companyDetail->user->email}}</li>
                            </ul>
                            <ul class="job-other-info">
                                <li class="time">Open Jobs – {{$jobDetails->count()}}</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="btn-box flex-sm-row flex-column">
                                @auth
                                    @role('Candidate')
                                    <a href="javascript:void(0)" class="theme-btn btn-style-two mb-sm-0 mb-3 mr-sm-3"
                                       data-favorite-user-id="{{ (getLoggedInUserId() !== null) ? getLoggedInUserId() : null }}"
                                       data-favorite-company_id="{{ $companyDetail->id }}" id="addToFavourite">
                                        <div class="company-follow-text">
                                            <i class="fa fa-star text-white"></i>
                                            <span class="favouriteText text-white"></span>
                                        </div>
                                    </a>
                                    <a href="#reportToCompanyModal"
                                       class="theme-btn btn-style-eight reportToCompanyBtn {{ ($isReportedToCompany) ? 'disabled' : '' }}"
                                       rel="modal:open" {{ ($isReportedToCompany) ? 'style=pointer-events:none;' : '' }}>{{ __('messages.company.report_to_company') }}
                                    </a>
                                    @endrole
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="job-detail-outer">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        <div class="job-detail">
                            <h4>About Company</h4>
                            {!! nl2br($companyDetail->details) !!}
                            </div>

                            <!-- Related Jobs -->
                            <div class="related-jobs mt-3">
                                <div class="title-box">
                                    <h3> {{ ($jobDetails->count() > 0 ) ? __('web.company_details.our_latest_jobs')  : __('web.home_menu.latest_job_not_available')}}</h3>
                                </div>

                                @foreach($jobDetails as $job)
                                    <div class="job-block-three col-lg-12 col-md-12 col-sm-12 p-0">
                                        <div class="inner-box">
                                            <div class="content">
                                                <span class="company-logo"><img src="{{ $job->company->company_url }}" alt=""></span>
                                                <div class="d-flex">
                                                    <h4>
                                                        @if(Str::length($job->job_title) < 35)
                                                            <a href="{{ route('front.job.details',$job->job_id) }}">
                                                                {{ html_entity_decode($job->job_title) }}</a>
                                                        @else
                                                            <a href="{{ route('front.job.details',$job->job_id) }}" data-toggle="tooltip" data-placement="bottom" class="hover-color" title="{{ html_entity_decode($job->job_title) }}">
                                                                {{ Str::limit(html_entity_decode($job->job_title),30,'...') }}</a>
                                                        @endif
                                                    </h4>
                                                </div>
                                                <ul class="job-info">
                                                    <li>
                                                        <span class="icon flaticon-briefcase"></span>{{$job->jobCategory->name}}
                                                    </li>
                                                    @if(!empty($job->country_name))
                                                        <li><span class="icon flaticon-map-locator"></span>
                                                            @if(Str::length($job->full_location) < 45)
                                                                {{ $job->full_location }}
                                                            @else
                                                                <span data-toggle="tooltip" data-placement="bottom"
                                                                      title="{{$job->full_location}}">
                                                        {{ Str::limit($job->full_location,45,'...') }}</span>
                                                            @endif
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <ul class="job-other-info">
                                                @foreach($job->jobsSkill->take(1) as $skills)
                                                    <li class="time">{{$skills->name}}</li>
                                                    @if(count($job->jobsSkill) -1 > 0)
                                                    <li class="green">{{'+'.(count($job->jobsSkill) - 1)}}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            @if($job->activeFeatured)
                                                <button class="bookmark-btn"><i class="fas fa-bookmark featured"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                @if(($jobDetails->count() > 0 ))
                                    <div class="row mt30">
                                        <div class="col-md-12 text-center">
                                            <a href="{{ route('front.search.jobs',array('company'=> $companyDetail->id)) }}" class="theme-btn btn-style-one">{{ __('web.common.show_all') }}</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                    </div>

                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar">
                            <div class="sidebar-widget company-widget">
                                <div class="widget-content">

                                    <ul class="company-info mt-0">
                                        <li>{{ __('web.web_company.ownership') }}:
                                            <span>{{!empty($companyDetail->ownerShipType->name)? $companyDetail->ownerShipType->name : __('messages.common.n/a')}}</span>
                                        </li>
                                        <li>{{ __('web.web_company.company_size') }}:
                                            <span>
                                                {{!empty($companyDetail->companySize->size)? $companyDetail->companySize->size : __('messages.common.n/a')}}</span>
                                        </li>
                                        <li>{{ __('web.web_jobs.founded_in') }}:
                                            <span>{{!empty($companyDetail->established_in)? $companyDetail->established_in : __('messages.common.n/a')}}</span>
                                        </li>
                                        @if($companyDetail->user->phone)
                                            <li>{{ __('web.web_jobs.phone') }}:
                                                <span>{{$companyDetail->user->phone}}</span></li>
                                        @endif
                                        <li>{{ __('web.common.email') }}:
                                            <span>{{$companyDetail->user->email}}</span></li>
                                        <li>{{ __('web.common.location') }}:
                                            <span>
{{ (isset($companyDetail->location)) ? html_entity_decode(Str::limit($companyDetail->location,12,'...')) : __('messages.common.n/a') }} {{ (isset($companyDetail->location2)) ? ','.html_entity_decode(Str::limit($companyDetail->location2,12,'...')) : '' }}
                                                   </span>
                                        </li>
                                        @if(isset($companyDetail->user->facebook_url) || isset($companyDetail->user->twitter_url) || isset($companyDetail->user->pinterest_url) || isset($companyDetail->user->google_plus_url) || isset($companyDetail->user->linkedin_url))
                                            <li>Social media:
                                                <div class="social-links">
                                                    @if(isset($companyDetail->user->facebook_url))
                                                        <a href="{{ (isset($companyDetail->user->facebook_url)) ? $companyDetail->user->facebook_url : 'javascript:void(0)' }}"><i
                                                                class="fab fa-facebook-f"></i></a>
                                                    @endif
                                                    @if(isset($companyDetail->user->twitter_url))
                                                            <a href="{{ (isset($companyDetail->user->twitter_url)) ? $companyDetail->user->twitter_url : 'javascript:void(0)' }}"><i
                                                                        class="fab fa-twitter"></i></a>
                                                        @endif
                                                        @if(isset($companyDetail->user->pinterest_url))
                                                    <a href="{{ (isset($companyDetail->user->pinterest_url)) ? $companyDetail->user->pinterest_url : 'javascript:void(0)' }}"><i class="fab fa-pinterest"></i></a>
                                                        @endif
                                                        @if(isset($companyDetail->user->google_plus_url))
                                                    <a href="{{ (isset($companyDetail->user->google_plus_url)) ? $companyDetail->user->google_plus_url : 'javascript:void(0)' }}"><i class="fab fa-google-plus-g"></i></a>
                                                    @endif
                                                    @if(isset($companyDetail->user->linkedin_url))
                                                        <a href="{{ (isset($companyDetail->user->linkedin_url)) ? $companyDetail->user->linkedin_url : 'javascript:void(0)' }}"><i
                                                                class="fab fa-linkedin-in"></i></a>
                                                    @endif
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                    @isset($companyDetail->website)
                                        <div class="btn-box">
                                            <a href="{{ (isset($companyDetail->website)) ?
                                                                                        (!str_contains($companyDetail->website,'https://')
                                                                                        ? 'https://'.$companyDetail->website
                                                                                        : $companyDetail->website)
                                                                                    : 'javascript:void(0)' }}"
                                               class="theme-btn btn-style-three">  {{ (isset($companyDetail->website)) ? preg_replace("(^https?://www.)", "", $companyDetail->website) : 'N/A' }}</a>
                                        </div>
                                    @endisset
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                </div>
            </div>
        @auth
                @role('Candidate')
                @include('web.company.report_to_company_modal')
                @endrole
            @endauth
        </section>
        <!-- End Job Detail Section -->
    @endsection
    @section('scripts')
        <script>
            let addCompanyFavouriteUrl = "{{ route('save.favourite.company') }}";
            let isCompanyAddedToFavourite = "{{ $isCompanyAddedToFavourite }}";
            let reportToCompanyUrl = "{{ route('report.to.company') }}";
            let followText = "{{ __('web.company_details.follow') }}";
            let unfollowText = "{{ __('web.company_details.unfollow') }}";

        </script>
        <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
        <script src="{{ mix('assets/js/companies/front/company-details.js') }}"></script>
    @endsection
