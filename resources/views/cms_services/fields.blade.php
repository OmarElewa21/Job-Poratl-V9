<div class="row mt-3">
    <div class="form-group col-sm-6">
        {{ Form::label('home_title', __('messages.cms_service.home_title').':') }}<span
                class="text-danger">*</span>
        {{ Form::text('home_title', $cmsServices['home_title'], ['class' => 'form-control', '']) }}
    </div>
    <div class="form-group col-sm-12 my-0">
        {{ Form::label('home_description', __('messages.cms_service.home_description').':') }}<span
                class="text-danger">*</span>
        {{ Form::textarea('home_description', $cmsServices['home_description'], ['class' => 'form-control h-75', '']) }}
    </div>
</div>
<div class="row">
    <!-- Logo Field -->
    <div class="form-group col-sm-4">
        <div class="row">
            <div class="px-3">
                {{ Form::label('home_banner', __('messages.cms_service.home_banner').':') }}<span class="text-danger">*</span>
                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" data-toggle="tooltip"
                   data-placement="top" title="Upload 90 x 60 logo to get best user experience."></i>
                <label class="image__file-upload"> {{ __('messages.cms_service.choose') }}
                    {{ Form::file('home_banner',['id'=>'home_banner','class' => 'd-none']) }}
                </label>
            </div>
            <div class="w-auto pl-3 mt-1">
                <img id='homeBannerPreview' class="img-thumbnail thumbnail-preview"
                     src="{{($cmsServices['home_banner']) ? asset($cmsServices['home_banner']) : asset('web_front/images/resource/home_banner.png')}}">
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary']) }}
        <a href="" class="btn btn-secondary hover-text-dark text-dark">{{__('messages.common.cancel')}}</a>
    </div>
</div>

