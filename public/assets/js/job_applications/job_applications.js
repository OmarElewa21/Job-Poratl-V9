/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************************************************!*\
  !*** ./resources/assets/js/job_applications/job_applications.js ***!
  \******************************************************************/


$(document).ready(function () {
  $('#filterStatus').select2();
});
var tableName = '#jobApplicationsTbl';
$(tableName).DataTable({
  processing: true,
  serverSide: true,
  'order': [[0, 'asc']],
  ajax: {
    url: jobApplicationsUrl,
    type: 'GET',
    data: function data(_data) {
      _data.status = $('#filterStatus').find('option:selected').val();
    }
  },
  columnDefs: [{
    'targets': [0],
    'className': 'text-center',
    'width': '15%'
  }, {
    'targets': [2],
    'className': 'text-right',
    'width': '15%'
  }, {
    'targets': [3],
    'className': 'text-center',
    'width': '13%',
    'orderable': false
  }, {
    'targets': [4],
    'className': 'text-center',
    'width': '13%'
  }, {
    'targets': [5],
    'className': 'text-center',
    'width': '15%',
    'orderable': false
  }, {
    'targets': [6],
    'className': 'text-center',
    'width': '12%',
    'orderable': false
  }],
  columns: [{
    data: function data(row) {
      var showLink = candidateDetailsUrl + '/' + row.candidate.unique_id;
      return '<a href="' + showLink + '">' + row.candidate.user.full_name + '</a>';
    },
    name: 'candidate.user.first_name'
  }, {
    data: function data(row) {
      return row.job.currency.currency_icon + '&nbsp;' + currency(row.expected_salary).format();
    },
    name: 'expected_salary'
  }, {
    data: function data(row) {
      return moment(row.created_at, 'YYYY-MM-DD').format('Do MMM, YYYY');
    },
    name: 'created_at'
  }, {
    data: function data(row) {
      if (!row.hasResumeAvailable) {
        var downloadLink = downloadDocumentUrl + '/' + row.id;
        return '<a href="' + downloadLink + '">' + 'Download' + '</a>';
      }

      return 'N/A';
    },
    name: 'candidate.user.last_name'
  }, {
    data: function data(row) {
      return !isEmpty(row.job_stage_id) ? row.job_stage.name : '<i class="font-20 fas fa-times-circle text-danger"></i>';
    },
    name: 'jobStage.name'
  }, {
    data: function data(row) {
      var statusColor = {
        '0': 'warning',
        '1': 'primary',
        '2': 'danger',
        '3': 'info',
        '4': 'success'
      };
      return '<span class="badge badge-' + statusColor[row.status] + '">' + statusArray[row.status] + '</span>';
    },
    name: 'status'
  }, {
    data: function data(row) {
      var todayDate = new Date().toISOString().split('T')[0];
      var isJobExpiry = false;

      if (todayDate > row.job.job_expiry_date) {
        isJobExpiry = true;
      }

      var viewSlotScreen = jobApplicationsUrl + '/' + row.id + '/slots';
      var isCompleted = false;
      var isShortlisted = false;
      var isJobStage = false;
      var jobStageId = null;
      var isRejected = false;
      var isApplied = false;

      if (row.status == 1) {
        isApplied = true;
      }

      if (row.status == 2) {
        isRejected = true;
      }

      if (row.status == 3) {
        isCompleted = true;
      }

      if (row.status == 4) {
        isShortlisted = true;
      }

      if (!isEmpty(row.job_stage_id)) {
        isJobStage = true;
        jobStageId = row.job_stage_id;
      }

      var data = [{
        'statusId': row.status,
        'id': row.id,
        'isApplied': isApplied,
        'isCompleted': isCompleted,
        'isShortlisted': isShortlisted,
        'isJobStage': isJobStage,
        'jobStageId': jobStageId,
        'isRejected': isRejected,
        'viewSlotsScreen': viewSlotScreen,
        'isJobExpiry': isJobExpiry
      }];
      return prepareTemplateRender('#jobApplicationActionTemplate', data);
    },
    name: 'id'
  }],
  'fnInitComplete': function fnInitComplete() {
    $('#filterStatus').change(function () {
      $('#jobApplicationsTbl').DataTable().ajax.reload(null, true);
    });
  }
});
$(document).on('click', '.action-delete', function (event) {
  var jobApplicationId = $(event.currentTarget).data('id');
  deleteItem(jobApplicationDeleteUrl + '/' + jobApplicationId, tableName, Lang.get('messages.job_application.job_application'));
});
$(document).on('click', '.short-list', function (event) {
  var jobApplicationId = $(event.currentTarget).data('id');
  var applicationStatus = 4;
  changeStatus(jobApplicationId, applicationStatus);
});
$(document).on('click', '.action-completed', function (event) {
  var jobApplicationId = $(event.currentTarget).data('id');
  var applicationStatus = 3;
  selectedItem(jobApplicationId, applicationStatus);
});
$(document).on('click', '.action-decline', function (event) {
  var jobApplicationId = $(event.currentTarget).data('id');
  var applicationStatus = 2;
  rejectedItem(jobApplicationId, applicationStatus);
});

