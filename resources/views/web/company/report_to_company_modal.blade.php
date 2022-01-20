{{--<div id="ex1" class="modal">--}}
{{--    <p>Thanks for clicking. That felt good.</p>--}}
{{--    <a href="#" rel="modal:close">Close</a>--}}
{{--</div>--}}
<div class="modal" id="reportToCompanyModal">
    <div id="login-modal">
    <div class="login-form default-form">
        <div class="form-inner">
            <h3>{{ __('messages.job.add_note') }}</h3>
            <!--Login Form-->
            <form name="frm" id="reportToCompany">
                        @csrf
                <div class="form-group">
                    <input type="hidden" name="userId"
                                       value="{{ (getLoggedInUserId() !== null) ? getLoggedInUserId() : null }}">
                                <input type="hidden" name="companyId" value="{{ $companyDetail->id }}">
                    <textarea rows="5" id="noteForReportToCompany" name="note" class="form-control" required></textarea>
                                    </div>
                    
                                    <div class="form-group">
                                        <button class="theme-btn btn-style-one" type="submit" name="log-in" id="btnSave">{{ __('messages.common.report') }}</button>
                                    </div>
                                </form>
                    
{{--                                <div class="bottom-box">--}}
{{--                                    <div class="text">Don't have an account? <a href="register-popup.html" class="call-modal signup">Signup</a></div>--}}
{{--                                    <div class="divider"><span>or</span></div>--}}
{{--                                    <div class="btn-box row">--}}
{{--                                        <div class="col-lg-6 col-md-12">--}}
{{--                                            <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-facebook-f"></i> Log In via Facebook</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-6 col-md-12">--}}
{{--                                            <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> Log In via Gmail</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                    {{--    <form name="frm" id="reportToCompany">--}}
{{--        @csrf--}}
{{--        <div class="modal-dialog">--}}
{{--            <input type="hidden" name="userId"--}}
{{--                   value="{{ (getLoggedInUserId() !== null) ? getLoggedInUserId() : null }}">--}}
{{--            <input type="hidden" name="companyId" value="{{ $companyDetail->id }}">--}}
{{--            <div class="modal-content">--}}
{{--                <!-- Modal Header -->--}}
{{--                <div class="modal-header m-header">--}}
{{--                    <h4 class="modal-title text-white">{{ __('messages.job.add_note') }}</h4>--}}
{{--                </div>--}}
{{--                <!-- Modal body -->--}}
{{--                <div class="modal-body">--}}
{{--                        <textarea rows="5" id="noteForReportToCompany" name="note" class="form-control"--}}
{{--                                  required></textarea>--}}
{{--                </div>--}}
{{--                <!-- Modal footer -->--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="submit" class="btn btn-purple btn-effect"--}}
{{--                            data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..."--}}
{{--                            data-toggle="modal" id="btnSave">{{ __('messages.common.report') }}--}}
{{--                    </button>--}}
{{--                    <button type="button" class="btn btn-red btn-effect"--}}
{{--                            data-dismiss="modal">{{ __('messages.common.close') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
</div>
</div>
</div>
