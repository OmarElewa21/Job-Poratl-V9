<!-- =============== Start of Header 1 Navigation =============== -->
{{--<header class="sticky">--}}
{{--    <nav class="navbar navbar-default navbar-static-top fluid_header centered container-shadow">--}}
{{--        <div class="container">--}}

{{--            <!-- Logo -->--}}
{{--            <div class="col-md-2 col-sm-6 col-xs-8 nopadding">--}}
{{--                <a class="navbar-brand nomargin" href="{{url('/')}}">--}}
{{--                    <img src="{{ asset($settings['logo']) }}" alt="logo">--}}
{{--                </a>--}}
{{--                <!-- INSERT YOUR LOGO HERE -->--}}
{{--            </div>--}}

{{--            <!-- ======== Start of Main Menu ======== -->--}}
{{--            <div class="col-md-10 col-sm-6 col-xs-4 nopadding">--}}
{{--                <div class="navbar-header page-scroll">--}}
{{--                    <button type="button" class="navbar-toggle toggle-menu menu-right push-body" data-toggle="collapse"--}}
{{--                            data-target="#main-nav" aria-expanded="false">--}}
{{--                        <span class="sr-only">{{ __('web.footer.toggle_navigation') }}</span>--}}
{{--                        <span class="icon-bar"></span>--}}
{{--                        <span class="icon-bar"></span>--}}
{{--                        <span class="icon-bar"></span>--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--                <!-- Start of Main Nav -->--}}
{{--                <div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="main-nav">--}}
{{--                    <ul class="nav navbar-nav pull-right main-width">--}}
{{--                        <!-- Mobile Menu Title -->--}}
{{--                        <li class="mobile-title">--}}
{{--                            <h4>{{ __('web.header.main_menu') }}</h4></li>--}}
{{--                        <li class="simple-menu {{ Request::is('/') ? 'active' : '' }}">--}}
{{--                            <a href="{{ route('front.home') }}" class="j-nav-item">{{ __('web.home') }}</a>--}}
{{--                        </li>--}}
{{--                        <li class="simple-menu {{ Request::is('search-jobs') ? 'active' : '' }}">--}}
{{--                            <a href="{{ route('front.search.jobs') }}" class="j-nav-item">{{ __('web.jobs') }}</a>--}}
{{--                        </li>--}}
{{--                        <li class="simple-menu {{ Request::is('company-lists') ? 'active' : '' }}">--}}
{{--                            <a href="{{ route('front.company.lists') }}"--}}
{{--                               class="j-nav-item">{{ __('web.companies') }}</a>--}}
{{--                        </li>--}}
{{--                        @auth--}}
{{--                            @role('Employer|Admin')--}}
{{--                            <li class="simple-menu {{ Request::is('candidate-lists') ? 'active' : '' }}">--}}
{{--                                <a href="{{ route('front.candidate.lists') }}"--}}
{{--                                   class="j-nav-item">{{ __('web.job_seekers') }}</a>--}}
{{--                            </li>--}}
{{--                            @endrole--}}
{{--                        @endauth--}}
{{--                        <li class="simple-menu {{ Request::is('about-us') ? 'active' : '' }}">--}}
{{--                            <a href="{{ route('front.about.us') }}" class="j-nav-item">{{ __('web.about_us') }}</a>--}}
{{--                        </li>--}}
{{--                        <li class="simple-menu {{ Request::is('contact-us') ? 'active' : '' }}">--}}
{{--                            <a href="{{ route('front.contact') }}" class="j-nav-item">{{ __('web.contact_us') }}</a>--}}
{{--                        </li>--}}
{{--                        <li class="simple-menu {{ Request::is('posts*') ? 'active' : '' }}">--}}
{{--                            <a href="{{ route('front.post.lists') }}"--}}
{{--                               class="j-nav-item">{{ __('messages.post.blog') }}</a>--}}
{{--                        </li>--}}
{{--                        @auth--}}
{{--                            <li class="dropdown simple-menu language-menu no-hover">--}}
{{--                                <a href="#" class="dropdown-toggle language-text current-language"--}}
{{--                                   data-toggle="dropdown" role="button">--}}
{{--                                    {{ getCurrentLanguageName() }}&nbsp;--}}
{{--                                    <span class="caret"></span>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu" role="menu">--}}
{{--                                    @foreach(getLanguages() as $key => $value)--}}
{{--                                        @if(checkLanguageSession() != $key)--}}
{{--                                            <li><a href="javascript:void(0)" class="languageSelection language-text"--}}
{{--                                                   data-prefix-value="{{ $key }}">{{ $value }}</a></li>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="dropdown simple-menu">--}}
{{--                                <a href="#" class="dropdown-toggle user-avatar hover-color" data-toggle="dropdown" role="button">--}}
{{--                                    <img src="{{ getLoggedInUser()->avatar }}"--}}
{{--                                         class="thumbnail-rounded front-thumbnail"/>&nbsp;&nbsp;--}}
{{--                                    <span class="d-sm-none d-lg-inline-block">--}}
{{--                                        Hi, {{getLoggedInUser()->full_name}}</span>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu" role="menu">--}}
{{--                                    <li class="userName"><span>{{ getLoggedInUser()->full_name }}</span></li>--}}
{{--                                    <li class="userMenu">--}}
{{--                                        <a href="{{ dashboardURL() }}" class="hover-color">{{ __('web.go_to_dashboard') }}</a>--}}
{{--                                    </li>--}}
{{--                                    @auth--}}
{{--                                        @role('Candidate')--}}
{{--                                        <li class="userMenu">--}}
{{--                                            <a href="{{ route('candidate.profile') }}" class="hover-color">{{ __('web.my_profile') }}</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="userMenu">--}}
{{--                                            <a href="{{ route('favourite.jobs') }}" class="hover-color">{{ __('messages.favourite_jobs') }}</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="userMenu">--}}
{{--                                            <a href="{{ route('favourite.companies') }}" class="hover-color">{{ __('messages.candidate_dashboard.followings') }}</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="userMenu">--}}
{{--                                            <a href="{{ route('candidate.applied.job') }}" class="hover-color">{{ __('messages.applied_job.applied_jobs') }}</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="userMenu">--}}
{{--                                            <a href="{{ route('candidate.job.alert') }}" class="hover-color">{{ __('messages.job.job_alert') }}</a>--}}
{{--                                        </li>--}}
{{--                                        @endrole--}}
{{--                                        @role('Employer')--}}
{{--                                        <li class="userMenu">--}}
{{--                                            <a href="{{ route('company.edit.form', \Illuminate\Support\Facades\Auth::user()->owner_id) }}" class="hover-color">{{ __('web.my_profile') }}</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="userMenu">--}}
{{--                                            <a href="{{ route('job.index') }}" class="hover-color">{{ __('messages.employer_menu.jobs') }}</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="userMenu">--}}
{{--                                            <a href="{{ route('followers.index') }}" class="hover-color">{{ __('messages.employer_menu.followers') }}</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="userMenu">--}}
{{--                                            <a href="{{ route('manage-subscription.index') }}" class="hover-color">{{ __('messages.employer_menu.manage_subscriptions') }}</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="userMenu">--}}
{{--                                            <a href="{{ route('transaction.index') }}" class="hover-color">{{ __('messages.employer_menu.transactions') }}</a>--}}
{{--                                        </li>--}}
{{--                                        @endrole--}}
{{--                                    @endauth--}}
{{--                                    <li>--}}
{{--                                        <a href="{{ url('logout') }}" class="hover-color"--}}
{{--                                           onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">--}}
{{--                                            {{ __('web.logout') }}--}}
{{--                                        </a>--}}
{{--                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"--}}
{{--                                              class="d-none">--}}
{{--                                            {{ csrf_field() }}--}}
{{--                                        </form>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        @else--}}
{{--                            <li class="dropdown simple-menu language-menu no-hover">--}}
{{--                                <a href="#" class="dropdown-toggle language-text current-language"--}}
{{--                                   data-toggle="dropdown" role="button" id="register">--}}
{{--                                    {{ __('web.register') }}--}}
{{--                                    <span class="caret"></span>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu" role="menu" id="dropdownRegister">--}}
{{--                                    <li><a href="{{ route('candidate.register') }}"--}}
{{--                                           class="language-text register-selection">--}}
{{--                                            {{ __('messages.notification_settings.candidate') }}</a>--}}
{{--                                    </li>--}}
{{--                                    <li><a href="{{ route('employer.register') }}"--}}
{{--                                           class="language-text register-selection">--}}
{{--                                            {{ __('messages.company.employer') }}</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="dropdown simple-menu language-menu no-hover">--}}
{{--                                <a href="#" class="dropdown-toggle language-text current-language"--}}
{{--                                   data-toggle="dropdown" role="button" id="language">--}}
{{--                                    {{ getCurrentLanguageName() }}&nbsp;--}}
{{--                                    <span class="caret"></span>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu" role="menu" id="dropdownLanguage">--}}
{{--                                    @foreach(getLanguages() as $key => $value)--}}
{{--                                        @if(checkLanguageSession() != $key)--}}
{{--                                            <li><a href="javascript:void(0)" class="languageSelection language-text"--}}
{{--                                                   data-prefix-value="{{ $key }}">{{ $value }}</a></li>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="dropdown simple-menu language-menu no-hover">--}}
{{--                                <a href="#" class="dropdown-toggle language-text current-language"--}}
{{--                                   data-toggle="dropdown" role="button" id="login">--}}
{{--                                    {{ __('web.login') }}--}}
{{--                                    <span class="caret"></span>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu" role="menu" id="dropdownLogin">--}}
{{--                                    <li><a href="{{ route('front.candidate.login') }}"--}}
{{--                                           class="language-text register-selection">--}}
{{--                                            {{ __('messages.notification_settings.candidate') }}</a>--}}
{{--                                    </li>--}}
{{--                                    <li><a href="{{ route('front.employee.login') }}"--}}
{{--                                           class="language-text register-selection">--}}
{{--                                            {{ __('messages.company.employer') }}</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        @endauth--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <!-- End of Main Nav -->--}}
{{--            </div>--}}
{{--            <!-- ======== End of Main Menu ======== -->--}}

{{--        </div>--}}
{{--    </nav>--}}
{{--</header>--}}
<!-- =============== End of Header 1 Navigation =============== -->


<!-- Main Header-->
<header class="main-header">
    <div class="container-fluid">
        <!-- Main box -->
        <div class="main-box">
            <!--Nav Outer -->
            <div class="nav-outer">
                <div class="logo-box">
                    <div class="logo" style="padding: 20px 0;"><a href="{{url('/')}}"><img class="custom-front-logo-img"
                                                              src="{{ asset($settings['logo']) }}" alt="" title=""></a>
                </div>
            </div>

            <nav class="nav main-menu">
                <ul class="navigation" id="navbar">
                    <li class="{{ Request::is('/') ? 'current' : '' }}">
                        <a href="{{ route('front.home') }}">{{ __('web.home') }}</a>
                    </li>
                    <li class="{{ Request::is('search-jobs') || Request::is('job-details*') ? 'current' : '' }}">
                        <a href="{{ route('front.search.jobs') }}" class="j-nav-item">{{ __('web.jobs') }}</a>
                    </li>
                    <li class="{{ Request::is('company-lists') || Request::is('company-details*') ? 'current' : '' }}">
                        <a href="{{ route('front.company.lists') }}">{{ __('web.companies') }}</a>
                    </li>
                    @auth
                        @role('Employer|Admin')
                        <li class="{{ Request::is('candidate-lists') || Request::is('candidate-details*') ? 'current' : '' }}">
                            <a href="{{ route('front.candidate.lists') }}">{{ __('web.job_seekers') }}</a>
                        </li>
                        @endrole
                    @endauth
                    <li class="{{ Request::is('about-us') ? 'current' : '' }}">
                        <a href="{{ route('front.about.us') }}">{{ __('web.about_us') }}</a>
                    </li>
                    <li class="{{ Request::is('contact-us') ? 'current' : '' }}">
                        <a href="{{ route('front.contact') }}">{{ __('web.contact_us') }}</a>
                    </li>
                    <li class="{{ Request::is('posts*') ? 'current' : '' }}">
                        <a href="{{ route('front.post.lists') }}" class="j-nav-item">{{ __('messages.post.blog') }}</a>
                    </li>
                        <li class="current dropdown mr-0 d-none" id="mobile-view">
                        <span><i class="fas fa-language mr-1 text-dark"></i> {{ getCurrentLanguageName() }}</span>
                        <ul id="dropdownLanguage">
                            @foreach(getLanguages() as $key => $value)
                                @foreach(\App\Models\User::LANGUAGES_IMAGE as $imageKey=> $imageValue)
                                    @if($imageKey == $key)
                                        @if(checkLanguageSession() != $key)
                                            <li class="dropdown"><a href="javascript:void(0)"
                                                                    class="languageSelection language-text"
                                                                    data-prefix-value="{{ $key }}">
                                                    <img class="rounded-1 ms-2 me-2 country_flag"
                                                         src="{{asset($imageValue)}}"/>
                                                    {{ $value }}
                                                </a></li>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </li>
                    @if(!Auth::check())
                        <li class="current dropdown mr-0 d-none" id="mobile-login">
                            <a href="{{route('front.candidate.login')}}"
                               class="theme-btn btn-style-three text-sm-left">{{ __('web.login') }}</a>
                            <ul>
                                <li>
                                    <a href="{{ route('front.candidate.login') }}"> {{ __('messages.notification_settings.candidate') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('front.employee.login') }}">  {{ __('messages.company.employer') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="current dropdown mr-0 d-none" id="mobile-register">
                            <a href="{{ route('candidate.register') }}"
                               class="theme-btn btn-style-one text-sm-left">{{ __('web.register') }}</a>
                            <ul>
                                <li>
                                    <a href="{{ route('candidate.register') }}"> {{ __('messages.notification_settings.candidate') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('employer.register') }}">  {{ __('messages.company.employer') }}</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="mm-add-listing">
                        @if(Auth::check())
                            <a href="{{ url('logout') }}"
                               nclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">{{ __('web.logout') }}</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                  class="d-none">
                                {{ csrf_field() }}
                            </form>
                        @endif
                    </li>
                    <li class="mm-add-listing dropdown mr-0">
                        <span><i class="fas fa-language mr-1 text-dark"></i> {{ getCurrentLanguageName() }}</span>
                        <ul id="dropdownLanguage">
                            @foreach(getLanguages() as $key => $value)
                                @foreach(\App\Models\User::LANGUAGES_IMAGE as $imageKey=> $imageValue)
                                    @if($imageKey == $key)
                                        @if(checkLanguageSession() != $key)
                                            <li class="dropdown"><a href="javascript:void(0)"
                                                                    class="languageSelection language-text upload-cv"
                                                                    data-prefix-value="{{ $key }}">
                                                    <img class="rounded-1 ms-2 me-2 country_flag"
                                                         src="{{asset($imageValue)}}"/>
                                                    {{ $value }}
                                                </a></li>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </li>
                    @if(!Auth::check())
                        <li class="mm-add-listing dropdown mr-0" id="mobile-login">
                            <span>{{ __('web.login') }}</span>
                            <ul>
                                <li class="dropdown">
                                    <a href="{{ route('front.candidate.login') }}"> {{ __('messages.notification_settings.candidate') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('front.employee.login') }}">  {{ __('messages.company.employer') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="mm-add-listing dropdown mr-0" id="mobile-register">
                            <span>{{ __('web.register') }}</span>
                            <ul>
                                <li>
                                    <a href="{{ route('candidate.register') }}"> {{ __('messages.notification_settings.candidate') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('employer.register') }}">  {{ __('messages.company.employer') }}</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </nav>
                <!-- Main Menu End-->
            </div>

            <div class="outer-box">
                <!-- Add Listing -->
                <nav class="nav main-menu">
                    <ul class="navigation" id="navbar">
                        <li class="current dropdown mr-0">
                        <span><i class="fas fa-language mr-1 text-dark"></i> {{ getCurrentLanguageName() }}</span>
                        <ul id="dropdownLanguage">
                            @foreach(getLanguages() as $key => $value)
                                @foreach(\App\Models\User::LANGUAGES_IMAGE as $imageKey=> $imageValue)
                                    @if($imageKey == $key)
                                        @if(checkLanguageSession() != $key)
                                            <li class="dropdown"><a href="javascript:void(0)"
                                                                    class="languageSelection language-text upload-cv"
                                                                    data-prefix-value="{{ $key }}">
                                                    <img class="rounded-1 ms-2 me-2 country_flag"
                                                         src="{{asset($imageValue)}}"/>
                                                    {{ $value }}
                                                </a></li>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- Login/Register -->
            <div class="btn-box">
                <nav class="nav main-menu">
                    <ul class="navigation" id="navbar">
                        @if(!Auth::check())
                            <li class="current dropdown mr-0">
                                <div class="btn-box">
                                    <a href="{{route('front.candidate.login')}}"
                                       class="theme-btn btn-style-three">{{ __('web.login') }}</a>
                                </div>
                                <ul>
                                    <li>
                                        <a href="{{ route('front.candidate.login') }}"> {{ __('messages.notification_settings.candidate') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.employee.login') }}">  {{ __('messages.company.employer') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="current dropdown mr-0">
                                <div class="btn-box">
                                    <a href="{{ route('candidate.register') }}"
                                       class="theme-btn btn-style-one">{{ __('web.register') }}</a>
                                </div>
                                <ul>
                                    <li>
                                        <a href="{{ route('candidate.register') }}"> {{ __('messages.notification_settings.candidate') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('employer.register') }}">  {{ __('messages.company.employer') }}</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="dropdown dashboard-option">

                                <a class="dropdown-toggle d-flex"  aria-expanded="false">
                                    <img src="{{ getLoggedInUser()->avatar }}" class="thumb home-banner"/>&nbsp;&nbsp;
                                    <span class="name">
                                                               {{ __('messages.common.hi') }}, {{getLoggedInUser()->full_name}}</span>
                                </a>
                                <ul id="dropdown-menu">
                                    <li>
                                        <a href="{{ dashboardURL() }}">{{ __('web.go_to_dashboard') }}</a>
                                    </li>
                                    @auth
                                        @role('Candidate')
                                        <li>
                                            <a href="{{ route('candidate.profile') }}">{{ __('web.my_profile') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('favourite.jobs') }}">{{ __('messages.favourite_jobs') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('favourite.companies') }}">{{ __('messages.candidate_dashboard.followings') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('candidate.applied.job') }}">{{ __('messages.applied_job.applied_jobs') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('candidate.job.alert') }}">{{ __('messages.job.job_alert') }}</a>
                                        </li>
                                        <li class="userMenu">
                                            <a href="{{ route('quizzes.pending') }}" class="hover-color">{{ __('messages.quizzes_title') }}</a>
                                        </li>
                                        @endrole
                                        @role('Employer')
                                        <li>
                                            <a href="{{ route('company.edit.form', \Illuminate\Support\Facades\Auth::user()->owner_id) }}"
                                               class="hover-color">{{ __('web.my_profile') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('job.index') }}">{{ __('messages.employer_menu.jobs') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('followers.index') }}">{{ __('messages.employer_menu.followers') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('manage-subscription.index') }}">{{ __('messages.employer_menu.manage_subscriptions') }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('transaction.index') }}">{{ __('messages.employer_menu.transactions') }}</a>
                                        </li>
                                        @endrole
                                    @endauth
                                    <li>
                                        <a href="{{ url('logout') }}" class="hover-color"
                                           onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                                            {{ __('web.logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                              class="d-none">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo"><a href="{{url('/')}}"><img src="{{asset($settings['logo'])}}" alt="" title=""></a></div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

            <div class="outer-box">
                <!-- Login/Register -->
                @if(!Auth::check())
                    <div class="login-box">
                        <a href="{{ route('front.candidate.login') }}"> <span class="icon-login"></span>
                        </a>
                    </div>
                    <div class="login-box">
                        <a href="{{ route('candidate.register') }}">
                            <span class="icon-user"></span>
                        </a>
                    </div>
                @endif
                @if(Auth::check())
                    <a href="{{ dashboardURL() }}">
                        <button id="toggle-user-sidebar"><img src="{{ getLoggedInUser()->avatar }}" alt="avatar"
                                                              class="thumb"></button>
                        @endif
                        <a href="#nav-mobile" class="mobile-nav-toggler"><span
                                    class="flaticon-menu-1"></span></a>
            </div>
        </div>
    </div>

        <!-- Mobile Nav -->
        <div id="nav-mobile"></div>
    </div>
</header>
<!--End Main Header -->
