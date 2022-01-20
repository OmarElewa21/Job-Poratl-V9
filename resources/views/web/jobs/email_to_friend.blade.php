<!-- Email job to friend - STARTS -->
{{--<div class="modal fade" id="emailJobToFriendModal">--}}
{{--    <form name="frm" id="emailJobToFriend">--}}
{{--        @csrf--}}
{{--        <div class="modal-dialog">--}}
{{--            <input type="hidden" name="user_id"--}}
{{--                   value="{{ (getLoggedInUserId() !== null) ? getLoggedInUserId() : null }}">--}}
{{--            <input type="hidden" name="job_id" value="{{ $job->id }}">--}}
{{--            <div class="modal-content">--}}
{{--                <!-- Modal Header -->--}}
{{--                <div class="modal-header m-header">--}}
{{--                    <h4 class="modal-title text-white">{{ __('messages.job.email_to_friend') }}</h4>--}}
{{--                </div>--}}
{{--                <!-- Modal body -->--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12 form-group">--}}
{{--                            <label for="jobUrl">{{ __('messages.job.job_url') }}</label>--}}
{{--                            <input type="text" class="form-control" name="job_url" id="jobUrl" readonly>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-12 form-group">--}}
{{--                            <label for="friendName">{{ __('messages.job.friend_name') }}</label>--}}
{{--                            <input type="text" class="form-control" name="friend_name" id="friendName" required>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-12 form-group">--}}
{{--                            <label for="friendEmail">{{ __('messages.job.friend_email') }}</label>--}}
{{--                            <input type="email" class="form-control" name="friend_email" id="friendEmail" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Modal footer -->--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="submit" class="btn btn-purple btn-effect"--}}
{{--                            data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..."--}}
{{--                            data-toggle="modal" id="btnSendToFriend">{{ __('web.job_details.send_to_friend') }}--}}
{{--                    </button>--}}
{{--                    <button type="button" class="btn btn-red btn-effect"--}}
{{--                            data-dismiss="modal">{{ __('web.common.close') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</div>--}}
<!-- Email job to friend - ENDS -->


<div class="modal" id="emailJobToFriendModal">
    <!-- Login Form -->
    <div class="login-form default-form">
        <div class="form-inner">
            <h3>{{ __('messages.job.email_to_friend') }}</h3>
            <!--Login Form-->
            <form name="frm" id="emailJobToFriend">
                @csrf
                <input type="hidden" name="user_id"
                       value="{{ (getLoggedInUserId() !== null) ? getLoggedInUserId() : null }}">
                <input type="hidden" name="job_id" value="{{ $job->id }}">
                <div class="form-group">
                    <label for="jobUrl">{{ __('messages.job.job_url') }}</label>
                    <input type="text" class="form-control" name="job_url" id="jobUrl" readonly>
                </div>

                <div class="form-group">
                    <label for="friendName">{{ __('messages.job.friend_name') }}</label>
                    <input type="text" class="form-control" name="friend_name" id="friendName" required>
                </div>

                <div class="form-group">
                    <label for="friendEmail">{{ __('messages.job.friend_email') }}</label>
                    <input type="email" class="form-control" name="friend_email" id="friendEmail" required>
                </div>
                <div class="bottom-box">
                    <div class="btn-box row">
                        <div class="col-lg-6 col-md-12">
                            <button type="submit" class="theme-btn btn-style-one"
                                    data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..."
                                    data-toggle="modal" id="btnSendToFriend">{{ __('web.job_details.send_to_friend') }}
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
