/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**********************************************************!*\
  !*** ./resources/assets/js/noticeboards/noticeboards.js ***!
  \**********************************************************/


$(document).on('click', '.addNoticeboardModal', function () {
  $('#addModal').appendTo('body').modal('show');
});
$(document).on('submit', '#addNewForm', function (e) {
  e.preventDefault();

  if (!checkSummerNoteEmpty('#description', 'Description field is required.', 1)) {
    return true;
  }

  processingBtn('#addNewForm', '#btnSave', 'loading');
  $.ajax({
    url: noticeboardSaveUrl,
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#addModal').modal('hide'); //window.livewire.emit('refresh');

        $('#noticeboardsTbl').DataTable().ajax.reload(null, false);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      processingBtn('#addNewForm', '#btnSave');
    }
  });
});
$(document).on('click', '.edit-btn', function (event) {
  if (ajaxCallIsRunning) {
    return;
  }

  ajaxCallInProgress();
  var noticeboardId = $(event.currentTarget).data('id');
  renderData(noticeboardId);
});

window.renderData = function (id) {
  $.ajax({
    url: noticeboardUrl + id + '/edit',
    type: 'GET',
    success: function success(result) {
      if (result.success) {
        var element = document.createElement('textarea');
        element.innerHTML = result.data.title;
        $('#noticeboardId').val(result.data.id);
        $('#editTitle').val(element.value);
        $('#editDescription').summernote('code', result.data.description);
        result.data.is_active == 1 ? $('#editIsActive').prop('checked', true) : $('#editIsActive').prop('checked', false);
        $('#editModal').appendTo('body').modal('show');
        ajaxCallCompleted();
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    }
  });
};

$(document).on('submit', '#editForm', function (event) {
  event.preventDefault();

  if (!checkSummerNoteEmpty('#editDescription', 'Description field is required.', 1)) {
    return true;
  }

  processingBtn('#editForm', '#btnEditSave', 'loading');
  var id = $('#noticeboardId').val();
  $.ajax({
    url: noticeboardUrl + id,
    type: 'put',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#editModal').modal('hide'); //window.livewire.emit('refresh');

        $('#noticeboardsTbl').DataTable().ajax.reload();
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      processingBtn('#editForm', '#btnEditSave');
    }
  });
});
$(document).on('click', '.show-btn', function (event) {
  if (ajaxCallIsRunning) {
    return;
  }

  ajaxCallInProgress();
  var noticeboardId = $(event.currentTarget).data('id');
  $.ajax({
    url: noticeboardUrl + noticeboardId,
    type: 'GET',
    success: function success(result) {
      if (result.success) {
        $('#showTitle').html('');
        $('#showDescription').html('');
        $('#showTitle').append(result.data.title);
        var element = document.createElement('textarea');
        element.innerHTML = !isEmpty(result.data.description) ? result.data.description : 'N/A';
        $('#showDescription').append(element.value);
        result.data.is_active === 1 ? $('#showIsActive').html('Active') : $('#showIsActive').html('Deactive');
        $('#showModal').appendTo('body').modal('show');
        ajaxCallCompleted();
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    }
  });
});
$(document).on('click', '.delete-btn', function (event) {
  var noticeboardId = $(event.currentTarget).attr('data-id');
  deleteItem(noticeboardUrl + noticeboardId, '#noticeboardsTbl', Lang.get('messages.noticeboard.noticeboard'));
});
$(document).on('change', '.isActive', function (event) {
  var noticeId = $(event.currentTarget).data('id');
  $.ajax({
    url: noticeboardUrl + noticeId + '/' + 'change-status',
    method: 'post',
    cache: false,
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message); //window.livewire.emit('refresh');

        $('#noticeboardsTbl').DataTable().ajax.reload();
      }
    }
  });
});
$('#addModal').on('hidden.bs.modal', function () {
  resetModalForm('#addNewForm', '#validationErrorsBox');
  $('#description').summernote('code', '');
});
$('#editModal').on('hidden.bs.modal', function () {
  resetModalForm('#editForm', '#editValidationErrorsBox');
});
$('#description, #editDescription').summernote({
  minHeight: 200,
  height: 200,
  toolbar: [['style', ['bold', 'italic', 'underline', 'clear']], ['font', ['strikethrough']], ['para', ['paragraph']]]
});
$(document).ready(function () {
  $('#noticeboard_filter_status').select2();
  $('#noticeboard_filter_status').on('change', function (e) {
    var data = $('#noticeboard_filter_status').select2('val');
    window.livewire.emit('changeFilter', 'status', data);
    $('#noticeboardsTbl').DataTable().ajax.reload();
  });
});
$(document).ready(function () {
  var table = $('#noticeboardsTbl').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: noticeboardUrl,
      type: 'GET',
      data: function data(_data) {
        _data.is_active = $('#noticeboard_filter_status').find('option:selected').val();
      }
    },
    columnDefs: [{
      'targets': [3],
      'orderable': false,
      'className': 'text-center'
    }, {
      'targets': [2],
      'orderable': false,
      'className': 'text-center'
    }],
    columns: [{
      data: function data(row) {
        return '<a class="show-btn" href="#" data-id="' + row.id + '">' + row.title + '</a>';
      },
      name: 'title'
    }, {
      data: function data(row) {
        var element = document.createElement('textarea');
        element.innerHTML = !isEmpty(row.description) ? row.description : 'N/A';
        return element.value;
      },
      name: 'description'
    }, {
      data: function data(row) {
        var checked = row.is_active === 0 ? '' : 'checked';
        var data = [{
          'id': row.id,
          'checked': checked
        }];
        return prepareTemplateRender('#isActive', data);
      },
      name: 'id',
      searchable: false
    }, {
      data: function data(row) {
        return prepareTemplateRender('#noticeboardActionTemplate', [{
          'id': row.id
        }]);
      },
      name: 'id',
      searchable: false
    }],
    'fnInitComplete': function fnInitComplete() {
      $('#noticeboard_filter_status').change(function () {
        $('#noticeboardsTbl').DataTable().ajax.reload(null, true);
      });
    }
  });
});
/******/ })()
;