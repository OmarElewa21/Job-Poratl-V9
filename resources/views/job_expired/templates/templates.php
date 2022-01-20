<script id="jobsExpired" type="text/x-jsrender">
   {{if !isJobClosed}}
   <a title="<?php echo __('messages.common.edit') ?>
  " class="btn mt-1 mb-1 btn-warning action-btn edit-btn" href="{{:url}}" data-placement="bottom">
            <i class="fa fa-edit"></i>
   </a>
{{/if}}
   <a title="<?php echo __('messages.common.delete') ?>
  " class="btn mt-1 mb-1 btn-danger action-btn delete-btn" data-id="{{:id}}" href="#" data-placement="bottom">
            <i class="fa fa-trash"></i>
   </a>
</script>
