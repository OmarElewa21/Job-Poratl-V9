<div class="container">
    <!-- Start of Form -->
{{--    <div class="row mt30 w-75">--}}
{{--        <div class="col-md-offset-3 col-9 col-lg-8 job-seeker-search">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6 col-xs-12 mt10">--}}
{{--                    <input wire:model.debounce.100ms="searchByCandidate" type="text"--}}
{{--                           id="searchByCandidate"--}}
{{--                           placeholder="Search" class="form-control">--}}
{{--                </div>--}}
{{--                <div class="col-md-4 col-xs-6 mt10">--}}
{{--                    <select class="form-control" id="searchBy" wire:model="searchBy">--}}
{{--                        <option value="byJobTitle">By Job Title</option>--}}
{{--                        <option value="byName">By Name</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="col-md-2 col-xs-2 mt10">--}}
{{--                    <button type="button" wire:click="resetFilter()" class="btn btn-orange btn-effect" style="line-height: 37px;"--}}
{{--                            id="btnReset">{{ __('web.reset_filter') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Start of Row -->--}}
{{--    <div class="row mt30 w-75">--}}
{{--        <div class="col-3 col-lg-3">--}}
{{--            <div class="sidebar-widget">--}}
{{--                <div class="range-inputs">--}}
{{--                    <input class="form-control search-by-location" type="text" placeholder="Search By Location"--}}
{{--                           name="min"--}}
{{--                           wire:model="location">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="sidebar-widget mt20">--}}
{{--                <h3>{{ __('messages.candidate.expected_salary') }}</h3>--}}
{{--                <div class="range-widget">--}}
{{--                    <div class="range-inputs">--}}
{{--                        <input type="text" placeholder="Min" name="min" wire:model="min">--}}
{{--                        <input type="text" placeholder="Max" name="max" wire:model="max">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <small>{{ __('messages.candidate.salary_per_month') }}</small>--}}
{{--            </div>--}}
{{--            <div class="sidebar-widget mt30">--}}
{{--                <h3>{{ __('messages.candidate.gender') }}</h3>--}}
{{--                <div class="radio ml20">--}}
{{--                    <input class="with-gap" type="radio" name="gender" id="All" value="all" --}}
{{--                           wire:click="changeFilter('gender','all')" wire:model="gender">--}}
{{--                    <label for="All"><span class="radio-label"></span>{{ __('messages.common.all') }}</label>--}}
{{--                </div>--}}
{{--                <div class="radio ml20">--}}
{{--                    <input class="with-gap" type="radio" name="gender" id="Male" value="male" --}}
{{--                           wire:click="changeFilter('gender','male')" wire:model="gender">--}}
{{--                    <label for="Male"><span class="radio-label"></span>{{ __('messages.common.male') }}</label>--}}
{{--                </div>--}}
{{--                <div class="radio ml20">--}}
{{--                    <input class="with-gap" type="radio" name="gender" id="Female" value="female" --}}
{{--                           wire:click="changeFilter('gender','female')" wire:model="gender">--}}
{{--                    <label for="Female"><span class="radio-label"></span>{{ __('messages.common.female') }}</label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Start of Candidate Main -->--}}

{{--        <div class="col-9 col-lg-8 candidate-main">--}}

{{--            <div wire:loading wire:loading.class="col-md-12 text-center  font-weight-blod proceesing">--}}
{{--                {{ __('web.company_details.processing') }}--}}
{{--            </div>--}}
{{--            <!-- Start of Candidates Wrapper -->--}}
{{--            <div class="candidate-wrapper">--}}

{{--                <!-- ===== Start of Single Candidate 1 ===== -->--}}
{{--                <div class="row mt10">--}}
{{--                    @forelse($candidates as $candidate)--}}
{{--                        <div class="single-candidate  col-md-6 col-xs-12 mb20 ">--}}
{{--                            <div class="d-flex">--}}
{{--                                <!-- Candidate Image -->--}}
{{--                                <div class="candidate-img">--}}
{{--                                    <a href="{{ route('front.candidate.details',$candidate->unique_id) }}">--}}
{{--                                        <img src="{{ $candidate->candidate_url }}" class="img-responsive" alt="">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <!-- Start of Candidate Name & Info -->--}}
{{--                                <div class="pl-1">--}}
{{--                                    <!-- Candidate Name -->--}}
{{--                                    <div class="candidate-name">--}}
{{--                                        <a href="{{ route('front.candidate.details',$candidate->unique_id) }}" class="hover-color">--}}
{{--                                            <h5>{{ html_entity_decode($candidate->user->full_name) }}</h5></a>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <span>--}}
{{--                                            @if(!empty($candidate->expected_salary))--}}
{{--                                                <i class="fa fa-money"></i> {{ $candidate->expected_salary }}--}}
{{--                                            @endif--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <span>--}}
{{--                                            @if($candidate->full_location != 'N/A' &&  !empty($candidate->full_location))--}}
{{--                                                <i class="fa fa-map-marker"></i> {{ Str::limit($candidate->full_location,25,'..') }}--}}
{{--                                            @endif--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                         <span>--}}
{{--                                        @if(!empty($candidate->industry))--}}
{{--                                                 <i class="fa fa-briefcase"></i> {{ $candidate->industry->name }}--}}
{{--                                             @endif--}}
{{--                                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- End of Candidate Name & Info -->--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    @empty--}}
{{--                        <div class="col-md-12">--}}
{{--                            <h5 class="text-black text-center">{{ __('web.candidates_menu.no_candidates_found') }}</h5>--}}
{{--                        </div>--}}
{{--                    @endforelse--}}
{{--                </div>--}}


{{--                <!-- ===== End of Single Candidate 1 ===== -->--}}

{{--            </div>--}}
{{--            @if($candidates->count() > 0)--}}
{{--                {{$candidates->links()}}--}}
{{--            @endif--}}
{{--        </div>--}}

{{--        <!-- End of Candidate Main -->--}}

{{--    </div>--}}


<!-- Listing Section -->
    <section class="ls-section">
        <div class="auto-container p-0">
            <div class="filters-backdrop"></div>
            <div class="row">
                <!-- Filters Column -->
                <div class="filters-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="filters-outer">
                            <button type="button" class="theme-btn close-filters">X</button>
                        {{----}}
                        <!-- Filter Block -->
                            <div class="filter-block d-flex justify-content-between">
                                <div>
                                    <h4>{{ __('web.web_jobs.search_by_keywords') }}</h4>
                                </div>
                                <div><button wire:click="resetFilter()" class="theme-btn small btn-style-eight"
                                             id="btnReset">{{ __('web.reset_filter') }}</button>
                                </div>
                            </div>
                            <div class="filter-block">
                                <div class="form-group">
                                    <input wire:model.debounce.100ms="searchByCandidate" type="search"
                                           id="searchByCandidate" autocomplete="off"
                                           placeholder="@lang('web.common.search')" class="form-control">
                                    <span class="icon flaticon-search-3"></span>
                                </div>
                            </div>

                            <!-- Filter Block -->
                            <div class="filter-block">
                                <h4>{{ __('web.common.location') }}</h4>
                                <div class="form-group">
                                    <input class="form-control search-by-location" type="search" autocomplete="off"
                                           placeholder="@lang('web.web_jobSeeker.search_by_location')"
                                           name="min" wire:model="location">
                                    <span class="icon flaticon-map-locator"></span>
                                </div>
                            </div>

                        {{--                            <!-- Filter Block -->--}}
                        {{--                            <div class="filter-block">--}}
                        {{--                                <h4>{{ __('web.web_jobSeeker.search_by_job_title_name') }}</h4>--}}
                        {{--                                <div class="form-group">--}}
                        {{--                                    <select class="chosen-select" id="searchBy" wire:model="searchBy">--}}
                        {{--                                        <option value="byName">{{ __('web.web_jobSeeker.by_name') }}</option>--}}
                        {{--                                        <option value="byJobTitle">{{ __('web.web_jobSeeker.by_job_title') }}</option>--}}
                        {{--                                    </select>--}}
                        {{--                                    <span class="icon flaticon-briefcase"></span>--}}

                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        <!-- Filter Block -->
                            <div class="filter-block">
                                <h4>{{ __('messages.candidate.expected_salary') }}</h4>
                                <div class="form-group">
                                    <input type="text" placeholder="Min" name="min" wire:model="min" autocomplete="off">
                                    <span class="icon"><i class="fas fa-dollar-sign dollar-color"></i></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="mt-2" placeholder="Max" name="max" wire:model="max"
                                           autocomplete="off">
                                    <span class="icon"><i class="fas fa-dollar-sign dollar-color"></i></span>
                                </div>
                                <small>{{ __('messages.candidate.salary_per_month') }}</small>
                            </div>

                            {{--                            <!-- Checkboxes Ouer -->--}}
                            <div class="form-group">
                                <h4>{{ __('messages.candidate.gender') }}</h4>
                                <ul>
                                    <li>
                                        <input type="radio" name="gender" id="All" value="all"
                                               wire:click="changeFilter('gender','all')" wire:model="gender">
                                        <label for="All"><span
                                                    class="radio-label"></span>{{ __('messages.common.all') }}</label>
                                    </li>
                                    <li>
                                        <input class="with-gap" type="radio" name="gender" id="Male" value="male"
                                               wire:click="changeFilter('gender','male')" wire:model="gender">
                                        <label for="Male"><span
                                                    class="radio-label"></span>{{ __('messages.common.male') }}</label>
                                    </li>
                                    <li>
                                        <input class="with-gap" type="radio" name="gender" id="Female" value="female"
                                               wire:click="changeFilter('gender','female')" wire:model="gender">
                                        <label for="Female"><span
                                                    class="radio-label"></span>{{ __('messages.common.female') }}
                                        </label>
                                    </li>
                                </ul>
                            </div>

                            {{--                            <!-- Checkboxes Ouer -->--}}
                            {{--                            <div class="checkbox-outer">--}}
                            {{--                                <h4>Experience</h4>--}}
                            {{--                                <ul class="checkboxes">--}}
                            {{--                                    <li>--}}
                            {{--                                        <input id="check-f" type="checkbox" name="check">--}}
                            {{--                                        <label for="check-f">0-2 Years</label>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li>--}}
                            {{--                                        <input id="check-g" type="checkbox" name="check">--}}
                            {{--                                        <label for="check-g">10-12 Years</label>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li>--}}
                            {{--                                        <input id="check-h" type="checkbox" name="check">--}}
                            {{--                                        <label for="check-h">12-16 Years</label>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li>--}}
                            {{--                                        <input id="check-i" type="checkbox" name="check">--}}
                            {{--                                        <label for="check-i">16-20 Years</label>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li>--}}
                            {{--                                        <input id="check-j" type="checkbox" name="check">--}}
                            {{--                                        <label for="check-j">20-25 Years</label>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li>--}}
                            {{--                                        <button class="view-more"><span class="icon flaticon-plus"></span> View More</button>--}}
                            {{--                                    </li>--}}
                            {{--                                </ul>--}}
                            {{--                            </div>--}}

                        <!-- Checkboxes Ouer -->
                            {{--                            <div class="checkbox-outer">--}}
                            {{--                                <h4>Education Levels</h4>--}}
                            {{--                                <ul class="checkboxes">--}}
                            {{--                                    <li>--}}
                            {{--                                        <input id="check-2" type="checkbox" name="check">--}}
                            {{--                                        <label for="check-2">Certificate</label>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li>--}}
                            {{--                                        <input id="check-3" type="checkbox" name="check">--}}
                            {{--                                        <label for="check-3">Diploma</label>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li>--}}
                            {{--                                        <input id="check-4" type="checkbox" name="check">--}}
                            {{--                                        <label for="check-4">Associate Degree</label>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li>--}}
                            {{--                                        <input id="check-5" type="checkbox" name="check">--}}
                            {{--                                        <label for="check-5">Bachelor Degree</label>--}}
                            {{--                                    </li>--}}
                            {{--                                    <li>--}}
                            {{--                                        <input id="check-6" type="checkbox" name="check">--}}
                            {{--                                        <label for="check-6">Master’s Degree</label>--}}
                            {{--                                    </li>--}}
                            {{--                                </ul>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>


                <!-- Content Column -->
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="ls-outer">
                        <button type="button" class="theme-btn btn-style-two toggle-filters">Show Filters</button>
                        {{--                        <div wire:loading wire:loading.class="col-md-12 text-center font-weight-bold proceesing">--}}
                        {{--                            {{ __('web.company_details.processing') }}--}}
                        {{--                        </div>--}}

                        <div class="row">
                            <!-- Candidate block Four -->
                            @forelse($candidates as $candidate)
                                <div class="candidate-block-four col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        {{--                                        <ul class="job-other-info">--}}
                                        {{--                                            <button class="bookmark-btn"><i class="fas fa-bookmark featured"></i>--}}
                                        {{--                                            </button>--}}
                                        {{--                                        </ul>--}}
                                        <span class="thumb">
                                        <a href="{{ route('front.candidate.details',$candidate->unique_id) }}">
                                    <img src="{{ $candidate->candidate_url }}" class="img-responsive" alt="">
                                </a>
                                    </span>
                                        <h3 class="name">
                                            <a href="{{ route('front.candidate.details',$candidate->unique_id) }}"
                                               class="hover-color">
                                                <h5>{{ html_entity_decode($candidate->user->full_name) }}</h5></a>
                                        </h3>
                                        <span class="cat"> 
                                        @if(!empty($candidate->industry))
                                                <i class="fa fa-briefcase"></i> {{ $candidate->industry->name }}
                                            @endif
                                    </span>
                                        <ul class="job-info">
                                            <li>
                                                <span class="icon flaticon-map-locator"></span> @if($candidate->full_location != 'N/A' &&  !empty($candidate->full_location))
                                                   </i> {{ Str::limit($candidate->full_location,25,'..') }}
                                                @else
                                                    <span>Location not added</span>
                                                @endif</li>
                                            <li><span>
                                        @if(!empty($candidate->expected_salary))
                                                        <span class="icon flaticon-money"></span> </i> {{ $candidate->expected_salary }}
                                                    @endif
                                    </span></li>
                                        </ul>
                                        {{--                                    <ul class="post-tags">--}}
                                        {{--                                        <li><a href="#">App</a></li>--}}
                                        {{--                                        <li><a href="#">Design</a></li>--}}
                                        {{--                                        <li><a href="#">Digital</a></li>--}}
                                        {{--                                    </ul>--}}
                                        <a href="{{ route('front.candidate.details',$candidate->unique_id) }}"
                                           class="theme-btn btn-style-three">{{ __('web.web_jobSeeker.view_profile') }}</a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12">
                                    <h5 class="text-black text-center">{{ __('web.candidates_menu.no_candidates_found') }}</h5>
                                </div>
                            @endforelse
                        </div>

                    @if($candidates->count() > 0)
                        {{$candidates->links()}}
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
