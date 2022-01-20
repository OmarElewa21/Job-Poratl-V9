<aside class="sidebar">
    <div class="sidebar-widget">
        <div class="widget-content">
            <ul class="job-overview">
                <li>
                    <i class="icon icon-calendar"></i>
                    <h5>Experience:</h5>
                    <span>{{ $candidateDetails->experience }} Years</span>
                </li>
                @if($candidateDetails->user->dob)
                    <li>
                        <i class="icon icon-expiry"></i>
                        <h5>Age:</h5>
                        <span>{{ \Carbon\Carbon::parse($candidateDetails->user->dob)->age }} Years</span>
                    </li>
                @endif
                <li>
                    <i class="icon icon-rate"></i>
                    <h5>Current Salary:</h5>
                    <span>{{ $candidateDetails->current_salary }}</span>
                </li>

                <li>
                    <i class="icon icon-salary"></i>
                    <h5>Expected Salary:</h5>
                    <span>{{ $candidateDetails->expected_salary }}</span>
                </li>

                <li>
                    <i class="icon icon-user-2"></i>
                    <h5>Gender:</h5>
                    @if($candidateDetails->user->gender == 0)
                        <span>Male</span>
                    @else
                        <span>Female</span>
                    @endif
                </li>

                {{--                <li>--}}
                {{--                    <i class="icon icon-language"></i>--}}
                {{--                    <h5>Language:</h5>--}}
                {{--                    <span>English</span>--}}
                {{--                </li>--}}

                {{--                <li>--}}
                {{--                    <i class="icon icon-degree"></i>--}}
                {{--                    <h5>Education Level:</h5>--}}
                {{--                    <span>Master Degree</span>--}}
                {{--                </li>--}}

            </ul>
        </div>
    </div>

    @if(! empty($candidateDetails->user->facebook_url) || ! empty($candidateDetails->user->twitter_url) || ! empty($candidateDetails->user->google_plus_url) || ! empty($candidateDetails->user->pinterest_url) || ! empty($candidateDetails->user->linkedin_url))
        <div class="sidebar-widget social-media-widget">
            <h4 class="widget-title">Social media</h4>
            <div class="widget-content">
                <div class="social-links">
                    @if(! empty($candidateDetails->user->facebook_url))
                        <a href="{{ (isset($candidateDetails->user->facebook_url)) ? $candidateDetails->user->facebook_url : 'javascript:void(0)' }}"><i
                                    class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(! empty($candidateDetails->user->twitter_url))
                        <a href="{{ (isset($candidateDetails->user->twitter_url)) ? $candidateDetails->user->twitter_url : 'javascript:void(0)' }}"><i
                                    class="fab fa-twitter"></i></a>
                    @endif
                    @if(! empty($candidateDetails->user->google_plus_url))
                        <a href="{{ (isset($candidateDetails->user->google_plus_url)) ? $candidateDetails->user->google_plus_url : 'javascript:void(0)' }}"><i
                                    class="fab fa-google-plus-g"></i></a>
                    @endif
                    @if(! empty($candidateDetails->user->pinterest_url))
                        <a href="{{ (isset($candidateDetails->user->pinterest_url)) ? $candidateDetails->user->pinterest_url : 'javascript:void(0)' }}"><i
                                    class="fab fa-pinterest-p"></i></a>
                    @endif
                    @if(! empty($candidateDetails->user->linkedin_url))
                        <a href="{{ (isset($candidateDetails->user->linkedin_url)) ? $candidateDetails->user->linkedin_url : 'javascript:void(0)' }}"><i
                                    class="fab fa-linkedin-in"></i></a>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <div class="sidebar-widget">
        <!-- Job Skills -->
        <h4 class="widget-title">Professional Skills</h4>
        <div class="widget-content">
            <ul class="job-skills">
                @if($candidateDetails->user->candidateSkill->count())
                    @foreach($candidateDetails->user->candidateSkill as $candidateSkill)
                        <li><a href="#">{{ html_entity_decode($candidateSkill->name) }}</a></li>
                    @endforeach
                @else
                    <h4 class="text-center">{{ __('messages.skill.no_skill_available') }}</h4>
                @endif
            </ul>
        </div>
    </div>

    
    {{--                            <div class="sidebar-widget contact-widget">--}}
    {{--                                <h4 class="widget-title">Contact Us</h4>--}}
    {{--                                <div class="widget-content">--}}
    {{--                                    <!-- Comment Form -->--}}
    {{--                                    <div class="default-form">--}}
    {{--                                        <!--Comment Form-->--}}
    {{--                                        <form>--}}
    {{--                                            <div class="row clearfix">--}}
    {{--                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">--}}
    {{--                                                    <input type="text" name="username" placeholder="Your Name" required>--}}
    {{--                                                </div>--}}
    {{--                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">--}}
    {{--                                                    <input type="email" name="email" placeholder="Email Address" required>--}}
    {{--                                                </div>--}}
    {{--                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">--}}
    {{--                                                    <textarea class="darma" name="message" placeholder="Message"></textarea>--}}
    {{--                                                </div>--}}
    {{--                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">--}}
    {{--                                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form">Send Message</button>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        </form>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
</aside>
