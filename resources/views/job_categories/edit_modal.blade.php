<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.job_category.edit_job_category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['id' => 'editForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none" id="editValidationErrorsBox"></div>
                {{ Form::hidden('jobCategoryId',null,['id'=>'jobCategoryId']) }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        {{ Form::label('name',__('messages.job_category.name').':') }}<span class="text-danger">*</span>
                        {{ Form::text('name', null, ['class' => 'form-control','required','id' => 'editName' ]) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('description',__('messages.job_category.description').':') }}
                        {{ Form::textarea('description', null, ['class' => 'form-control','id' => 'editDescription', 'rows' => '5']) }}
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="row">
                            <div class="pl-3">
                                {{ Form::label('category_image', __('messages.common.category_image').':') }}
                                <label class="image__file-upload"> {{ __('messages.setting.choose') }}
                                    {{ Form::file('customer_image',['id'=>'editCustomerImage','class' => 'd-none']) }}
                                </label>
                            </div>
                            <div class="w-auto pl-3 mt-1">
                                <img id='editPreviewImage' class="img-thumbnail thumbnail-preview"
                                     src=""/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-4 mb-0 pt-1">
                        <label>{{ __('messages.job_category.is_featured').':' }}</label>
                        <label class="custom-switch pl-0 col-12">
                            <input type="checkbox" name="is_featured" class="custom-switch-input"
                                   value="1" id="editIsFeatured">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                </div>
                <div class="text-right">
                    {{ Form::button(__('messages.common.save'), ['type'=>'submit','class' => 'btn btn-primary','id'=>'btnEditSave','data-loading-text'=>"<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" id="btnEditCancel" class="btn btn-light ml-1"
                            data-dismiss="modal">{{ __('messages.common.cancel') }}
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
