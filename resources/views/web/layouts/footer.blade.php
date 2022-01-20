{{--<!-- =============== Start of Footer 1 =============== -->--}}
{{--<footer class="footer1">--}}

{{--    <!-- ===== Start of Footer Information & Links Section ===== -->--}}
{{--    <div class="footer-info ptb80 custom-ptb-40">--}}
{{--        <div class="container">--}}

{{--            <!-- 1st Footer Column -->--}}
{{--            <div class="col-md-4 col-sm-12 col-xs-12 footer-about">--}}

{{--                <!-- Your Logo Here -->--}}
{{--                <a href="{{ route('front.home') }}">--}}
{{--                    <img src="{{ asset($settings['footer_logo']) }}" alt="Footer Logo">--}}
{{--                </a>--}}

{{--                <!-- Small Description -->--}}
{{--                <p class="pt40">{{ html_entity_decode($settings['company_description']) }}</p>--}}

{{--                <!-- Info -->--}}
{{--                <ul class="nopadding">--}}
{{--                    <li><i class="fa fa-map-marker"></i>{{$settings['address'] }}</li>--}}
{{--                    <li><a href="tel:{{ '+'.$settings['region_code'].' '.$settings['phone'] }}"><i class="fa fa-phone"></i>{{ '+'.$settings['region_code'].' '.$settings['phone'] }}</a></li>--}}
{{--                    <li><a href="mailto:{{$settings['email']}}"><i class="fa fa-envelope-o"></i>{{ $settings['email'] }}</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <!-- 2nd Footer Column -->--}}
{{--            <div class="col-md-4 col-sm-12 col-xs-12 footer-links footer-spacer">--}}
{{--                <h3>{{ __('web.footer.useful_links') }}</h3>--}}

{{--                <!-- Links -->--}}
{{--                <ul class="nopadding">--}}
{{--                    <li><a href="{{ url('/') }}"><i class="fa fa-angle-double-right"></i>{{ __('web.home') }}</a></li>--}}
{{--                    <li><a href="{{ route('front.search.jobs') }}"><i--}}
{{--                                    class="fa fa-angle-double-right"></i>{{ __('web.jobs') }}</a></li>--}}
{{--                    <li><a href="{{ route('front.company.lists') }}"><i--}}
{{--                                    class="fa fa-angle-double-right"></i>{{ __('web.companies') }}</a></li>--}}
{{--                    @auth--}}
{{--                        @role('Employer|Admin')--}}
{{--                        <li><a href="{{ route('front.candidate.lists')}}"><i--}}
{{--                                    class="fa fa-angle-double-right"></i>{{ __('web.job_seekers') }}</a></li>--}}
{{--                        @endrole--}}
{{--                    @endauth--}}
{{--                    <li><a href="{{ route('front.about.us') }}"><i--}}
{{--                                class="fa fa-angle-double-right"></i>{{ __('web.about_us') }}</a></li>--}}
{{--                    <li><a href="{{ route('front.contact') }}"><i--}}
{{--                                class="fa fa-angle-double-right"></i>{{ __('web.contact_us') }}</a></li>--}}
{{--                    <li><a href="{{ route('front.post.lists') }}"><i--}}
{{--                                class="fa fa-angle-double-right"></i>{{ __('messages.post.posts') }}</a></li>--}}
{{--                    <li><a href="{{ route('privacy.policy.list') }}"><i--}}
{{--                                class="fa fa-angle-double-right"></i>{{ __('messages.setting.privacy_policy') }}</a>--}}
{{--                    </li>--}}
{{--                    <li><a href="{{ route('terms.conditions.list') }}"><i--}}
{{--                                class="fa fa-angle-double-right"></i>{{ __('messages.setting.terms_conditions') }}</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <!-- 4th Footer Column -->--}}
{{--            <div class="col-md-4 col-sm-12 col-xs-12 footer-newsletter footer-spacer">--}}
{{--                <h3>{{ __('web.footer.newsletter') }}</h3>--}}
{{--                <p>{{ __('web.footer.newsletter_text') }}</p>--}}

{{--                <!-- Subscribe Form -->--}}
{{--                <form id="newsLetterForm" class="form-inline mailchimp mtb30">--}}

