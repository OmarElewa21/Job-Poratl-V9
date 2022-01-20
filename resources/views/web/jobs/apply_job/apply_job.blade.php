@extends('web.layouts.app')
@section('title')
    {{ __('web.job_details.apply_for_job') }}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/header-span.css') }}">
@endsection
@section('content')
    {{--    <section class="page-header">--}}
    {{--        <div class="container">--}}

    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <h2>{{ __('web.apply_for_job.apply_for') }} <span class="text-blue">{{ $job->job_title }}</span>--}}
    {{--                    </h2>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <!-- ===== Start of Main Wrapper Job Section ===== -->--}}
    {{--    <section class="ptb80" id="job-page">--}}
    {{--        <div class="container">--}}
    {{--            @if($isApplied)--}}
    {{--                <h3 class="uppercase text-blue">{{ __('web.job_details.already_applied') }}</h3>--}}
    {{--                <div class="row account-question">--}}
    {{--                    <div class="col-md-10 nopadding">--}}
    {{--                        <p class="nomargin">--}}
    {{--                            {{ __('web.apply_for_job.we_received_your_application') }}--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            @else--}}
    {{--                <h3 class="uppercase text-blue">{{ __('web.apply_for_job.fill_details') }}</h3>--}}
    {{--                <div class="row account-question">--}}
    {{--                    <div class="col-md-10 nopadding">--}}
    {{--                        <p class="nomargin">--}}
    {{--                            @if($job->is_suspended)--}}
    {{--                                {{ 'job is suspended' }}--}}
    {{--                            @elseif(!$isActive)--}}
    {{--                                {{ 'job is '.\App\Models\Job::STATUS[$job->status] }}--}}
    {{--                            @else--}}
    {{--                                {{ __('web.apply_for_job.due_to_our_continued_growth') }} {{ $job->job_title }} {{ __('web.apply_for_job.or_words_to_that_effect') }}--}}
    {{--                            @endif--}}

    {{--                            .--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <form id="applyJobForm" class="post-job-resume mt50">--}}
    {{--                    @csrf--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="col-md-12">--}}
    {{--                            <input type="hidden" value="{{ isset($job) ? $job->id : null }}" name="job_id">--}}
    {{--                            <div class="form-group col-sm-12 mt10 ">--}}
    {{--                                <label for="resumeId">{{ __('messages.apply_job.resume').':' }}<span--}}
    {{--                                            class="required asterisk-size">*</span></label>--}}
    {{--                                {{ Form::select('resume_id', $resumes, ($isJobDrafted) ? $draftJobDetails->resume_id : $default_resume, ['class' => 'selectpicker','id' => 'resumeId','placeholder'=>'Select Resume', 'required']) }}--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group col-sm-12">--}}
    {{--                                <label for="expected_salary">{{ __('messages.candidate.expected_salary').':' }}<span--}}
    {{--                                        class="required asterisk-size">*</span></label>--}}
    {{--                                <input type="text" id="expected_salary" name="expected_salary" min="0" max="9999999999"--}}
    {{--                                       value="{{ ($isJobDrafted) ? $draftJobDetails->expected_salary : '' }}"--}}
    {{--                                       class="form-control price-input" required>--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group col-sm-12">--}}
    {{--                                <label for="notes">{{ __('messages.apply_job.notes').':' }}</label>--}}
    {{--                                <textarea rows="5" id="notes" name="notes"--}}
    {{--                                          class="form-control">{{ ($isJobDrafted) ? $draftJobDetails->notes : '' }}</textarea>--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group pt30 nomargin text-right" id="last">--}}
    {{--                                @if(!$isApplied)--}}
    {{--                                    @if(!$isJobDrafted)--}}
    {{--                                        <button class="btn btn-red btn-effect save-draft mr-1" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..." id="draftJobSave">Save as Draft</button>--}}
    {{--                                    @endif--}}
    {{--                                    @if($isActive && !$job->is_suspended)--}}
    {{--                                        <button class="btn btn-blue btn-effect apply-job" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..." id="applyJobSave">{{ __('web.common.apply') }}</button>--}}
    {{--                                    @endif--}}
    {{--                                @else--}}
    {{--                                    <button class="btn btn-green btn-effect">{{ __('web.apply_for_job.already_applied') }}</button>--}}
    {{--                                @endif--}}

    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                </form>--}}
    {{--            @endif--}}
    {{--        </div>--}}
    {{--    </section>--}}



    <section class="page-title contact-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>{{ __('web.job_details.apply_for_job') }}</h1>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="auto-container">

            <div class="upper-box">
                <div class="row">
                    <div class="contact-block col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-box">
                            <div class="row">
                                <div class="col-lg-2">
                                    <img src="{{$job->company->company_url}}" width="150px" class="mb-4 apply-img">
                                </div>
                                <div class="col-lg-10">
                                    <h1 class="ml-3 mb-2">{{ __('web.apply_for_job.apply_for') }}</h1> <span
                                            class="text-blue ml-3">{{ $job->job_title }}</span>
                                </div>
                            </div>
                            <span class="icon"><img src="images/icons/placeholder.svg" alt=""></span>
                            <h3 class="text-danger">{{ __('web.apply_for_job.fill_details') }}</h3>
                            <p class="font-weight-bold">@if($job->is_suspended)
                                    {{ 'job is suspended' }}
                                @elseif(!$isActive)
                                    {{ 'job is '.\App\Models\Job::STATUS[$job->status] }}
                                @else
                                    {{ __('web.apply_for_job.due_to_our_continued_growth') }} {{ $job->job_title }} {{ __('web.apply_for_job.or_words_to_that_effect') }}
                                @endif</p>
                        </div>
                    </div>
                </div>
            </div>
            
            
        {{--            <blockquote class="blockquote-style-one mb-5 mt-5">--}}
        {{--            @if($isApplied)--}}
        {{--                    <div class="text-box">--}}
        {{--                        <h1>{{ $job->job_title }}</h1>--}}
        {{--                    </div>--}}
        {{--                <h3 class="uppercase text-blue">{{ __('web.job_details.already_applied') }}</h3>--}}
        {{--                <div class="row account-question">--}}
        {{--                    <div class="col-md-10 nopadding">--}}
        {{--                        <p class="nomargin">--}}
        {{--                            {{ __('web.apply_for_job.we_received_your_application') }}--}}
        {{--                        </p>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--        @else--}}
        {{--                    <div class="text-box">--}}
        {{--                        <h1>{{ $job->job_title }}</h1>--}}
        {{--                    </div>--}}
        {{--                <h3 class="uppercase text-blue">{{ __('web.apply_for_job.fill_details') }}</h3>--}}
        {{--                <div class="row account-question">--}}
        {{--                    <div class="col-md-10 nopadding">--}}
        {{--                        <p class="nomargin">--}}
        {{--                            @if($job->is_suspended)--}}
        {{--                                {{ 'job is suspended' }}--}}
        {{--                            @elseif(!$isActive)--}}
        {{--                                {{ 'job is '.\App\Models\Job::STATUS[$job->status] }}--}}
        {{--                            @else--}}
        {{--                                {{ __('web.apply_for_job.due_to_our_continued_growth') }} {{ $job->job_title }} {{ __('web.apply_for_job.or_words_to_that_effect') }}--}}
        {{--                            @endif--}}
        {{--                        </p>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </blockquote>--}}
        <!-- Contact Form -->
            <div class="contact-form default-form">
                <!--Contact Form-->
                <form id="applyJobForm" class="post-job-resume mt50">
                    @csrf
                    @include('web.layouts.errors')
                    @include('flash::message')
                    <input type="hidden" value="{{ isset($job) ? $job->id : null }}" name="job_id">
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <div class="response"></div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group chosen-search">
                            <label for="resumeId">{{ __('messages.apply_job.resume').':' }}<span
                                        class="text-danger">*</span></label>
                            <select class="chosen-search-select" data-live-search="true" data-size="5"
                                    name="resume_id" id="resumeId">
                                <option value="">{{ __('web.job_menu.none') }}</option>
                                @foreach($resumes as $key => $value)
                                    <option value="{{ $key }}" {{ ($isJobDrafted) ? $key==$draftJobDetails->resume_id ? 'selected' : '':'' }}>
                                        {{ html_entity_decode($value) }}
                                    </option>
                                @endforeach
                            </select>
                            {{--                            {{ Form::select('resume_id', $resumes, ($isJobDrafted) ? $draftJobDetails->resume_id : $default_resume, ['class' => 'selectpicker form-control','id' => 'resumeId','placeholder'=>'Select Resume', 'required']) }}--}}
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label for="expected_salary">{{ __('messages.candidate.expected_salary').':' }}<span
                                        class="text-danger">*</span></label>
                            <input type="text" id="expected_salary" name="expected_salary" min="0" max="9999999999"
                                   value="{{ ($isJobDrafted) ? $draftJobDetails->expected_salary : '' }}"
                                   class="form-control price-input" required>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <label for="notes">{{ __('messages.apply_job.notes').':' }}</label>
                            <textarea rows="5" id="notes" name="notes"
                                      class="form-control">{{ ($isJobDrafted) ? $draftJobDetails->notes : '' }}</textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mt10 text-center">
                            <div class="g-recaptcha d-flex justify-content-center"
                                 data-sitekey="{{ config('app.google_recaptcha_site_key') }}" name="g-recaptcha"></div>
                            <div id="g-recaptcha-error"></div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group text-center">
                            @if(!$isApplied)
                                @if(!$isJobDrafted)
                                    <button class="theme-btn btn-style-one save-draft mb-3"
                                            data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..."
                                            id="draftJobSave">Save as Draft
                                    </button>
                                @endif
                                @if($isActive && !$job->is_suspended)
                                    <button class="theme-btn btn-style-seven apply-job"
                                            data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..."
                                            id="applyJobSave">{{ __('web.common.apply') }}</button>
                                @endif
                            @else
                                <button class="theme-btn btn-style-eight">{{ __('web.apply_for_job.already_applied') }}</button>
                            @endif
                        </div>
                    </div>
                </form>
                {{--                @endif--}}
            </div>
            <!--End Contact Form -->
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        let applyJobUrl = "{{ route('apply-job') }}";
        let jobDetailsUrl = "{{ url('job-details') }}";
    </script>
    <script src="{{mix('assets/js/custom/input_price_format.js')}}"></script>
    <script src="{{ mix('assets/js/jobs/front/apply_job.js') }}"></script>
@endsection

