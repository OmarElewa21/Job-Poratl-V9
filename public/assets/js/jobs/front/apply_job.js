/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*****************************************************!*\
  !*** ./resources/assets/js/jobs/front/apply_job.js ***!
  \*****************************************************/


$(document).ready(function () {
  $(document).on('click', '.save-draft', function (e) {
    e.preventDefault();
    submitForm('#applyJobForm', 'draft', '#draftJobSave', '#applyJobSave');
  });
  $(document).on('click', '.apply-job', function (e) {
    e.preventDefault();
    submitForm('#applyJobForm', 'apply', '#applyJobSave', '#draftJobSave');
  });

  window.submitForm = function (formId, applicationType, loadingBtnId, disabledBtnId) {
    processingBtn(formId, loadingBtnId, 'loading');
    $(disabledBtnId).prop('disabled', true);
    var data = new FormData($(document).find(formId)[0]);
    data.append('application_type', applicationType);
    $.ajax({
      url: applyJobUrl,
      type: 'post',
      data: data,
      dataType: 'JSON',
      contentType: false,
      cache: false,
      processData: false,
      success: function success(result) {
        if (result.success) {
          console.log(result);
          displaySuccessMessage(result.message);
          setTimeout(function () {
            window.location = jobDetailsUrl + '/' + result.data;
          }, 3000);
        }
      },
      error: function error(result) {
        displayErrorMessage(result.responseJSON.message);
        processingBtn(formId, loadingBtnId, 'reset');
        $(disabledBtnId).prop('disabled', false);
      }
    });
  };
});
/******/ })()
;