window.changeStatus = function (id, applicationStatus) {
  $.ajax({
    url: jobApplicationStatusUrl + id + '/status/' + applicationStatus,
    method: 'get',
    cache: false,
    success: function success(result) {
      if (result.success) {
        $(tableName).DataTable().ajax.reload(null, false);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    }
  });
};

window.rejectedItem = function (id, applicationStatus) {
  swal({
    title: Lang.get('messages.common.rejected') + ' !',
    text: Lang.get('messages.common.are_you_sure_want_to_reject') + '"' + Lang.get('messages.job_application.job_application') + '" ?',
    type: 'warning',
    showCancelButton: true,
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
    confirmButtonColor: '#6777ef',
    cancelButtonColor: '#d33',
    cancelButtonText: Lang.get('messages.common.no'),
    confirmButtonText: Lang.get('messages.common.yes')
  }, function () {
    changeStatus(id, applicationStatus);
    swal({
      title: Lang.get('messages.common.rejected') + ' !',
      text: Lang.get('messages.job_application.job_application') + ' ' + Lang.get('messages.common.has_been_rejected'),
      type: 'success',
      confirmButtonColor: '#6777ef',
      timer: 2000
    });
  });
};

window.selectedItem = function (id, applicationStatus) {
  swal({
    title: Lang.get('messages.common.selected') + ' !',
    text: Lang.get('messages.common.are_you_sure_want_to_select') + '"' + Lang.get('messages.job_application.job_application') + '" ?',
    type: 'warning',
    showCancelButton: true,
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
    confirmButtonColor: '#6777ef',
    cancelButtonColor: '#d33',
    cancelButtonText: Lang.get('messages.common.no'),
    confirmButtonText: Lang.get('messages.common.yes')
  }, function () {
    changeStatus(id, applicationStatus);
    swal({
      title: Lang.get('messages.common.selected') + ' !',
      text: Lang.get('messages.job_application.job_application') + ' ' + Lang.get('messages.common.has_been_selected'),
      type: 'success',
      confirmButtonColor: '#6777ef',
      timer: 2000
    });
  });
};

$(document).on('click', '.change-job-stage', function () {
  var id = $(this).data('id');
  $('#jobApplicationId').val(id);
  $('#changeJobStageModal').appendTo('body').modal('show');
});
$(document).on('submit', '#changeJobStageForm', function (e) {
  e.preventDefault();
  processingBtn('#changeJobStageForm', '#changeJobStageBtnSave', 'loading');
  $.ajax({
    url: changeJobStage,
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#changeJobStageModal').modal('hide');
        $(tableName).DataTable().ajax.reload(null, false);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      processingBtn('#changeJobStageForm', '#changeJobStageBtnSave');
    }
  });
});
$('#changeJobStageModal').on('hidden.bs.modal', function () {
  $('#jobStageId').val('').trigger('change');
});
$(document).ready(function () {
  $('#jobStageId').select2({
    width: '100%'
  });
  $(document).on('click', '.change-job-stage', function () {
    var jobApplicationId = $(this).data('id');
    $.ajax({
      url: stageCheck + '/' + jobApplicationId,
      type: 'GET',
      success: function success(result) {
        var data = result.data;
        var current_stage = '';

        if (data.current_stage != null) {
          var jobStages = data.job_stages;
          $.each(jobStages, function (key, val) {
            if (val == data.job_stages[data.current_stage]) {
              current_stage = key;
              return true;
            }
          });
        } else {
          current_stage = Object.keys(data.job_stages)[0];
        }

        var nextStage = parseInt(current_stage) + parseInt(1);
        $('#jobStageId').empty();
        $('#jobStageId').append('<option value="">Select Job Stage</option>');
        var stageIndex = Object.keys(data.job_stages)[0];
        $.each(data.job_stages, function (key, val) {
          var disabled = data.current_stage_cleared == true && nextStage != stageIndex || data.current_stage_cleared == false && current_stage != stageIndex ? 'disabled' : '';
          $('#jobStageId').append("<option value=\"".concat(key, "\" ").concat(disabled, ">").concat(val, "</option>"));
          stageIndex++;
        });
      }
    });
  });
});
/******/ })()
;