<script id="blogCommentTemplate" type="text/x-jsrender">
                <!-- Comment -->
                <div class="comment">
                    <div class="user-thumb">
                            <img src="{{:image}}"
                                 alt="user-image">
                    </div>
                    <div class="comment-info">
                        <div class="user-name">{{:commentName}}
                          <?php if (getLoggedInUser()) { ?>
                                <ul class="option-list d-inline-flex">
                                    <li><a href="javascript:void(0)" title="<?php echo __('messages.common.edit') ?>"
                                           class="edit-comment-btn action-btn" data-id="{{:id}}">
                                            <button data-text="Edit Comment">
                                                <span class="la la-pencil"></span>
                                            </button>
                                        </a>
                                    </li>
                                    <li><a href="javascript:void(0)" title="<?php echo __('messages.common.delete') ?>"
                                           class="action-btn delete-comment-btn float-right"
                                           data-id="{{:id}}">
                                            <button data-text="Delete Comment">
                                                <span class="la la-trash"></span>
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                                <?php } ?>
                        </div>
                        <div class="title">{{:commentCreated}}</div>
                    </div>
                    <p id="comment-{{:id}}">{{:comment}}</p>
                </div>           

</script>
