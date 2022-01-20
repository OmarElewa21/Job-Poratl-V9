@extends('web.layouts.app')
@section('title')
    {{ __('web.contact_us') }}
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('web_front/css/header-span.css') }}">
@endsection
@section('content')
    <!-- =============== Start of Page Header 1 Section =============== -->
    {{--    <section class="page-header">--}}
    {{--        <div class="container">--}}
    {{--            <!-- Start of Page Title -->--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <h2>{{ __('web.contact_us') }}</h2>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <!-- End of Page Title -->--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <!-- =============== End of Page Header 1 Section =============== -->--}}

    {{--    <!-- ===== Start of Main Wrapper Section ===== -->--}}
    {{--    <section class="ptb80 bg-gray custom-ptb-60-30" id="contact">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row justify-content-md-center">--}}
    {{--                <div class="col-md-8 col-xs-12 col-md-offset-2">--}}
    {{--                    <!-- Start of Contact Form -->--}}
    {{--                    <form id="formContact" class="mt30" name="frm-contact" method="post"--}}
    {{--                          action="{{ route('send.contact.email') }}">--}}
    {{--                    @csrf--}}
    {{--                    @include('web.layouts.errors')--}}
    {{--                    @include('flash::message')--}}

    {{--                    <!-- Form Group -->--}}
    {{--                        <div class="form-group">--}}
    {{--                            <input class="form-control" type="text" name="name" value="{{ old('name') }}"--}}
    {{--                                   placeholder="Your Name" autocomplete="off" required>--}}
    {{--                        </div>--}}

    {{--                        <!-- Form Group -->--}}
    {{--                        <div class="form-group">--}}
    {{--                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}"--}}
    {{--                                   placeholder="your-email@cariera.com" autocomplete="off" required>--}}
    {{--                        </div>--}}

    {{--                        <!-- Form Group -->--}}
    {{--                        <div class="form-group">--}}
    {{--                            <input class="form-control" type="tel" name="phone_no" value="{{ old('phone_no') }}"--}}
    {{--                                   placeholder="Phone Number" autocomplete="off" pattern="[789][0-9]{9}"--}}
    {{--                                   oninvalid="this.setCustomValidity('Phone No format is invalid')"--}}
    {{--                                   oninput="this.setCustomValidity('')"--}}
    {{--                                   onkeyup='if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")'--}}
    {{--                                   minlength="10" maxlength="12">--}}
    {{--                        </div>--}}

    {{--                        <!-- Form Group -->--}}
    {{--                        <div class="form-group">--}}
    {{--                            <input class="form-control" type="text" name="subject" value="{{ old('subject') }}"--}}
    {{--                                   placeholder="Subject" autocomplete="off" required>--}}
    {{--                        </div>--}}

    {{--                        <!-- Form Group -->--}}
    {{--                        <div class="form-group mb20">--}}
    {{--                            <textarea class="form-control" rows="5" name="message" placeholder="Type your message..."--}}
    {{--                                      required>{{ trim(old('message')) }}</textarea>--}}
    {{--                        </div>--}}
    {{--                        <!-- Form Group -->--}}
    {{--                        <div class="form-group mt10">--}}
    {{--                            <div class="g-recaptcha d-flex justify-content-center"--}}
    {{--                                 data-sitekey="{{ config('app.google_recaptcha_site_key') }}" name="g-recaptcha"></div>--}}
    {{--                            <div id="g-recaptcha-error"></div>--}}
    {{--                        </div>--}}

    {{--                        <!-- Form Group -->--}}
    {{--                        <div class="form-group text-center">--}}
    {{--                            <button class="btn btn-purple btn-effect"--}}
    {{--                                    type="submit">{{ __('web.contact_us_menu.send_message') }}</button>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                    <!-- End of Contact Form -->--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <!-- ===== End of Main Wrapper Section ===== -->--}}

    <!-- New Theme Starts -->
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>{{ __('web.contact_us') }}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('front.home') }}">{{ __('web.home') }}</a></li>
                    <li>{{ __('web.contact_us') }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Map Section -->
    {{--        <section class="map-section">--}}
    {{--            <div class="map-outer">--}}
    {{--                <div class="map-canvas"--}}
    {{--                     data-zoom="12"--}}
    {{--                     data-lat="-37.817085"--}}
    {{--                     data-lng="144.955631"--}}
    {{--                     data-type="roadmap"--}}
    {{--                     data-hue="#ffc400"--}}
    {{--                     data-title="Envato"--}}
    {{--                     data-icon-path="images/icons/contact-map-marker.png"--}}
    {{--                     data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </section>--}}
    <!-- End Map Section -->


    <!-- Contact Section -->
    <section class="contact-section">
        <div class="auto-container">
        {{--                <div class="upper-box">--}}
        {{--                    <div class="row">--}}
        {{--                        <div class="contact-block col-lg-4 col-md-6 col-sm-12">--}}
        {{--                            <div class="inner-box">--}}
        {{--                                <span class="icon"><img src="images/icons/placeholder.svg" alt=""></span>--}}
        {{--                                <h4>Address</h4>--}}
        {{--                                <p>329 Queensberry Street, North<br> Melbourne VIC 3051, Australia.</p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="contact-block col-lg-4 col-md-6 col-sm-12">--}}
        {{--                            <div class="inner-box">--}}
        {{--                                <span class="icon"><img src="images/icons/smartphone.svg" alt=""></span>--}}
        {{--                                <h4>Call Us</h4>--}}
        {{--                                <p><a href="#" class="phone">123 456 7890</a></p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="contact-block col-lg-4 col-md-6 col-sm-12">--}}
        {{--                            <div class="inner-box">--}}
        {{--                                <span class="icon"><img src="images/icons/letter.svg" alt=""></span>--}}
        {{--                                <h4>Email</h4>--}}
        {{--                                <p><a href="#">contact.london@example.com</a></p>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}


        <!-- Contact Form -->
            <div class="contact-form default-form">
                <h3>{{ __('web.web_contact.leave_a_message') }}</h3>
                <!--Contact Form-->
                <form id="formContact" class="mt30" name="frm-contact" method="post"
                      action="{{ route('send.contact.email') }}">
                    @csrf
                    @include('flash::message')
                    @include('web.layouts.errors')
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <div class="response"></div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label>{{ __('web.web_contact.your_name') }}</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                   placeholder="@lang('web.web_contact.your_name')" autocomplete="off" required>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label>{{ __('web.web_contact.your_email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}"
                                   placeholder="@lang('web.web_contact.your_email')" autocomplete="off" required>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label>{{ __('web.web_contact.subject') }}</label>
                            <input class="form-control" type="text" name="subject" value="{{ old('subject') }}"
                                   placeholder="@lang('web.web_contact.subject')" autocomplete="off" required>
                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <label>{{ __('web.web_contact.your_phone_no') }}</label>
                            <input class="form-control" type="tel" name="phone_no" value="{{ old('phone_no') }}"
                                   placeholder="@lang('web.web_contact.phone_number')" autocomplete="off"
                                   pattern="[789][0-9]{9}"
                                   oninvalid="this.setCustomValidity('Phone No format is invalid')"
                                   oninput="this.setCustomValidity('')"
                                   onkeyup='if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")'
                                   minlength="10" maxlength="12">
                        </div>
                        {{--                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">--}}
                        {{--                                <label>Subject</label>--}}
                        {{--                                <input type="text" name="subject" class="subject" placeholder="Subject *" required>--}}
                        {{--                            </div>--}}

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <label>{{ __('web.web_contact.your_message') }}</label>
                            <textarea class="form-control" rows="5" name="message"
                                      placeholder="@lang('web.web_contact.type_your_message')"
                                      required>{{ trim(old('message')) }}</textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group mt10 text-center">
                            <div class="g-recaptcha d-flex justify-content-center"
                                 data-sitekey="{{ config('app.google_recaptcha_site_key') }}" name="g-recaptcha"></div>
                            <div id="g-recaptcha-error"></div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group text-center">
                            <button class="theme-btn btn-style-one"
                                    type="submit">{{ __('web.contact_us_menu.send_message') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--End Contact Form -->
        </div>
    </section>
    <!-- Contact Section -->

    <!-- Call To Action -->
    {{--        <section class="call-to-action style-two">--}}
    {{--            <div class="auto-container">--}}
    {{--                <div class="outer-box">--}}
    {{--                    <div class="content-column">--}}
    {{--                        <div class="sec-title">--}}
    {{--                            <h2>Recruiting?</h2>--}}
    {{--                            <div class="text">Advertise your jobs to millions of monthly users and search 15.8 million<br> CVs in our database.</div>--}}
    {{--                            <a href="#" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Start Recruiting Now</span></a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                    <div class="image-column" style="background-image: url(images/resource/image-1.png);">--}}
    {{--                        <figure class="image"><img src="images/resource/image-1.png" alt=""></figure>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </section>--}}
    <!-- End Call To Action -->

@endsection

@section('page_scripts')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