{{--                    <!-- Form -->--}}
{{--                    <div class="form-group">--}}
{{--                        <div class="input-group">--}}
{{--                            <input type="email" name="email" class="form-control width-75" id="mc-email" placeholder="Your Email"--}}
{{--                                   autocomplete="off" required>--}}
{{--                            <label for="mc-email"></label>--}}
{{--                            <button type="submit" class="btn btn-orange btn-effect width-25" id="btnLetterSave"--}}
{{--                                    data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing...">{{ __('web.common.submit') }}</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- ===== End of Footer Information & Links Section ===== -->--}}


{{--    <!-- ===== Start of Footer Copyright Section ===== -->--}}
{{--    <div class="copyright ptb40 custom-ptb-20">--}}
{{--        <div class="container">--}}

{{--            <div class="col-md-6 col-sm-6 col-xs-12">--}}
{{--                <span>--}}
{{--                    {{ __('web.footer.all_rights_reserved') }} &copy;{{ date('Y') }}--}}
{{--                    <a href="{{ getSettingValue('company_url') }}" class="text-blue">--}}
{{--                        {{ html_entity_decode($settings['application_name']) }}.--}}
{{--                    </a>--}}
{{--                </span>--}}
{{--            </div>--}}

{{--            <div class="col-md-6 col-sm-6 col-xs-12">--}}
{{--                <!-- Start of Social Media Buttons -->--}}
{{--                <ul class="social-btns list-inline text-right">--}}
{{--                    <!-- Social Media -->--}}
{{--                    @if(!empty($settings['facebook_url']))--}}
{{--                        <li>--}}
{{--                            <a href="{{ $settings['facebook_url'] }}" class="social-btn-roll facebook"--}}
{{--                               target="_blank">--}}
{{--                                <div class="social-btn-roll-icons">--}}
{{--                                    <i class="social-btn-roll-icon fa fa-facebook"></i>--}}
{{--                                    <i class="social-btn-roll-icon fa fa-facebook"></i>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                <!-- Social Media -->--}}
{{--                    @if(!empty($settings['twitter_url']))--}}
{{--                        <li>--}}
{{--                            <a href="{{ $settings['twitter_url'] }}" class="social-btn-roll twitter" target="_blank">--}}
{{--                                <div class="social-btn-roll-icons">--}}
{{--                                    <i class="social-btn-roll-icon fa fa-twitter"></i>--}}
{{--                                    <i class="social-btn-roll-icon fa fa-twitter"></i>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                <!-- Social Media -->--}}
{{--                    @if(!empty($settings['google_plus_url']))--}}
{{--                        <li>--}}
{{--                            <a href="{{ $settings['google_plus_url'] }}" class="social-btn-roll google-plus"--}}
{{--                               target="_blank">--}}
{{--                                <div class="social-btn-roll-icons">--}}
{{--                                    <i class="social-btn-roll-icon fa fa-google-plus"></i>--}}
{{--                                    <i class="social-btn-roll-icon fa fa-google-plus"></i>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}

{{--                <!-- Social Media -->--}}
{{--                    @if(!empty($settings['linkedIn_url']))--}}
{{--                        <li>--}}
{{--                            <a href="{{ $settings['linkedIn_url']}}" class="social-btn-roll linkedin"--}}
{{--                               target="_blank">--}}
{{--                                <div class="social-btn-roll-icons">--}}
{{--                                    <i class="social-btn-roll-icon fa fa-linkedin"></i>--}}
{{--                                    <i class="social-btn-roll-icon fa fa-linkedin"></i>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                </ul>--}}
{{--                <!-- End of Social Media Buttons -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- ===== End of Footer Copyright Section ===== -->--}}

{{--</footer>--}}
{{--<!-- =============== End of Footer 1 =============== -->--}}

{{--<!-- ===== Start of Back to Top Button ===== -->--}}
{{--<a href="#" class="back-top" style="margin-bottom: 36px"><i class="fa fa-chevron-up"></i></a>--}}
{{--<!-- ===== End of Back to Top Button ===== -->--}}

{{--@include('cookieConsent::index')--}}

{{--<!-- ===== Start of Login Pop Up div ===== -->--}}
{{--<div class="cd-user-modal">--}}
{{--    <!-- this is the entire modal form, including the background -->--}}
{{--    <div class="cd-user-modal-container">--}}
{{--        <!-- this is the container wrapper -->--}}
{{--        <ul class="cd-switcher">--}}
{{--            <li><a href="#0">{{ __('web.footer.sign_in') }}</a></li>--}}
{{--            <li><a href="#1">{{ __('web.footer.new_account') }}</a></li>--}}
{{--        </ul>--}}

{{--        <div id="cd-login">--}}
{{--            <!-- log in form -->--}}
{{--            <form class="cd-form">--}}
{{--                <p class="fieldset">--}}
{{--                    <label class="image-replace cd-email" for="signin-email">{{ __('web.common.email') }}</label>--}}
{{--                    <input class="full-width has-padding has-border" id="signin-email" type="email"--}}
{{--                           placeholder="E-mail">--}}
{{--                </p>--}}
{{--                <p class="fieldset">--}}
{{--                    <label class="image-replace cd-password"--}}
{{--                           for="signin-password">{{ __('web.common.password') }}</label>--}}
{{--                    <input class="full-width has-padding has-border" id="signin-password" type="password"--}}
{{--                           placeholder="Password">--}}
{{--                </p>--}}
{{--                <p class="fieldset">--}}
{{--                    <input type="checkbox" id="remember-me" checked>--}}
{{--                    <label for="remember-me">{{ __('web.login_menu.remember_me') }}</label>--}}
{{--                </p>--}}
{{--                <p class="fieldset">--}}
{{--                    <button type="submit" value="Login" class="btn btn-purple btn-effect">{{ __('web.login') }}</button>--}}
{{--                </p>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        <!-- cd-login -->--}}

{{--        <div id="cd-signup">--}}
{{--            <!-- sign up form -->--}}
{{--            <form class="cd-form">--}}
{{--                <p class="fieldset">--}}
{{--                    <label class="image-replace cd-username"--}}
{{--                           for="signup-username">{{ __('web.footer.username') }}</label>--}}
{{--                    <input class="full-width has-padding has-border" id="signup-username" type="text"--}}
{{--                           placeholder="Username">--}}
{{--                </p>--}}
{{--                <p class="fieldset">--}}
{{--                    <label class="image-replace cd-email" for="signup-email">{{ __('web.common.email') }}</label>--}}
{{--                    <input class="full-width has-padding has-border" id="signup-email" type="email"--}}
{{--                           placeholder="E-mail">--}}
{{--                </p>--}}
{{--                <p class="fieldset">--}}
{{--                    <label class="image-replace cd-password"--}}
{{--                           for="signup-password">{{ __('web.common.password') }}</label>--}}
{{--                    <input class="full-width has-padding has-border" id="signup-password" type="password"--}}
{{--                           placeholder="Password">--}}
{{--                </p>--}}
{{--                <p class="fieldset">--}}
{{--                    <input type="checkbox" id="accept-terms">--}}
{{--                    <label for="accept-terms">{{ __('web.footer.i_agree_to_the') }} <a--}}
{{--                                href="#0">{{ __('web.footer.terms') }}</a></label>--}}
{{--                </p>--}}
{{--                <p class="fieldset">--}}
{{--                    <button class="btn btn-purple btn-effect" type="submit"--}}
{{--                            value="Create account">{{ __('web.register_menu.create_account') }}</button>--}}
{{--                </p>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        <!-- cd-signup -->--}}
{{--    </div>--}}
{{--    <!-- cd-user-modal-container -->--}}
{{--</div>--}}
{{--<!-- cd-user-modal -->--}}
{{--<!-- ===== End of Login Pop Up div ===== -->--}}
<!-- Main Footer -->

<footer class="main-footer alternate">
    <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row">
                <div class="big-column col-lg-3 col-md-6">
                    <div class="footer-column about-widget">
                        <div class="logo"><a href="{{ route('front.home') }}"><img
                                    src="{{ asset($settings['footer_logo']) }}" alt="" class="img-fluid"></a></div>
                        <p class="phone-num"><span>Call us </span><a
                                href="tel:{{ '+'.$settings['region_code'].' '.$settings['phone'] }}">{{ $settings['region_code'].' '.$settings['phone'] }}</a>
                        </p>
                        <p class="address"><span class="icon flaticon-map-locator"> </span>{{$settings['address'] }}</p>
                        <p>
                            <a href="mailto:{{$settings['email']}}"><i
                                    class="fa fa-envelope-o"></i>{{ $settings['email'] }}</a>
                        </p>
                    </div>
                </div>

                <div class="big-column col-lg-4 col-md-12">
                    <div class="row">
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4 class="widget-title">{{ __('web.footer.useful_links') }}</h4>
                                <div class="widget-content">
                                    <ul class="list">
                                        <li><a href="{{ url('/') }}">{{ __('web.home') }}</a></li>
                                        <li><a href="{{ route('front.search.jobs') }}">{{ __('web.jobs') }}</a></li>
                                        <li><a href="{{ route('front.company.lists') }}">{{ __('web.companies') }}</a></li>
                                        @auth
                                            @role('Employer|Admin')
                                            <li>
                                                <a href="{{ route('front.candidate.lists')}}">{{ __('web.job_seekers') }}</a>
                                            </li>
                                            @endrole
                                        @endauth
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h4 class="widget-title"> {{ __('web.web_home.helpful_resources') }}</h4>
                                <div class="widget-content">
                                    <ul class="list">
                                        <li><a href="{{ route('front.about.us') }}">{{ __('web.about_us') }}</a></li>
                                        <li><a href="{{ route('front.contact') }}">{{ __('web.contact_us') }}</a></li>
                                        <li>
                                            <a href="{{ route('front.post.lists') }}">{{ __('messages.post.posts') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('privacy.policy.list') }}"
                                               class="privacy-footer">{{ __('messages.setting.privacy_policy') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('terms.conditions.list') }}"
                                               class="condition-footer">{{ __('messages.setting.terms_conditions') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                <div class="big-column col-xl-4 col-lg-3 col-md-12">--}}
                {{--                    <div class="row">--}}
                {{--                        <div class="footer-column col-lg-12 col-md-12 col-sm-12">--}}
                {{--                            <div class="footer-widget">--}}
                {{--                                <h4 class="widget-title">{{ __('web.footer.newsletter') }}</h4>--}}
                {{--                                <p class="mb-3">{{ __('web.footer.newsletter_text') }}</p>--}}
                {{--                            </div>--}}
                {{--                            <div class="widget-content">--}}
                {{--                                <form id="newsLetterForm" class="default-form mailchimp">--}}
                {{--                                    <div class="form-group">--}}
                {{--                                        <input type="email" class="bg-white mb-3" name="email" id="mc-email"--}}
                {{--                                               placeholder="@lang('web.web_contact.your_email')"--}}
                {{--                                               autocomplete="off" required>--}}
                {{--                                        <label for="mc-email"></label>--}}
                {{--                                        <button type="submit" class="theme-btn btn-style-one call-modal"--}}
                {{--                                                id="btnLetterSave"--}}
                {{--                                                data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing...">{{ __('web.common.submit') }}</button>--}}
                {{--                                    </div>--}}
                {{--                                </form>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}


                <div class="footer-column col-lg-4 col-md-12">
                    <div class="footer-widget">
                        <h4 class="widget-title">{{ __('web.footer.newsletter') }}</h4>
                        <div class="widget-content">
                            <div class="newsletter-form">
                                <div class="text">{{ __('web.footer.newsletter_text') }}</div>
                                <form id="newsLetterForm" class="mailchimp">
                                    <div class="form-group">
                                        <div class="response"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="mc-email" class="email"
                                               placeholder="Enter Your Mail" autocomplete="off"
                                               required>
                                        <button id="btnLetterSave" title="Subscribe"
                                                class="theme-btn">
                                            <i class="flaticon-envelope"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Bottom-->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="outer-box">
                <div class="copyright-text">&copy;{{ date('Y') }} <a href="{{ getSettingValue('company_url') }}">{{ html_entity_decode($settings['application_name']) }}</a>. {{ __('web.footer.all_rights_reserved') }}.</div>
                <!-- Start of Social Media Buttons -->
                <div class="social-links">
                    @if(!empty($settings['facebook_url']))
                        <a href="{{ $settings['facebook_url'] }}"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(!empty($settings['twitter_url']))
                         <a href="{{ $settings['twitter_url'] }}"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if(!empty($settings['google_plus_url']))
                            <a href="{{ $settings['google_plus_url'] }}"><i class="fab fa-google-plus-square"></i></a>
                                            @endif
                    @if(!empty($settings['linkedIn_url']))
                        <a href="{{ $settings['linkedIn_url']}}"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    @include('cookieConsent::index')
</footer>
<!-- End Main Footer -->
