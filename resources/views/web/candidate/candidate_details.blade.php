@extends('web.layouts.app')
@section('title')
    {{ __('messages.candidate.candidate_details') }}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/header-span.css') }}">
@endsection
@section('content')
    <!-- ===== Start of Candidate Profile Header Section ===== -->
    {{--    <section class="profile-header">--}}
    {{--    </section>--}}
    {{--    <section class="pb80 work-education bg-gray" id="candidate-profile">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row candidate-profile">--}}

    {{--                <div class="col-md-3 col-xs-12">--}}
    {{--                    <div class="profile-photo ticket-sender-picture">--}}
    {{--                        <img src="{{ $candidateDetails->user->avatar }}" class="img-responsive" alt="">--}}
    {{--                    </div>--}}

    {{--                    <ul class="social-btns list-inline text-center mt20">--}}

    {{--                        @if(! empty($candidateDetails->user->facebook_url))--}}
    {{--                            <li>--}}
    {{--                                <a href="{{ (isset($candidateDetails->user->facebook_url)) ? $candidateDetails->user->facebook_url : 'javascript:void(0)' }}"--}}
    {{--                                   class="social-btn-roll facebook transparent" target="_blank">--}}
    {{--                                    <div class="social-btn-roll-icons">--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-facebook"></i>--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-facebook"></i>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                        @endif--}}
    {{--                        @if(! empty($candidateDetails->user->twitter_url))--}}
    {{--                            <li>--}}
    {{--                                <a href="{{ (isset($candidateDetails->user->twitter_url)) ? $candidateDetails->user->twitter_url : 'javascript:void(0)' }}"--}}
    {{--                                   class="social-btn-roll twitter transparent" target="_blank">--}}
    {{--                                    <div class="social-btn-roll-icons">--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-twitter"></i>--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-twitter"></i>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                        @endif--}}
    {{--                        @if(! empty($candidateDetails->user->google_plus_url))--}}
    {{--                            <li>--}}
    {{--                                <a href="{{ (isset($candidateDetails->user->google_plus_url)) ? $candidateDetails->user->google_plus_url : 'javascript:void(0)' }}"--}}
    {{--                                   class="social-btn-roll google-plus transparent" target="_blank">--}}
    {{--                                    <div class="social-btn-roll-icons">--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-google-plus"></i>--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-google-plus"></i>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                        @endif--}}
    {{--                        @if(! empty($candidateDetails->user->pinterest_url))--}}
    {{--                            <li>--}}
    {{--                                <a href="{{ (isset($candidateDetails->user->pinterest_url)) ? $candidateDetails->user->pinterest_url : 'javascript:void(0)' }}"--}}
    {{--                                   class="social-btn-roll pinterest transparent" target="_blank">--}}
    {{--                                    <div class="social-btn-roll-icons">--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-pinterest"></i>--}}
    {{--                                        <i class="social-btn-roll-icon fa fa-pinterest"></i>--}}
    {{--                                    </div>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                        @endif--}}
    {{--                        @if(! empty($candidateDetails->user->linkedin_url))--}}
    {{--                            <li>--}}
    {{--                                <a href="{{ (isset($candidateDetails->user->linkedin_url)) ? $candidateDetails->user->linkedin_url : 'javascript:void(0)' }}"--}}
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
    {{--                            <h2 class="capitalize">{{ html_entity_decode($candidateDetails->user->full_name) }}</h2>--}}
    {{--                            <h5 class="pt10">{{ $candidateDetails->functionalArea->name ?? ''  }}</h5>--}}
    {{--                        </div>--}}
    {{--                        <div class="row">--}}
    {{--                            @if(!empty($candidateDetails->user->country_name))--}}
    {{--                                <div class="col-lg-4 mb10">--}}
    {{--                                    <i class="fa fa-map-marker"></i>--}}

    {{--                                    <span>{{ $candidateDetails->user->country_name }}--}}
    {{--                                        @if(!empty($candidateDetails->user->state_name))--}}
    {{--                                            , {{ $candidateDetails->user->state_name }}--}}
    {{--                                        @endif--}}
    {{--                                        @if(!empty($candidateDetails->user->city_name))--}}
    {{--                                            , {{ $candidateDetails->user->city_name }}</span>--}}
    {{--                                    @endif--}}
    {{--                                </div>--}}
    {{--                            @endif--}}
    {{--                            <div class="col-lg-4 mb10">--}}
    {{--                                <i class="fa fa-envelope"></i>--}}
    {{--                                <span>{{ $candidateDetails->user->email }}</span>--}}
    {{--                            </div>--}}
    {{--                            @if(!empty($candidateDetails->user->dob))--}}
    {{--                                <div class="col-lg-4 mb10">--}}
    {{--                                    <i class="fa fa-birthday-cake"></i>--}}
    {{--                                    <span>--}}
    {{--                                        {{ date('jS M, Y', strtotime($candidateDetails->user->dob)) }}--}}
    {{--                                </span>--}}
    {{--                                </div>--}}
    {{--                            @endif--}}
    {{--                            @if(isset($candidateDetails->user->phone))--}}
    {{--                                <div class="col-lg-4">--}}
    {{--                                    <i class="fa fa-phone"></i>--}}
    {{--                                    <span>{{ $candidateDetails->user->phone }}</span>--}}
    {{--                                </div>--}}
    {{--                            @endif--}}
    {{--                        </div>--}}
    {{--                        @auth--}}
    {{--                            @role('Employer')--}}
    {{--                            <div class="row">--}}
    {{--                                <div class="col-md-offset-12 ml-0 col-md-6 reportJobBtn">--}}
    {{--                                    <div class="company-report-web company-web clearfix">--}}
    {{--                                        <button--}}
    {{--                                                class="mt15 btn btn-small btn-red btn-effect reportToCompany reportToCandidate {{ ($isReportedToCandidate) ? 'disabled' : '' }}"--}}
    {{--                                                data-toggle="modal"--}}
    {{--                                                data-target="#reportToCandidateModal">--}}
    {{--                                            {{ __('messages.candidate.reporte_to_candidate') }}--}}
    {{--                                        </button>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            @endrole--}}
    {{--                        @endauth--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--            </div>--}}

    {{--            <div class="job-header mt30 box-shadow">--}}
    {{--                <div class="contentbox">--}}
    {{--                    <h3>{{ __('messages.skills') }}</h3>--}}
    {{--                    <div class="row skillbar">--}}
    {{--                        @if($candidateDetails->user->candidateSkill->count())--}}
    {{--                            @foreach($candidateDetails->user->candidateSkill as $candidateSkill)--}}
    {{--                                <div class="col-md-6 col-xs-12 mt20">--}}
    {{--                                    <div class="skillbar-title mr-xy-auto one-line-truncate">--}}
    {{--                                        <span>{{ html_entity_decode($candidateSkill->name) }}</span>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            @endforeach--}}
    {{--                        @else--}}
    {{--                            <h4 class="text-center">{{ __('messages.skill.no_skill_available') }}</h4>--}}
    {{--                        @endif--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="job-header mt30 box-shadow">--}}
    {{--                <div class="contentbox">--}}
    {{--                    <h3>{{ __('messages.candidate_profile.education') }}</h3>--}}
    {{--                    <ul class="educationList">--}}
    {{--                        @forelse($candidateEducations as $candidateEducation)--}}
    {{--                            <li>--}}
    {{--                                <div class="date educationCard">{{ $candidateEducation->year }}</div>--}}
    {{--                                <div class="education-card">--}}
    {{--                                    <h4>{{$candidateEducation->degreeLevel->name}}</h4>--}}
    {{--                                    @if(!empty($candidateEducation->country_name))--}}
    {{--                                        <label class="text-muted">--}}
    {{--                                            <i class="fa fa-map-marker"></i> {{ $candidateEducation->country_name }}--}}
    {{--                                        </label>--}}
    {{--                                    @endif--}}
    {{--                                    <div class="row">--}}
    {{--                                        <div class="col-md-4">--}}
    {{--                                    <span class="text-muted font-weight-bolder">--}}
    {{--                                            {{ __('messages.candidate_profile.institute').' : '.$candidateEducation->institute}}--}}
    {{--                                    </span>--}}
    {{--                                        </div>--}}
    {{--                                        <div class="col-md-4">--}}
    {{--                                    <span class="text-muted font-weight-bolder">--}}
    {{--                                        {{ __('messages.candidate_profile.result').' : '.$candidateEducation->result}}--}}
    {{--                                    </span>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </li>--}}
    {{--                        @empty--}}
    {{--                            <h4 class="text-center">{{ __('messages.candidate.education_not_found') }}</h4>--}}
    {{--                        @endforelse--}}
    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="job-header mt30 box-shadow">--}}
    {{--                <div class="contentbox">--}}
    {{--                    <h3>{{ __('messages.candidate.experience') }}</h3>--}}
    {{--                    <ul class="experienceList">--}}
    {{--                        @forelse($candidateExperiences as $candidateExperience)--}}
    {{--                            <li>--}}
    {{--                                <div class="date">--}}
    {{--                                    {{ \Carbon\Carbon::parse($candidateExperience->start_date)->format('Y') }}--}}
    {{--                                    <br>-<br>--}}
    {{--                                    {{($candidateExperience->currently_working) ? 'present' : \Carbon\Carbon::parse($candidateExperience->end_date)->format('Y') }}--}}
    {{--                                </div>--}}
    {{--                                <div class="row">--}}
    {{--                                    <div class="col-md-10">--}}
    {{--                                        <h4>{{$candidateExperience->company}}</h4>--}}
    {{--                                        <div class="row">--}}
    {{--                                            <div class="col-md-6">--}}
    {{--                                                @if(!empty($candidateExperience->country_name))--}}
    {{--                                                    <label class="text-muted">--}}
    {{--                                                        <i class="fa fa-map-marker"></i>--}}
    {{--                                                        {{ $candidateExperience->country_name }}--}}
    {{--                                                    </label>--}}
    {{--                                                @endif--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                        @if(!empty($candidateExperience->description))--}}
    {{--                                            <p class="text-muted"--}}
    {{--                                               data-toggle="tooltip">{!! nl2br($candidateExperience->description) !!}</p>--}}
    {{--                                        @endif--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </li>--}}
    {{--                        @empty--}}
    {{--                            <h4 class="text-center">{{ __('messages.candidate.experience_not_found') }}</h4>--}}
    {{--                        @endforelse--}}
    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <section class="candidate-detail-section">
        <!-- Upper Box -->
        <div class="upper-box">
            <div class="auto-container">
                <!-- Candidate block Five -->
                <div class="candidate-block-five">
                    <div class="inner-box">
                        <div class="content">
                            <figure class="image"><img src="{{ $candidateDetails->user->avatar }}" alt=""></figure>
                            <h4 class="name"><a
                                        href="#">{{ html_entity_decode($candidateDetails->user->full_name) }}</a></h4>
                            <ul class="candidate-info">
                                @if($candidateDetails->functionalArea)
                                    <li>
                                        <span class="icon flaticon-briefcase"></span>{{ $candidateDetails->functionalArea->name}}
                                    </li>
                                @endif
                                @if(!empty($candidateDetails->user->country_name))
                                    <li>
                                        <span class="icon flaticon-map-locator"></span>
                                        <span>{{$candidateDetails->user->country_name}}
                                            @if(!empty($candidateDetails->user->state_name))
                                                ,{{$candidateDetails->user->state_name }}
                                            @endif
                                            @if(!empty($candidateDetails->user->city_name))
                                                ,{{$candidateDetails->user->city_name}}</span>
                                        @endif
                                    </li>
                                @endif
                                <li><span class="icon flaticon-envelope"></span>{{$candidateDetails->user->email}}</li>
                                @if($candidateDetails->user->dob)
                                        <li>
                                        <span
                                            class="icon flaticon-royal-crown-of-elegant-vintage-design"></span> {{ date('jS M, Y', strtotime($candidateDetails->user->dob))}}
                                        </li>
                                    @endif
                            </ul>
                            @auth
                                @role('Employer')
                                <ul class="post-tags mt-2">
                                    <a href="#reportToCandidateModal"
                                       class="theme-btn btn-style-eight reportToCompany  reportToCandidate"
                                       {{ ($isReportedToCandidate) ? 'style=pointer-events:none;' : '' }}
                                       rel="modal:open">{{ __('messages.candidate.reporte_to_candidate') }}</a>
                                </ul>
                                @endrole
                            @endauth
                        </div>
                        {{--                        <div class="btn-box">--}}
                        {{--                            <a href="#" class="theme-btn btn-style-one">Download CV</a>--}}
                        {{--                            <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>

        <div class="candidate-detail-outer">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        <div class="job-detail">
                        {{--                            <h4>Candidates About</h4>--}}
                        {{--                            <p>Hello my name is Nicole Wells and web developer from Portland. In pharetra orci dignissim, blandit mi semper, ultricies diam. Suspendisse malesuada suscipit nunc non volutpat. Sed porta nulla id orci laoreet tempor non consequat enim. Sed vitae aliquam velit. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie. Morbi ornare ipsum sed sem condimentum, et pulvinar tortor luctus. Suspendisse condimentum lorem ut elementum aliquam.</p>--}}
                        {{--                            <p>Mauris nec erat ut libero vulputate pulvinar. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie. Morbi ornare ipsum sed sem condimentum, et pulvinar tortor luctus. Suspendisse condimentum lorem ut elementum aliquam. Mauris nec erat ut libero vulputate pulvinar.</p>--}}

                        <!-- Resume / Education -->
                            <div class="resume-outer">
                                <div class="upper-title">
                                    <h4>Education</h4>
                                </div>
                                <!-- Resume BLock -->
                                @forelse($candidateEducations as $candidateEducation)
                                    <div class="resume-block">
                                        <div class="inner">

                                        <span class="name">{{ucfirst($candidateEducation->institute[0])}}</span>
                                            <div class="title-box">
                                                <div class="info-box">
                                                    <h3>{{$candidateEducation->degreeLevel->name}}</h3>
                                                    <span> {{ucfirst($candidateEducation->institute)}}</span>
                                                </div>
                                                <div class="edit-box">
                                                    <span class="year">{{ $candidateEducation->year }}</span>
                                                </div>
                                            </div>
                                            {{--                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>--}}
                                        </div>
                                    </div>
                                @empty
                                    <h4 class="text-center">{{ __('messages.candidate.education_not_found') }}</h4>
                                @endforelse
                            </div>

                            <!-- Resume / Work & Experience -->
                            <div class="resume-outer theme-blue">
                                <div class="upper-title">
                                    <h4>Work & Experience</h4>
                                </div>
                                <!-- Resume BLock -->

                                @forelse($candidateExperiences as $candidateExperience)
                                    <div class="resume-block">
                                        <div class="inner">
                                            <span class="name">{{ucfirst($candidateExperience->company[0])}}</span>
                                            <div class="title-box">
                                                <div class="info-box">
                                                    <h3>{{$candidateExperience->experience_title}}</h3>
                                                    <span>{{ucfirst($candidateExperience->company)}}</span>
                                                </div>
                                                <div class="edit-box">
                                                    <span class="year">  {{ \Carbon\Carbon::parse($candidateExperience->start_date)->format('Y') }} - {{($candidateExperience->currently_working) ? 'present' : \Carbon\Carbon::parse($candidateExperience->end_date)->format('Y') }}</span>
                                                </div>
                                            </div>
                                            @if(!empty($candidateExperience->description))
                                                <div class="text">{!! Str::limit(nl2br($candidateExperience->description),300,'...') !!}</div>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <h4 class="text-center">{{ __('messages.candidate.experience_not_found') }}</h4>
                                @endforelse
                            </div>

                            <!-- Portfolio -->
                        {{--                            <div class="portfolio-outer">--}}
                        {{--                                <div class="row">--}}
                        {{--                                    <div class="col-lg-3 col-md-3 col-sm-6">--}}
                        {{--                                        <figure class="image">--}}
                        {{--                                            <a href="images/resource/portfolio-1.jpg" class="lightbox-image"><img src="images/resource/portfolio-1.jpg" alt=""></a>--}}
                        {{--                                            <span class="icon flaticon-plus"></span>--}}
                        {{--                                        </figure>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="col-lg-3 col-md-3 col-sm-6">--}}
                        {{--                                        <figure class="image">--}}
                        {{--                                            <a href="images/resource/portfolio-2.jpg" class="lightbox-image"><img src="images/resource/portfolio-2.jpg" alt=""></a>--}}
                        {{--                                            <span class="icon flaticon-plus"></span>--}}
                        {{--                                        </figure>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="col-lg-3 col-md-3 col-sm-6">--}}
                        {{--                                        <figure class="image">--}}
                        {{--                                            <a href="images/resource/portfolio-3.jpg" class="lightbox-image"><img src="images/resource/portfolio-3.jpg" alt=""></a>--}}
                        {{--                                            <span class="icon flaticon-plus"></span>--}}
                        {{--                                        </figure>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="col-lg-3 col-md-3 col-sm-6">--}}
                        {{--                                        <figure class="image">--}}
                        {{--                                            <a href="images/resource/portfolio-4.jpg" class="lightbox-image"><img src="images/resource/portfolio-4.jpg" alt=""></a>--}}
                        {{--                                            <span class="icon flaticon-plus"></span>--}}
                        {{--                                        </figure>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        <!-- Resume / Awards -->
                        {{--                            <div class="resume-outer theme-yellow">--}}
                        {{--                                <div class="upper-title">--}}
                        {{--                                    <h4>Awards</h4>--}}
                        {{--                                </div>--}}
                        {{--                                <!-- Resume BLock -->--}}
                        {{--                                <div class="resume-block">--}}
                        {{--                                    <div class="inner">--}}
                        {{--                                        <span class="name"></span>--}}
                        {{--                                        <div class="title-box">--}}
                        {{--                                            <div class="info-box">--}}
                        {{--                                                <h3>Perfect Attendance Programs</h3>--}}
                        {{--                                                <span></span>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="edit-box">--}}
                        {{--                                                <span class="year">2012 - 2014</span>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}


                        {{--                                <!-- Resume BLock -->--}}
                        {{--                                <div class="resume-block">--}}
                        {{--                                    <div class="inner">--}}
                        {{--                                        <span class="name"></span>--}}
                        {{--                                        <div class="title-box">--}}
                        {{--                                            <div class="info-box">--}}
                        {{--                                                <h3>Top Performer Recognition</h3>--}}
                        {{--                                                <span></span>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="edit-box">--}}
                        {{--                                                <span class="year">2012 - 2014</span>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante<br> ipsum primis in faucibus.</div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        <!-- Video Box -->
                            {{--                            <div class="video-outer">--}}
                            {{--                                <h4>Candidates About</h4>--}}
                            {{--                                <div class="video-box">--}}
                            {{--                                    <figure class="image">--}}
                            {{--                                        <a href="https://www.youtube.com/watch?v=Fvae8nxzVz4" class="play-now" data-fancybox="gallery" data-caption="">--}}
                            {{--                                            <img src="images/resource/video-img.jpg" alt="">--}}
                            {{--                                            <i class="icon flaticon-play-button-3" aria-hidden="true"></i>--}}
                            {{--                                        </a>--}}
                            {{--                                    </figure>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    {{--{{ dd(\Carbon\Carbon::parse($candidateDetails->user->dob)->age) }}--}}
                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        @include('web.candidate.candidate_detail_sidebar')
                    </div>
                </div>
            </div>
        </div>
    </section>
    @role('Employer')
    @include('web.candidate.report_to_candidate_modal')
    @endrole
@endsection
@section('scripts')
    <script>
        let reportToCandidateUrl = "{{ route('report.to.candidate') }}";
    </script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ mix('assets/js/candidate/front/candidate-details.js') }}"></script>
@endsection

