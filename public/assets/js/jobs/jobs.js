/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/assets/js/jobs/jobs.js ***!
  \******************************************/


var tableName = '#jobsTbl';
$(tableName).DataTable({
  processing: true,
  serverSide: true,
  'order': [[0, 'asc']],
  ajax: {
    url: jobsUrl,
    data: function data(_data) {
      _data.is_featured = $('#filter_featured').find('option:selected').val();
      _data.status = $('#filter_status').find('option:selected').val();
    }
  },
  columnDefs: [{
    'targets': [0],
    'width': '25%'
  }, {
    'targets': [1],
    'width': '10%'
  }, {
    'targets': [2],
    'className': 'text-right',
    'width': '20%'
  }, {
    'targets': [3],
    'orderable': false,
    'className': 'text-center',
    'width': '15%'
  }, {
    'targets': [4],
    'orderable': false,
    'className': 'text-center',
    'width': '15%'
  }, {
    'targets': [5],
    'orderable': false,
    'className': 'text-center',
    'width': '15%'
  }],
  columns: [{
    data: function data(row) {
      var element = document.createElement('textarea');
      element.innerHTML = row.job_title;
      return '<a href="' + frontJobDetail + '/' + row.job_id + '" target="_blank">' + element.value + '</a>';
    },
    name: 'job_title'
  }, {
    data: function data(row) {
      var currentDate = moment().format('YYYY-MM-DD');
      var expiryDate = moment(row.job_expiry_date).format('YYYY-MM-DD');
      if (currentDate > expiryDate) return '<div class="badge badge-danger">' + moment(row.job_expiry_date, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY') + '</div>';
      return '<div class="badge badge-primary">' + moment(row.job_expiry_date, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY') + '</div>';
    },
    name: 'job_expiry_date'
  }, {
    data: function data(row) {
      return '<div class="badge badge-primary">' + +row.applied_jobs.length + '</div>';
    },
    name: 'id'
  }, {
    data: function data(row) {
      var featured = row.active_featured;
      var expiryDate;

      if (featured) {
        expiryDate = moment(featured.end_time).format('YYYY-MM-DD');
      }

      var data = [{
        'id': row.id,
        'featured': featured,
        'expiryDate': expiryDate,
        'isFeaturedEnable': isFeaturedEnable == 1 ? true : false,
        'isFeaturedAvilabal': isFeaturedAvilabal,
        'isJobLive': row.status == 1 ? true : false
      }];
      var todayDate = new Date().toISOString().split('T')[0];

      if (todayDate > row.job_expiry_date) {
        return '<i class="font-20 fas fa-times-circle text-danger"></i>';
      }

      return prepareTemplateRender('#feauredJobTemplate', data);
    },
    name: 'hide_salary'
  }, {
    data: function data(row) {
      var isJobClosed = false;

      if (row.status == 2) {
        isJobClosed = true;
      }

      var statusColor = {
        '0': 'dark',
        '1': 'success',
        '2': 'warning',
        '3': 'primary'
      };
      var data = [{
        'status': statusArray[row.status],
        'statusColor': statusColor[row.status],
        'isJobClosed': isJobClosed,
        'id': row.id
      }];
      return prepareTemplateRender('#jobStatusActionTemplate', data);
    },
    name: 'id'
  }, {
    data: function data(row) {
      var url = jobsUrl + '/' + row.id;
      var isJobClosed = false;
      var isJobPause = false;
      var isJobDraft = false;

      if (row.status == 2) {
        isJobClosed = true;
      }

      if (row.status == 3) {
        isJobPause = true;
      }

      if (row.status == 0) {
        isJobDraft = true;
      }

      var data = [{
        'id': row.id,
        'url': url + '/edit',
        'isJobClosed': isJobClosed,
        'isJobPause': isJobPause,
        'isJobDraft': isJobDraft,
        'jobApplicationUrl': url + '/applications',
        'jobId': row.job_id
      }];
      return prepareTemplateRender('#jobActionTemplate', data);
    },
    name: 'id'
  }],
  'fnInitComplete': function fnInitComplete() {
    $('#filter_featured,#filter_status').change(function () {
      $(tableName).DataTable().ajax.reload(null, true);
    });
  }
});
$(document).ready(function () {
  $('#filter_featured').select2({
    width: '170px'
  });
  $('#filter_status').select2({
    width: '150px'
  });
});
$(document).on('click', '.delete-btn', function (event) {
  var jobId = $(event.currentTarget).data('id');
  deleteItem(jobsUrl + '/' + jobId, tableName, Lang.get('messages.job.job'));
});
$(document).on('click', '.change-status', function (event) {
  var jobId = $(this).data('id');
  var jobStatus = statusArray.indexOf($(this).data('option'));
  swal({
    title: 'Attention !',
    text: 'Are you sure want to change the status?',
    type: 'info',
    showCancelButton: true,
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
    confirmButtonColor: '#6777ef',
    cancelButtonColor: '#d33',
    cancelButtonText: Lang.get('messages.common.no'),
    confirmButtonText: Lang.get('messages.common.yes')
  }, function () {
    changeStatus(jobId, jobStatus);
  });
});

window.changeStatus = function (id, jobStatus) {
  $.ajax({
    url: jobStatusUrl + id + '/status/' + jobStatus,
    method: 'get',
    cache: false,
    success: function success(result) {
      if (result.success) {
        $(tableName).DataTable().ajax.reload(null, false);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      swal.close();
    }
  });
};

$(document).on('click', '.copy-btn', function (event) {
  var id = $(event.currentTarget).data('job-id');
  var copyUrl = frontJobDetail + '/' + id;
  var $temp = $('<input>');
  $('body').append($temp);
  $temp.val(copyUrl).select();
  document.execCommand('copy');
  $temp.remove();
  displaySuccessMessage('Link Copied Successfully.');
});
/******/ })()
;