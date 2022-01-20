{{--<div class="col-md-6 mt30 {{ ($loop->last && $loop->iteration % 2 != 0) ? 'col-md-offset-3' : '' }}">--}}
{{--    <div class="single-job-post row nomargin container-shadow">--}}
{{--        <div class="col-md-2 col-xs-3 nopadding">--}}
{{--            <img src="{{ $company->company_url }}" class="jobs-company-logo" alt="company logo">--}}
{{--        </div>--}}
{{--        <div class="col-md-10 col-xs-6 pt5 nopadding-right ">--}}
{{--            <div class="job-title">--}}
{{--                <h6 class="text-dark"><a--}}
{{--                        href="{{ route('front.company.details', $company->unique_id) }}"--}}
{{--                        class="hover-color">{!! $company->user->first_name !!}</a>--}}
{{--                </h6>--}}
{{--            </div>--}}
{{--            <div class="job-info pt5  nopadding-right">--}}
{{--                @if(!empty($company->location))--}}
{{--                    <span class="location">--}}
{{--                        <i class="fa fa-map-marker"></i>--}}
{{--                        {{ (isset($company->location)) ? html_entity_decode(Str::limit($company->location,40,'...')) : __('messages.common.n/a') }}--}}
{{--                    </span>--}}
{{--                @endif--}}
{{--                <br>--}}
{{--                @if(!empty($company->location2))--}}
{{--                    <span class="location">--}}
{{--                        <i class="fa fa-map-marker"></i>--}}
{{--                        {{ (isset($company->location2)) ? html_entity_decode(Str::limit($company->location2,40,'...')) : __('messages.common.n/a') }}--}}
{{--                    </span>--}}
{{--                @endif--}}
{{--                <br>--}}
{{--                @if(!empty($company->website))--}}
{{--                    <span class="location websiteText">--}}
{{--                        <i class="fa fa-globe"></i>--}}
{{--                        {{ (isset($company->website)) ? Str::limit($company->website,40,'...') : __('messages.common.n/a') }}--}}
{{--                    </span>--}}
{{--                @endif--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        @if($company->activeFeatured)--}}
{{--            <img src="{{ asset('web/img/icons8-star-64.png') }}" class="featured-img"--}}
{{--                 data-toggle="tooltip" data-placement="bottom" title="Featured">--}}
{{--        @endif--}}

{{--        @if($company->jobs_count > 0)--}}
{{--            <span class="job-count pull-right">--}}
{{--                       {{ $company->jobs_count }} {{ __('web.companies_menu.opened_jobs') }}--}}
{{--            </span>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="job-block col-lg-6 col-md-12 col-sm-12">--}}
{{--    <div class="inner-box custom-inner-box">--}}
{{--        <div class="content">--}}
{{--            <span class="company-logo"><img class="custom-company-image" src="{{ $company->company_url }}" alt=""></span>--}}
{{--            <h4>--}}
{{--                <a href="{{ route('front.company.details', $company->unique_id) }}"--}}
{{--                   class="hover-color">{!! $company->user->first_name !!}</a></h4>--}}
{{--            <ul class="job-info">--}}
{{--                <li><span class="icon flaticon-briefcase"></span> {{$company->industry->name}}</li>--}}
{{--                @if(!empty($company->website))--}}
{{--                    <li><span class="icon flaticon-worldwide"></span>  {{ (isset($company->website)) ? Str::limit($company->website,40,'...') : __('messages.common.n/a') }}</span></li>--}}
{{--                    </span>--}}
{{--                @endif--}}
{{--                <li><span class="icon flaticon-clock-3"></span> {{$company->created_at->diffForHumans()}}</li>--}}
{{--                @if(!empty($company->location) || !empty($company->location2))--}}
{{--                    <li><span class="icon flaticon-map-locator"></span> {{ (isset($company->location)) ? html_entity_decode(Str::limit($company->location,40,'...')) : __('messages.common.n/a') }}, {{ (isset($company->location2)) ? html_entity_decode(Str::limit($company->location2,40,'...')) : __('messages.common.n/a') }}--}}
{{--                        </span></li>--}}
{{--                @endif<br>--}}
{{--                --}}{{--                                                <li><span class="icon flaticon-money"></span> $35k - $45k</li>--}}
{{--            </ul>--}}
{{--            <ul class="job-other-info">--}}
{{--                @if($company->jobs_count > 0)--}}
{{--                    <li class="time"> {{ $company->jobs_count }} {{ __('web.companies_menu.opened_jobs') }}</li>@endif--}}
{{--                --}}{{--                                                <li class="time">Full Time</li>--}}
{{--                --}}{{--                                                <li class="privacy">Private</li>--}}
{{--                --}}{{--                                                <li class="required">Urgent</li>    --}}
{{--            </ul>--}}
{{--            @if($company->activeFeatured)--}}
{{--                <button class="bookmark-btn"><span class="flaticon-bookmark text-warning"></span></button>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}



<!-- Company Block Four -->
<div class="company-block-four col-xl-3 col-lg-6 col-md-6 col-sm-12">
    <div class="inner-box">
        @if($company->activeFeatured)
            <span><i class="fas fa-bookmark bookmark-class"></i></span>
        @endif
        <span class="company-logo"><img src="{{ $company->company_url }}" class="h-100 w-100 home-banner" alt=""></span>
        <h4>
            <a href="{{ route('front.company.details', $company->unique_id) }}"
               class="hover-color">{!! $company->user->first_name !!}</a>
        </h4>
        <ul class="job-info">
            @if(!empty($company->location) || !empty($company->location2))
                <li>
                    <span class="icon flaticon-map-locator"></span>
                    {{ (isset($company->location)) ? html_entity_decode(Str::limit($company->location,10,'...')) : __('messages.common.n/a') }}{{ (isset($company->location2)) ? ','.html_entity_decode(Str::limit($company->location2,10,'...')) : '' }}
                </li>
            @endif
        </ul>
        <ul class="job-info">
            <li><span class="icon flaticon-briefcase"></span> {{$company->industry->name}}</li>
        </ul>
        <div class="job-type"> {{ __('web.companies_menu.opened_jobs') }} - {{ $company->jobs_count }}</div>
    </div>
</div>

