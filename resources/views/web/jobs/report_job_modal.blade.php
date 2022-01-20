{{--<div class="modal fade" id="reportJobAbuseModal">--}}
{{--    <form name="frm" id="reportJobAbuse">--}}
{{--        @csrf--}}
{{--        <div class="modal-dialog">--}}
{{--            <input type="hidden" name="userId"--}}
{{--                   value="{{ (getLoggedInUserId() !== null) ? getLoggedInUserId() : null }}">--}}
{{--            <input type="hidden" name="jobId" value="{{ $job->id }}">--}}
{{--            <div class="modal-content">--}}
{{--                <!-- Modal Header -->--}}
{{--                <div class="modal-header m-header">--}}
{{--                    <h4 class="modal-title text-white">{{ __('messages.job.add_note') }}</h4>--}}
{{--                </div>--}}
{{--                <!-- Modal body -->--}}
{{--                <div class="modal-body">--}}
{{--                        <textarea rows="5" id="noteForReportAbuse" name="note" class="form-control"--}}
{{--                                  required></textarea>--}}
{{--                </div>--}}
{{--                <!-- Modal footer -->--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="submit" class="btn btn-purple btn-effect"--}}
{{--                            data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..."--}}
{{--                            data-toggle="modal" id="btnSave">{{ __('web.job_details.report') }}--}}
{{--                    </button>--}}
{{--                    <button type="button" class="btn btn-red btn-effect"--}}
{{--                            data-dismiss="modal">{{ __('web.common.close') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</div>--}}


<div class="modal" id="reportJobAbuseModal">
    <!-- Login modal -->
    <div class="login-form default-form">
        <div class="form-inner">
            <h3>{{ __('messages.job.add_note') }}</h3>
            <!--Login Form-->
            <form name="frm" id="reportJobAbuse">
                @csrf
                <input type="hidden" name="userId"
                       value="{{ (getLoggedInUserId() !== null) ? getLoggedInUserId() : null }}">
                <input type="hidden" name="jobId" value="{{ $job->id }}">
                <div class="form-group">
                         <textarea rows="5" id="noteForReportAbuse" name="note" class="form-control"
                                   required></textarea>
                </div>
                <div class="bottom-box">
                    <div class="btn-box row">
                        <div class="col-lg-6 col-md-12">
                            <button type="submit" class="theme-btn btn-style-one"
                                    data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..."
                                    data-toggle="modal" id="btnSave">{{ __('web.job_details.report') }}
                            </button>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <a href="#close-modal" rel="modal:close" class="theme-btn btn-style-eight">{{ __('messages.common.close') }}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--End Login Form -->
</div>
