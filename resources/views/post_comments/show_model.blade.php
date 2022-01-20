<div class="modal fade" tabindex="-1" role="dialog" id="showModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('messages.post_comment.post_comment_details') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['id' => 'showForm']) }}
            <div class="modal-body">
                <div class="row details-page">
                    <div class="form-group col-sm-12">
                        {{ Form::label('title',__('messages.post.post').':') }}<br>
                        <span id="postTitle"></span>
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('comment',__('messages.post.comment').':') }}<br>
                        <div class="reported-note">
                            <span id="postComment"></span>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('title',__('messages.user.user_name').':') }}<br>
                        <span id="postUser"></span>
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('title',__('messages.common.email').':') }}<br>
                        <span id="postEmail"></span>
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('title',__('messages.common.created_on').':') }}<br>
                        <span id="postCreatedOn"></span>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
