<div class="row mt-3">
    <div class="form-group col-sm-4">
        {{ Form::label('home_title', __('About Title One').':') }}<span
                class="text-danger">*</span>
        {{ Form::text('about_title_one', $cmsServices['about_title_one'], ['class' => 'form-control', 'required', 'onkeypress' => 'return avoidSpace(event);']) }}
    </div>
    <div class="form-group col-sm-4">
        {{ Form::label('home_title', __('About Title Two').':') }}<span
                class="text-danger">*</span>
        {{ Form::text('about_title_two', $cmsServices['about_title_two'], ['class' => 'form-control', 'required', 'required', 'onkeypress' => 'return avoidSpace(event);']) }}
    </div>
    <div class="form-group col-sm-4">
        {{ Form::label('home_title_three', __('About Title Three').':') }}<span
                class="text-danger">*</span>
        {{ Form::text('about_title_three', $cmsServices['about_title_three'], ['class' => 'form-control', 'required', 'required', 'onkeypress' => 'return avoidSpace(event);']) }}
    </div>
    
    <div class="form-group col-sm-4 my-0">
        {{ Form::label('about_description_title', __('About description One').':') }}<span
                class="text-danger">*</span>
        {{ Form::textarea('about_description_one', $cmsServices['about_description_one'], ['class' => 'form-control h-75', 'required', 'required', 'onkeypress' => 'return avoidSpace(event);']) }}
    </div>
    <div class="form-group col-sm-4 my-0">
        {{ Form::label('about_description_title', __('About description Two').':') }}<span
                class="text-danger">*</span>
        {{ Form::textarea('about_description_two', $cmsServices['about_description_two'], ['class' => 'form-control h-75', 'required', 'required', 'onkeypress' => 'return avoidSpace(event);']) }}
    </div>
    <div class="form-group col-sm-4 my-0">
        {{ Form::label('about_description_three', __('About description Three').':') }}<span
                class="text-danger">*</span>
        {{ Form::textarea('about_description_three', $cmsServices['about_description_three'], ['class' => 'form-control h-75', 'required', 'required', 'onkeypress' => 'return avoidSpace(event);']) }}
    </div>
</div>
<div class="row">
    <!-- Logo Field -->
    <div class="form-group col-sm-4">
        <div class="row">
            <div class="px-3">
                {{ Form::label('home_banner', __('About Image One').':') }}<span class="text-danger">*</span>
                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" data-toggle="tooltip"
                   data-placement="top" title="Upload 90 x 60 logo to get best user experience."></i>
                <label class="image__file-upload"> {{ __('messages.cms_service.choose') }}
                    {{ Form::file('about_image_one',['id'=>'aboutImageOne','class' => 'd-none']) }}
                </label>
            </div>
            <div class="w-auto pl-3 mt-1">
                <img id='aboutImagePreviewOne' class="img-thumbnail thumbnail-preview"
                     src="{{($cmsServices['about_image_one']) ? asset($cmsServices['about_image_one']) : asset('web_front/images/resource/work-1.png')}}">
            </div>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="row">
            <div class="px-3">
                {{ Form::label('home_banner', __('About Image Two').':') }}<span class="text-danger">*</span>
                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" data-toggle="tooltip"
                   data-placement="top" title="Upload 90 x 60 logo to get best user experience."></i>
                <label class="image__file-upload"> {{ __('messages.cms_service.choose') }}
                    {{ Form::file('about_image_two',['id'=>'aboutImageTwo','class' => 'd-none']) }}
                </label>
            </div>
            <div class="w-auto pl-3 mt-1">
                <img id='aboutImagePreviewTwo' class="img-thumbnail thumbnail-preview"
                     src="{{($cmsServices['about_image_two']) ? asset($cmsServices['about_image_two']) : asset('web_front/images/resource/work-2.png')}}">
            </div>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="row">
            <div class="px-3">
                {{ Form::label('home_banner', __('About Image Three').':') }}<span class="text-danger">*</span>
                <i class="fas fa-question-circle ml-1 mt-1 general-question-mark" data-toggle="tooltip"
                   data-placement="top" title="Upload 90 x 60 logo to get best user experience."></i>
                <label class="image__file-upload"> {{ __('messages.cms_service.choose') }}
                    {{ Form::file('about_image_three',['id'=>'aboutImageThree','class' => 'd-none']) }}
                </label>
            </div>
            <div class="w-auto pl-3 mt-1">
                <img id='aboutImagePreviewThree' class="img-thumbnail thumbnail-preview"
                     src="{{($cmsServices['about_image_three']) ? asset($cmsServices['about_image_three']) : asset('web_front/images/resource/work-3.png')}}">
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

