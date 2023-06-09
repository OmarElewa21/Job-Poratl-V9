/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************************************************!*\
  !*** ./resources/assets/js/selected_candidate/selected_candidate.js ***!
  \**********************************************************************/
$(document).ready(function () {
  $('#filterCandidateStatus').select2();
  $('#select2-filterCandidateStatus-container').hover(function () {
    $(this).removeAttr('title');
  });
  var table = $('#selectedCandidateTbl').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: selectedCandidateUrl,
      type: 'GET',
      data: function data(_data) {
        _data.status = $('#filterCandidateStatus').find('option:selected').val();
      }
    },
    columnDefs: [{
      'targets': [2, 3],
      'orderable': false,
      'className': 'text-center'
    }],
    columns: [{
      data: 'candidate.user.full_name',
      name: 'candidate.user.full_name'
    }, {
      data: 'job.company.user.first_name',
      name: 'job.company.user.first_name'
    }, {
      data: function data(row) {
        if (row.status == 3) {
          return '<span class="badge badge-primary text-center" >Hired</span>';
        }

        return '<span class="badge badge-success text-center">Ongoing</span>';
      },
      name: 'status'
    }, {
      data: function data(row) {
        return '<a class="btn btn-info action-btn" href="' + jobDetailUrl + '/' + row.job.job_id + '" ' + 'title="view"><i class="fas fa-eye"></i></a>';
      },
      name: 'id'
    }],
    'fnInitComplete': function fnInitComplete() {
      $('#filterCandidateStatus').change(function () {
        $('#selectedCandidateTbl').DataTable().ajax.reload(null, true);
      });
    }
  });
});
/******/ })()
;