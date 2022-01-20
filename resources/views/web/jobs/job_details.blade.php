@extends('web.layouts.app')
@section('title')
    {{ __('web.job_details.job_details') }}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/header-span.css') }}">
@endsection
@section('content')


    <!-- ===== Start of Main Wrapper Job Section ===== -->
    {{--    <section class="ptb15 bg-gray" id="job-page">--}}
    {{--        <div class="container mTop">--}}

    {{--            <!-- Start of Row -->--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12 col-lg-12 pl-0">--}}
    {{--                    @if($job->is_suspended || !$isActive)--}}
    {{--                        <div class="row">--}}
    {{--                            <div class="col-md-12 col-sm-12">--}}
    {{--                                <div class="alert alert-warning text-warning bg-transparent" role="alert">--}}
    {{--                                    {{ __('web.job_details.job_is') }}--}}
    {{--                                    <strong> {{\App\Models\Job::STATUS[$job->status]}}--}}
    {{--                                        .</strong>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    @endif--}}
    {{--                    @if(Session::has('warning'))--}}
    {{--                        <div class="alert alert-warning" role="alert">--}}
    {{--                            {{ Session::get('warning') }}--}}
    {{--                            <a href="{{ route('candidate.profile',['section'=> 'resumes']) }}"--}}
    {{--                               class="alert-link ml-2 ">{{ __('web.job_details.click_here') }}</a> {{ __('web.job_details.to_upload_resume') }}--}}
    {{--                            .--}}
    {{--                        </div>--}}
    {{--                    @endif--}}
    {{--                </div>--}}

    {{--                <!-- ===== Start of Job Details ===== -->--}}
    {{--                <div class="col-md-8 col-xs-12">--}}

    {{--                    <!-- Start of Company Info -->--}}
    {{--                    <div class="row company-info job-d-info container-shadow">--}}

    {{--                        <!-- Jobjob-page Company Image -->--}}
    {{--                        <div class="col-md-3">--}}
    {{--                            <div class="job-company">--}}
    {{--                                <a href="#">--}}
    {{--                                    <img src="{{ $job->company->company_url }}" alt="">--}}
    {{--                                </a>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <!-- Job Company Info -->--}}
    {{--                        <div class="col-md-9">--}}
    {{--                            <div class="job-company-info mt10">--}}
    {{--                                <h3 class="capitalize">{{ html_entity_decode(Str::limit($job->job_title,50,'...')) }}</h3>--}}
    {{--                                @auth--}}
    {{--                                    @role('Candidate')--}}
    {{--                                    <ul class="social-btns list-inline mt5">--}}
    {{--                                        <li class="j-detail-social-btn">--}}
    {{--                                            <button class="btn btn-success btn-effect emailJobToFriend"--}}
    {{--                                                    data-toggle="modal"--}}
    {{--                                                    data-target="#emailJobToFriendModal">{{ __('web.job_details.email_to_friend') }}--}}
    {{--                                            </button>--}}
    {{--                                        </li>--}}
    {{--                                        <li class="j-detail-social-btn">--}}
    {{--                                            <button class="btn btn-red btn-effect reportJobAbuse {{ ($isJobReportedAsAbuse) ? 'disabled' : '' }}"--}}
    {{--                                                    data-toggle="modal"--}}
    {{--                                                    data-target="#reportJobAbuseModal">{{ __('web.job_details.report_abuse') }}--}}
    {{--                                            </button>--}}
    {{--                                        </li>--}}
    {{--                                        @if(!$isJobApplicationRejected)--}}
    {{--                                            <li class="j-detail-social-btn">--}}
    {{--                                                <button class="btn btn-orange btn-effect"--}}
    {{--                                                        data-favorite-user-id="{{ (getLoggedInUserId() !== null) ? getLoggedInUserId() : null }}"--}}
    {{--                                                        data-favorite-job-id="{{ $job->id }}" id="addToFavourite">--}}
    {{--                                                    <span class="favouriteText"></span>--}}
    {{--                                                </button>--}}
    {{--                                            </li>--}}
    {{--                                        @endif--}}
    {{--                                    </ul>--}}
    {{--                                    @endrole--}}
    {{--                                @endauth--}}
    {{--                                <div class="pt10">--}}
    {{--                                    @if($job->description)--}}
    {{--                                        <p>{!! nl2br($job->description) !!} </p>--}}
    {{--                                    @else--}}
    {{--                                        <p>N/A</p>--}}
    {{--                                    @endif--}}
    {{--                                </div>--}}

    {{--                            </div>--}}
    {{--                        </div>--}}


    {{--                    </div>--}}
    {{--                    <div class="row mt40">--}}
    {{--                        <div class="col-md-12">--}}
    {{--                            <h4 class="font-weight-bold">{{ __('web.job_details.job_details') }}</h4>--}}
    {{--                            <hr/>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-8 mt15">--}}

    {{--                            <div class="row mt15">--}}
    {{--                                <div class="col-md-5">--}}
    {{--                                    <h6>{{ Form::label('job_category_id', __('messages.job_category.job_category').':') }}</h6>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-md-7"><h6>{{ html_entity_decode($job->jobCategory->name) }}</h6></div>--}}
    {{--                            </div>--}}
    {{--                            @if($job->careerLevel)--}}
    {{--                                <div class="row mt15">--}}
    {{--                                    <div class="col-md-5">--}}
    {{--                                        <h6>{{ Form::label('career_level_id', __('messages.job.career_level').':') }}</h6>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="col-md-7">--}}
    {{--                                        <h6>{{ html_entity_decode($job->careerLevel->level_name) }}</h6></div>--}}
    {{--                                </div>--}}
    {{--                            @endif--}}
    {{--                            @if(count($job->jobsTag) > 0)--}}
    {{--                                <div class="row mt15">--}}
    {{--                                    <div class="col-md-5">--}}
    {{--                                        <h6>{{ Form::label('job_shift_id', __('messages.job_tag.show_job_tag').':') }}</h6>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="col-md-7">--}}
    {{--                                        <h6>{{ ($job->jobsTag->isNotEmpty()) ? html_entity_decode($job->jobsTag->pluck('name')->implode(', ')) : __('messages.common.n/a') }}</h6>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            @endif--}}
    {{--                            <div class="row mt15">--}}
    {{--                                <div class="col-md-5">--}}
    {{--                                    <h6>{{ Form::label('job_type', __('messages.job.job_type').':') }}</h6>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-md-7">--}}
    {{--                                    <h6>{{ ($job->jobType) ? html_entity_decode($job->jobType->name) : __('messages.common.n/a') }}</h6>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            @if($job->jobShift)--}}
    {{--                                <div class="row mt15">--}}
    {{--                                    <div class="col-md-5">--}}
    {{--                                        <h6>{{ Form::label('job_shift_id', __('messages.job.job_shift').':') }}</h6>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="col-md-7"><h6>{{ html_entity_decode($job->jobShift->shift) }}</h6></div>--}}
    {{--                                </div>--}}
    {{--                            @endif--}}
    {{--                            <div class="row mt15">--}}
    {{--                                <div class="col-md-5">--}}
    {{--                                    <h6>{{ Form::label('functional_area_id', __('messages.job.functional_area').':') }}</h6>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-md-7"><h6>{{ html_entity_decode($job->functionalArea->name) }}</h6>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            @if($job->degreeLevel)--}}
    {{--                                <div class="row mt15">--}}
    {{--                                    <div class="col-md-5">--}}
    {{--                                        <h6>{{ Form::label('degree_level_id', __('messages.job.degree_level').':') }}</h6>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="col-md-7"><h6>{{ html_entity_decode($job->degreeLevel->name) }}</h6>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            @endif--}}
    {{--                            <div class="row mt15">--}}
    {{--                                <div class="col-md-5">--}}
    {{--                                    <h6>{{ Form::label('position', __('messages.positions').':') }}</h6>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-md-7"><h6>{{ isset($job->position)?$job->position:'0' }}</h6>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="row mt15">--}}
    {{--                                <div class="col-md-5">--}}
    {{--                                    <h6>{{ Form::label('position', __('messages.job_experience.job_experience').':') }}</h6>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-md-7"><h6>--}}
    {{--                                        {{ isset($job->experience) ? $job->experience .' '. __('messages.candidate_profile.year') :'No experience' }}</h6>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="row mt15">--}}
    {{--                                <div class="col-md-5">--}}
    {{--                                    <h6>{{ Form::label('salary_period_id', __('messages.job.salary_period').':') }}</h6>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-md-7"><h6>{{ $job->salaryPeriod->period }}</h6></div>--}}
    {{--                            </div>--}}
    {{--                            <div class="row mt15">--}}
    {{--                                <div class="col-md-5">--}}
    {{--                                    <h6>{{ Form::label('is_freelance', __('messages.job.is_freelance').':') }}</h6>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-md-7">--}}
    {{--                                    <h6>{{ $job->is_freelance == 1 ? __('messages.common.yes') : __('messages.common.no') }}</h6>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <!-- End of Company Info -->--}}

    {{--                </div>--}}
    {{--                <!-- ===== End of Job Details ===== -->--}}

    {{--                <!-- ===== Start of Job Sidebar ===== -->--}}
    {{--                <div class="col-md-4 col-xs-12">--}}

    {{--                    <!-- Start of Job Sidebar -->--}}
    {{--                    <div class="job-sidebar">--}}
    {{--                        <ul class="job-overview nopadding mt5 mb5">--}}
    {{--                            <li>--}}
    {{--                                <h5><i class="fa fa-calendar"></i>{{ __('web.job_details.date_posted') }}:</h5>--}}
    {{--                                <span>{{ date('jS M, Y', strtotime($job->created_at)) }}</span>--}}
    {{--                            </li>--}}

    {{--                            <li>--}}
    {{--                                <h5><i class="fa fa-map-marker"></i>{{ __('web.common.location') }}:</h5>--}}
    {{--                                <span>--}}
    {{--                                    @if (!empty($job->city_id))--}}
    {{--                                        {{$job->city_name}} ,--}}
    {{--                                    @endif--}}

    {{--                                    @if (!empty($job->state_id))--}}
    {{--                                        {{$job->state_name}},--}}
    {{--                                    @endif--}}

    {{--                                    @if (!empty($job->country_id))--}}
    {{--                                        {{$job->country_name}}--}}
    {{--                                    @endif--}}

    {{--                                    @if(empty($job->country_id))--}}
    {{--                                        Location Information not available.--}}
    {{--                                    @endif--}}
    {{--                                </span>--}}
    {{--                            </li>--}}
    {{--                            <li>--}}
    {{--                                <h5><i class="fa fa-calendar"></i>{{ __('messages.job.expires_on') }}:</h5>--}}
    {{--                                <span>{{ date('jS M, Y', strtotime($job->job_expiry_date)) }}</span>--}}
    {{--                            </li>--}}

    {{--                            <li>--}}
    {{--                                <h5><i class="fa fa-cogs"></i> {{ __('web.job_details.job_skills') }}:</h5>--}}
    {{--                                @if($job->jobsSkill->isNotEmpty())--}}
    {{--                                    <span>{{html_entity_decode($job->jobsSkill->pluck('name')->implode(', ')) }}</span>--}}
    {{--                                @else--}}
    {{--                                    <p>N/A</p>--}}
    {{--                                @endif--}}
    {{--                            </li>--}}

    {{--                            @if(!$job->hide_salary)--}}
    {{--                                <li>--}}
    {{--                                    <h5><i class="fa fa-money"></i> {{ __('web.job_details.salary') }}:</h5>--}}
    {{--                                    <span>{{ $job->currency->currency_icon }}</span>--}}
    {{--                                    <span>{{ formatCurrency($job->salary_from) . '-' . formatCurrency($job->salary_to) }}</span>--}}
    {{--                                    <b>({{ $job->currency->currency_name }})</b>--}}
    {{--                                </li>--}}
    {{--                            @endif--}}
    {{--                        </ul>--}}
    {{--                        <h5>{{ __('web.apply_for_job.share_this_job') }}</h5>--}}
    {{--                        <ul class="social-btns list-inline mt10">--}}
    {{--                            <li>--}}
    {{--                                <a href="{{ $url['facebook'] }}"--}}
    {{--                                   class="social-btn-roll facebook transparent border-22px" target="_blank">--}}
    {{--                                    <div class="social-btn-roll-icons">--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-facebook"></i>--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-facebook"></i>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li>--}}
    {{--                                <a href="{{ $url['gmail'] }}"--}}
    {{--                                   class="social-btn-roll google transparent border-22px" target="_blank">--}}
    {{--                                    <div class="social-btn-roll-icons">--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-google"></i>--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-google"></i>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li>--}}
    {{--                                <a href="{{ $url['pinterest'] }}"--}}
    {{--                                   class="social-btn-roll pinterest transparent border-22px" target="_blank">--}}
    {{--                                    <div class="social-btn-roll-icons">--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-pinterest"></i>--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-pinterest"></i>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li>--}}
    {{--                                <a href="{{ $url['twitter'] }}" class="social-btn-roll twitter transparent border-22px"--}}
    {{--                                   target="_blank">--}}
    {{--                                    <div class="social-btn-roll-icons">--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-twitter"></i>--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-twitter"></i>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                            <li>--}}
    {{--                                <a href="https://www.linkedin.com/shareArticle/?url={{ rawurlencode(URL::to('/job-details/'.$job->job_id ))}}"--}}
    {{--                                   class="social-btn-roll linkedin transparent border-22px" target="_blank">--}}
    {{--                                    <div class="social-btn-roll-icons">--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-linkedin"></i>--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-linkedin"></i>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                        </ul>--}}
    {{--                        @auth--}}
    {{--                            @role('Candidate')--}}
    {{--                            @if(!$isApplied && !$isJobApplicationRejected && ! $isJobApplicationCompleted && ! $isJobApplicationShortlisted)--}}
    {{--                                <div class="mt20">--}}
    {{--                                    @if($isActive && !$job->is_suspended && \Carbon\Carbon::today()->toDateString() < $job->job_expiry_date->toDateString())--}}
    {{--                                        <button--}}
    {{--                                            class="btn {{ $isJobDrafted ? 'btn-red' : 'btn-purple' }} btn-block btn-effect"--}}
    {{--                                            onclick="window.location='{{ route('show.apply-job-form', $job->job_id) }}'">--}}
    {{--                                            {{ $isJobDrafted ? __('web.job_details.edit_draft') : __('web.job_details.apply_for_job') }}--}}
    {{--                                        </button>--}}
    {{--                                    @endif--}}
    {{--                                </div>--}}
    {{--                            @else--}}
    {{--                                <div class="mt20">--}}
    {{--                                    <p>--}}
    {{--                                        <button class="btn btn-green btn-block btn-effect">{{ __('web.job_details.already_applied') }}</button>--}}
    {{--                                    </p>--}}
    {{--                                </div>--}}
    {{--                            @endif--}}
    {{--                            @endrole--}}
    {{--                        @else--}}
    {{--                            @if($isActive && !$job->is_suspended && \Carbon\Carbon::today()->toDateString() < $job->job_expiry_date->toDateString())--}}
    {{--                                <div class="mt20">--}}
    {{--                                    <button class="btn btn-purple btn-block"--}}
    {{--                                            onclick="window.location='{{ route('front.register') }}'">{{ __('web.job_details.register_to_apply') }}--}}
    {{--                                    </button>--}}
    {{--                                    <button class="btn btn-purple btn-block btn-effect"--}}
    {{--                                            onclick="window.location='{{ route('front.candidate.login') }}'">--}}
    {{--                                        {{ __('web.job_details.apply_for_job') }}--}}
    {{--                                    </button>--}}
    {{--                                </div>--}}
    {{--                            @endif--}}
    {{--                        @endauth--}}
    {{--                    </div>--}}
    {{--                    <!-- Start of Job Sidebar -->--}}

    {{--                    <!-- ===== Start of Company Overview ===== -->--}}
    {{--                    <div>--}}
    {{--                        <div class="job-sidebar mt20">--}}
    {{--                            <h5>{{ __('web.job_details.company_overview') }}</h5>--}}
    {{--                            <div class="row">--}}
    {{--                                <div class="col-md-12 col-sm-12 col-xs-12">--}}
    {{--                                    <a href="{{ route('front.company.details', $job->company->unique_id) }}">--}}
    {{--                                        <img src="{{ $job->company->company_url }}"--}}
    {{--                                             class="c-company-image company-image"/>--}}
    {{--                                    </a>--}}

    {{--                                </div>--}}
    {{--                                <div class="col-md-12 col-sm-12 col-xs-12 mt10">--}}
    {{--                                    <a href="{{ route('front.company.details', $job->company->unique_id) }}">--}}
    {{--                                        <h5 class="text-primary">{{ html_entity_decode($job->company->user->first_name) }}</h5>--}}
    {{--                                    </a>--}}
    {{--                                    <div class="text-dark c-company-p pt10 pb10">--}}
    {{--                                        <i class="fa fa-map-marker"></i>--}}
    {{--                                        <span>--}}
    {{--                                            @if (!empty($job->company->city_name))--}}
    {{--                                                {{$job->company->city_name}} ,--}}
    {{--                                            @endif--}}

    {{--                                            @if (!empty($job->company->state_name))--}}
    {{--                                                {{$job->company->state_name}},--}}
    {{--                                            @endif--}}

    {{--                                            @if (!empty($job->company->country_name))--}}
    {{--                                                {{$job->company->country_name}}--}}
    {{--                                            @endif--}}

    {{--                                            @if(empty($job->company->country_name))--}}
    {{--                                                {{ __('web.job_details.location_information_not_available') }}--}}
    {{--                                            @endif--}}
    {{--                                        </span>--}}
    {{--                                    </div>--}}
    {{--                                    <h6>--}}
    {{--                                        <a href="{{ route('front.company.details', $job->company->unique_id) }}"><span--}}
    {{--                                                    class="label label-info mt20">{{ $jobsCount }} {{ __('web.companies_menu.opened_jobs') }}</span></a>--}}
    {{--                                    </h6>--}}
    {{--                                    <hr/>--}}
    {{--                                    <p>--}}
    {{--                                        {!! nl2br($job->company->details) !!}--}}
    {{--                                    </p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <!-- ===== End of Company Overview ===== -->--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--                <!-- End of Row -->--}}

    {{--                @auth--}}
    {{--                    @role('Candidate')--}}
    {{--                    @include('web.jobs.email_to_friend')--}}
    {{--                    @include('web.jobs.report_job_modal')--}}
    {{--                    @endrole--}}
    {{--                @endauth--}}

    {{--            @if(count($getRelatedJobs)>0)--}}
    {{--                <div class="row mt40 mb30">--}}
    {{--                    <div class="col-md-12 text-center">--}}
    {{--                        <h3 class="pb5">{{ __('web.job_details.related_jobs') }}</h3>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <!-- Start of Row -->--}}
    {{--                <div class="row nomargin job-post-wrapper mt10 d-flex justify-content-center flex-wrap">--}}
    {{--                    <!-- Start of Job Post Wrapper -->--}}
    {{--                    @if(count($getRelatedJobs)>0)--}}
    {{--                        @foreach($getRelatedJobs as $job)--}}
    {{--                            @if($job->status != \App\Models\Job::STATUS_DRAFT)--}}
    {{--                                @include('web.common.job_card')--}}
    {{--                            @endif--}}
    {{--                        @endforeach--}}
    {{--                        <div class="row full-width-li">--}}
    {{--                            <div class="col-md-12 text-center pt30">--}}
    {{--                                <a href="{{ route('front.search.jobs') }}"--}}
    {{--                                   class="btn btn-purple btn-effect">{{ __('web.common.show_all') }}</a>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    @else--}}
    {{--                        <div class="related-job-not-found">--}}
    {{--                            <h5 class="text-center">{{ __('web.job_details.related_job_not_available') }}</h5>--}}
    {{--                        </div>--}}
    {{--                    @endif--}}
    {{--                </div>--}}
    {{--            @endif--}}
    {{--                    <!-- End of Job Post Wrapper -->--}}
    {{--            <!-- End of Row -->--}}

    {{--        </div>--}}
    {{--    </section>--}}

    <section class="job-detail-section">
        <!-- Upper Box -->
        <div class="upper-box">
            <div class="auto-container">
                <!-- Job Block -->
                <div class="job-block-three">
                    <div class="inner-box">
                        <div class="content">
                            <span class="company-logo">
                                <a href="#">
                                <img src="{{ $job->company->company_url }}" alt="" class="job_detail_logo">
                            </a>
                            </span>
                            <h4>
                                <a href="#">{{ html_entity_decode(Str::limit($job->job_title,50,'...')) }}</a>@if($job->activeFeatured)
                                    <span class="primary ml-2">Featured</span>@endif</h4>
                            <ul class="job-info">
                                <li><span class="icon flaticon-briefcase"></span>
                                    {{ html_entity_decode($job->jobCategory->name) }}</li>
                                <li><span class="icon flaticon-clock-3"></span> {{ $job->created_at->diffForHumans() }}
                                </li>
                                @if($job->hide_salary=='0')
                                    <li><span class="icon flaticon-money"></span>
                                        <span>{{ $job->currency->currency_icon }}</span>
                                        {{ formatCurrency($job->salary_from) . '-' . formatCurrency($job->salary_to) }}
                                    </li>
                                @endif
                            </ul>
                            @if(count($job->jobsTag) > 0)
                                <ul class="job-other-info">
                                    @foreach($job->jobsTag->pluck('name') as $value)
                                        <li class="time">{{ $value }}</li>
                                        {{--                                <li class="privacy">Private</li>--}}
                                        {{--                                <li class="required">Urgent</li>--}}
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="btn-box mt-2 mb-2">
                            @auth
                                @role('Candidate')
                                <a href="#emailJobToFriendModal"
                                   class="theme-btn btn-style-four emailJobToFriend mb-sm-0 mb-3 ml-2"
                                   rel="modal:open" data-backdrop="static"
                                   data-keyboard="false">{{ __('web.job_details.email_to_friend') }}</a>
                                <a href="#reportJobAbuseModal"
                                   class="theme-btn btn-style-eight reportJobAbuse mb-sm-0 mb-3  ml-2"
                                   {{ ($isJobReportedAsAbuse) ? 'style=pointer-events:none;' : '' }} rel="modal:open">{{ __('web.job_details.report_abuse') }}</a>
                                @if(!$isApplied && !$isJobApplicationRejected && ! $isJobApplicationCompleted && ! $isJobApplicationShortlisted)
                                    @if($isActive && !$job->is_suspended && \Carbon\Carbon::today()->toDateString() < $job->job_expiry_date->toDateString())
                                        <button
                                                class="theme-btn ml-2 {{ $isJobDrafted ? 'btn-style-two' : 'btn-style-seven' }} "
                                                onclick="window.location='{{ route('show.apply-job-form', $job->job_id) }}'">
                                            {{ $isJobDrafted ? __('web.job_details.edit_draft') : __('web.job_details.apply_for_job') }}
                                        </button>
                                    @endif
                                @else
                                    <button class="theme-btn btn-style-two ml-2">{{ __('web.job_details.already_applied') }}</button>
                                @endif
                                @if(!$isJobApplicationRejected)
                                    <div class="bookmark-btn">
                                        <button data-favorite-user-id="{{ (getLoggedInUserId() !== null) ? getLoggedInUserId() : null }}"
                                                data-favorite-job-id="{{ $job->id }}" id="addToFavourite">
                                            <i class="{{ ($isJobAddedToFavourite)? 'fas fa-bookmark featured':'flaticon-bookmark' }}"
                                               id="favorite"></i>
                                        </button>
                                    </div>
                                @endif
                                @endrole
                            @else
                                @if($isActive && !$job->is_suspended && \Carbon\Carbon::today()->toDateString() < $job->job_expiry_date->toDateString())
                                    <button class="theme-btn btn-style-one mb-3"
                                            onclick="window.location='{{ route('candidate.register') }}'">{{ __('web.job_details.register_to_apply') }}
                                    </button>
                                    <button class="theme-btn btn-style-seven"
                                            onclick="window.location='{{ route('front.candidate.login') }}'">
                                                            {{ __('web.job_details.apply_for_job') }}
                                                        </button>
                                    @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="job-detail-outer">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        @if($job->is_suspended || !$isActive)
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="alert alert-warning text-warning bg-transparent" role="alert">
                                        {{ __('web.job_details.job_is') }}
                                        <strong> {{\App\Models\Job::STATUS[$job->status]}}.</strong>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(Session::has('warning'))
                            <div class="alert alert-warning" role="alert">
                                {{ Session::get('warning') }}
                                <a href="{{ route('candidate.profile',['section'=> 'resumes']) }}"
                                   class="alert-link ml-2 ">{{ __('web.job_details.click_here') }}</a> {{ __('web.job_details.to_upload_resume') }}
                                .
                            </div>
                        @endif
                        <div class="job-detail">
                            <h4>{{ __('web.web_jobs.job_description') }}</h4>
                            @if($job->description)
                                <p>{!! nl2br($job->description) !!} </p>
                            @else
                                <p>N/A</p>
                            @endif
                            {{--                            <h4>Key Responsibilities</h4>--}}
                            {{--                            <ul class="list-style-three">--}}
                            {{--                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>--}}
                            {{--                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>--}}
                            {{--                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>--}}
                            {{--                                <li>Accurately estimate design tickets during planning sessions.</li>--}}
                            {{--                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>--}}
                            {{--                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>--}}
                            {{--                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>--}}
                            {{--                                <li>Present your work to the wider business at Show & Tell sessions.</li>--}}
                            {{--                            </ul>--}}
                            {{--                            <h4>Skill & Experience</h4>--}}
                            {{--                            <ul class="list-style-three">--}}
                            {{--                                <li>You have at least 3 years’ experience working as a Product Designer.</li>--}}
                            {{--                                <li>You have experience using Sketch and InVision or Framer X</li>--}}
                            {{--                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>--}}
                            {{--                                <li>You are familiar using Jira and Confluence in your workflow</li>--}}
                            {{--                            </ul>--}}
                        </div>

                        <!-- Other Options -->
                        <div class="other-options">
                            <div class="social-share flex-wrap">
                                <div class="col-md-3">
                                    <h5>{{ __('web.apply_for_job.share_this_job') }}</h5>
                                </div>
                                <div class="col-md-9 d-flex flex-wrap">
                                    <a href="{{ $url['facebook'] }}" target="_blank" class="facebook d-flex"><i
                                                class="fab fa-facebook-f"></i> {{ __('web.web_jobs.facebook') }}</a>
                                    <a href="https://www.linkedin.com/shareArticle/?url={{ rawurlencode(URL::to('/job-details/'.$job->job_id ))}}"
                                       target="_blank" class="linkedin d-flex"><i
                                                class="fab fa-linkedin"></i> {{ __('web.web_jobs.linkedin') }}</a>
                                    <a href="{{ $url['twitter'] }}" target="_blank" class="twitter d-flex"><i
                                                class="fab fa-twitter"></i> {{ __('web.web_jobs.twitter') }}</a>
                                    <a href="{{ $url['gmail'] }}" target="_blank" class="google d-flex"><i
                                                class="fab fa-google"></i> {{ __('web.web_jobs.google') }}</a>
                                    <a href="{{ $url['pinterest'] }}" target="_blank" class="pinterest d-flex"><i
                                                class="fab fa-pinterest"></i> {{ __('web.web_jobs.pinterest') }}</a>
                                </div>
                            </div>
                        </div>
                        @auth
                    @endauth
                    <!-- Related Jobs -->
                        @if(count($getRelatedJobs)>0)
                        <div class="related-jobs">
                                <div class="title-box">
                                    <h3>{{ __('web.job_details.related_jobs') }}</h3>
                                </div>
                            <!-- Job Block -->
                            <!-- Start of Row -->
                            <div>
                                <!-- Start of Job Post Wrapper -->
                                @foreach($getRelatedJobs as $relatedJob)
                                    @if($relatedJob->status != \App\Models\Job::STATUS_DRAFT)
                                        <div class="job-block">
                                            <div class="inner-box">
                                                <div class="content">
                                                    <span class="company-logo"><img
                                                                src="{{ $relatedJob->company->company_url }}"
                                                                alt=""></span>
                                                    <h4>
                                                        <a href="{{route('front.job.details',$relatedJob['job_id']) }}">{{ html_entity_decode($relatedJob['job_title']) }}</a>
                                                    </h4>
                                                    <ul class="job-info">
                                                        <li>
                                                            <span class="icon flaticon-briefcase"></span> {{$relatedJob->jobCategory->name}}
                                                        </li>
                                                        <li>
                                                            <span class="icon flaticon-map-locator"></span> {{ (!empty($relatedJob->full_location)) ? $relatedJob->full_location : 'Location Info. not available.'}}
                                                        </li>
                                                        <li>
                                                            <span class="icon flaticon-clock-3"></span> {{$relatedJob->created_at->diffForHumans()}}
                                                        </li>
                                                        @if($job->hide_salary=='0')
                                                        <li>
                                                            <span class="">{{$relatedJob->currency->currency_icon}}</span> {{$relatedJob->salary_from}}
                                                            - {{$relatedJob->salary_to}}</li>
                                                        @endif
                                                    </ul>
                                                    <ul class="job-other-info">
                                                        @foreach($relatedJob->jobsSkill->take(1) as $jobSkill)
                                                            <li class="time">{{$jobSkill->name}}</li>
                                                            @if(count($relatedJob->jobsSkill) -1 > 0)
                                                            <li class="green">{{'+'.(count($relatedJob->jobsSkill) - 1)}}</li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    @if($relatedJob->activeFeatured)
                                                        <button class="bookmark-btn"><i
                                                                    class="fas fa-bookmark featured"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="row full-width-li">
                                <div class="col-md-12 text-center pt30">
                                    <a href="{{ route('front.search.jobs') }}"
                                       class="theme-btn btn-style-one">{{ __('web.common.show_all') }}</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar">
                            <div class="sidebar-widget">
                            <!-- Job Overview -->
                                <h4 class="widget-title">{{ __('web.web_jobs.job_overview') }}</h4>
    <div class="widget-content">
        <ul class="job-overview">
            <li>
                <i class="icon far fa-calendar-alt"></i>
                <h5>{{ __('web.job_details.date_posted') }}:</h5>
                                            <span>{{ date('jS M, Y', strtotime($job->created_at)) }}</span>
            </li>
            <li>
                <i class="icon far fa-hourglass"></i>
                <h5>{{ __('web.web_jobs.expiration_date') }}:</h5>
                                            <span>{{ date('jS M, Y', strtotime($job->job_expiry_date)) }}</span>
            </li>
            <li>
                <i class="icon fas fa-map-marker-alt"></i>
                <h5>{{ __('web.common.location') }}</h5>
                                            <span>
                                                @if (!empty($job->city_id))
                                                    {{$job->city_name}} ,
                                                @endif

                                                @if (!empty($job->state_id))
                                                    {{$job->state_name}},
                                                @endif

                                                @if (!empty($job->country_id))
                                                    {{$job->country_name}}
                                                @endif

                                                @if(empty($job->country_id))
                                                    {{ __('web.job_details.location_information_not_available') }}
                                                @endif
                                            </span>
                                        </li>
                                        <li>
                                            <i class="icon fas fa-divide"></i>
                                            <h5>{{__('messages.job.job_type')}}:</h5>
                                            <span> {{ ($job->jobType) ? html_entity_decode($job->jobType->name) : __('messages.common.n/a') }}</span>
                                        </li>
                            @if($job->jobShift)
                                            <li>
                                                <i class="icon far fa-clock"></i>
                                                <h5>{{__('messages.job.job_shift')}}:</h5>
                                                {{--                                            <span> {{ html_entity_decode($job->jobShift->shift) }}</span>--}}
                                        </li>
                            @endif
            <li>
                <i class="icon function-area"></i>
                <h5>{{__('messages.job.functional_area')}}:</h5>
                                            <span> {{ html_entity_decode($job->functionalArea->name) }}</span>
                                        </li>
                            @if($job->degreeLevel)
                <li>
                    <i class="icon fas fa-graduation-cap"></i>
                    <h5>{{__('messages.job.degree_level')}}:</h5>
                                            <span> {{ html_entity_decode($job->degreeLevel->name) }}</span>
                                        </li>
                            @endif
            <li>
                <i class="icon open-position"></i>
                <h5>{{__('messages.positions')}}:</h5>
                                            <span>{{ isset($job->position)?$job->position:'0' }}</span>
                                        </li>
            <li>
                <i class="icon fas fa-briefcase"></i>
                <h5>{{__('messages.job_experience.job_experience')}}:</h5>
                                            <span> {{ isset($job->experience) ? $job->experience .' '. __('messages.candidate_profile.year') :'No experience' }}</span>
            </li>
            <li>
                <i class="icon salary-period"></i>
                <h5>{{__('messages.job.salary_period')}}:</h5>
                                <span>{{ $job->salaryPeriod->period }}</span>
            </li>
            <li>
                <i class="icon fas fa-user-tie"></i>
                <h5>{{__('messages.job.is_freelance')}}:</h5>
                                <span>{{ $job->is_freelance == 1 ? __('messages.common.yes') : __('messages.common.no') }}</span>
                            </li>
                             </ul>
                        </div>

                            <!-- Job Skills -->
                                <h4 class="widget-title">{{ __('web.job_details.job_skills') }}</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @if($job->jobsSkill->isNotEmpty())
                                            @foreach($job->jobsSkill->pluck('name') as $key => $value)
                                                <li>
                                                    <a>{{html_entity_decode($value) }}</a>
                                                </li>
                                            @endforeach
                                        @else
                                            <p>N/A</p>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget company-widget">
                                <div class="widget-content">
                                    <h4 class="widget-title">{{ __('web.job_details.company_overview') }}</h4>
                                    <div class="company-title">
                                        <div class="company-logo"><img src="{{ $job->company->company_url }}" alt=""
                                                                       class="company_overview">
                                        </div>
                                        <h5 class="company-name">{{ html_entity_decode($job->company->user->first_name) }}</h5>
                                        <a href="{{ route('front.company.details', $job->company->unique_id) }}"
                                           class="profile-link">{{ __('web.web_jobs.view_company_profile') }}</a>
                                    </div>
                                    <ul class="company-info">
                                        {{--                                        <li>Primary industry: <span></span></li>--}}
                                        {{--                                        <li>Company size: <span></span></li>--}}
                                        <li>{{ __('web.web_jobs.founded_in') }} :
                                            <span> {{$job->company->established_in}} </span></li>
                                        @if($job->company->user->phone)
                                        <li>{{ __('web.web_jobs.phone') }}: <span>{{$job->company->user->phone}}</span></li>
                                        @endif
                                        <li>{{ __('web.common.location') }}: <span>
                                                @if (!empty($job->company->location))
                                                    {{$job->company->location}}
                                                @endif
                                                @if(empty($job->company->location))
                                                    {{ __('web.job_details.location_information_not_available') }}
                                                @endif</span></li>
                                        {{--                                        <li>Social media:--}}
                                        {{--                                            <div class="social-links">--}}
                                        {{--                                                <a href="#"><i class="fab fa-facebook-f"></i></a>--}}
                                        {{--                                                <a href="#"><i class="fab fa-twitter"></i></a>--}}
                                        {{--                                                <a href="#"><i class="fab fa-instagram"></i></a>--}}
                                        {{--                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </li>--}}
                                    </ul>
                                    <div class="btn-box">
                                        <a href="{{ route('front.company.details', $job->company->unique_id) }}" class="w-100 btn-style-four mb-2">{{ __('web.companies_menu.opened_jobs') }}:{{ $jobsCount?$jobsCount : 0 }} </span></a>
                                    </div>
                                    @if($job->company->website)
                                    <div class="btn-box"><a target="_blank" href="{{$job->company->website}}"
                                                            class="theme-btn btn-style-three">{{$job->company->website}}</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @role('Candidate')
    @include('web.jobs.email_to_friend')
    @include('web.jobs.report_job_modal')
    @endrole
@endsection
@section('scripts')
    <script>
        let addJobFavouriteUrl = "{{ route('save.favourite.job') }}";
        let reportAbuseUrl = "{{ route('report.job.abuse') }}";
        let emailJobToFriend = "{{ route('email.job') }}";
        let isJobAddedToFavourite = "{{ $isJobAddedToFavourite }}";
        let removeFromFavorite = "{{ __('web.job_details.remove_from_favorite') }}";
        let addToFavorites = "{{ __('web.job_details.add_to_favorite') }}";
    </script>
    <script src="{{ mix('assets/js/jobs/front/job_details.js') }}"></script>
@endsection
