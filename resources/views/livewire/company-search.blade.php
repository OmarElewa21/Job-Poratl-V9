{{--<section class="ptb40 bg-gray">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-10">--}}
{{--                <input wire:model.debounce.100ms="searchByCompany" type="text" id="searchByCompany"--}}
{{--                       placeholder="Search Company" class="form-control">--}}
{{--            </div>--}}
{{--            <div class="col-md-2">--}}
{{--                <button type="button" wire:click="resetFilter()" class="btn btn-orange btn-effect" style="line-height: 37px;"--}}
{{--                        id="btnReset">{{ __('web.reset_filter') }}</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div id="company_search" class="job-post-wrapper mt10">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div wire:loading wire:loading.class="col-md-12 text-center  font-weight-blod proceesing">--}}
{{--                        {{ __('web.company_details.processing') }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @forelse($companies as $company)--}}
{{--                    @include('web.common.company_card')--}}
{{--                @empty--}}
{{--                    <div class="col-md-12">--}}
{{--                        <h5 class="text-black text-center">{{ __('web.companies_menu.no_company_found') }}</h5>--}}
{{--                    </div>--}}
{{--                @endforelse--}}
{{--            </div>--}}

{{--            @if($companies->count() > 0)--}}
{{--                {{$companies->links()}}--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<div>
    <section class="page-title style-two">
        <div class="auto-container">
            <!-- Job Search Form -->
            <div class="job-search-form">
                <form>
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                            <span class="icon flaticon-search-1"></span>
                            <input wire:model.debounce.100ms="searchByCompany" type="search"
                                   autocomplete="off" id="searchByCompany"
                                   placeholder="@lang('web.web_company.search_company')">
                        </div>
                        <div class="form-group col-lg-3 col-md-12 col-sm-12 location">
                            <span class="icon flaticon-map-locator"></span>
                            <input wire:model.debounce.100ms="searchByCity" id="searchByCity"
                                   placeholder="@lang('web.web_company.search_city')">
                        </div>
                        <div class="form-group chosen-search col-lg-3 col-md-12 col-sm-12">
                            <span class="icon flaticon-briefcase"></span>
                            <input wire:model.debounce.100ms="searchByIndustry" id="searchByIndustry"
                                   placeholder="@lang('web.web_company.search_by_industry')">
                        </div>
                        <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
                            <button type="button" wire:click="resetFilter()" class="theme-btn btn-style-one"
                                    id="btnReset">{{ __('web.reset_filter') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Job Search Form -->
        </div>
    </section>
    <section class="ls-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>

            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-lg-12">
                    <div class="ls-outer">
                        <div class="row">
                            <!-- Job Block -->
                            @forelse($companies as $company)
                                @include('web.common.company_card')
                            @empty
                                <div class="col-md-12">
                                    <h5 class="text-black text-center">{{ __('web.companies_menu.no_company_found') }}</h5>
                                </div>
                            @endforelse
                        </div>

                        <!-- Pagination -->
                        @if($companies->count() > 0)
                            {{$companies->links()}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
