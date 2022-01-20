/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*********************************************************!*\
  !*** ./resources/assets/js/candidate/favourite_jobs.js ***!
  \*********************************************************/


$(document).ready(function () {
  $('#favouriteJobsId').on('change', function () {
    filterJobId = $(this).val();
    window.livewire.emit('changeFilter', 'filterFavouriteJobs', $(this).val());
  });
});
var filterJobId = null;
document.addEventListener('livewire:load', function (event) {
  window.livewire.hook('message.processed', function () {
    $('#favouriteJobsId').select2({
      width: '100%'
    });
    $('#favouriteJobsId').val(filterJobId).trigger('change.select2');
    setTimeout(function () {
      $('.alert').fadeOut('fast');
    }, 4000);
  });
});
$(document).on('click', '.removeJob', function (event) {
  var jobId = $(event.currentTarget).attr('data-id');
  swal({
    title: Lang.get('messages.common.remove') + ' !',
    text: Lang.get('messages.common.are_you_sure_want_to_remove') + '"' + Lang.get('messages.job.favourite_job') + '" ?',
    type: 'warning',
    showCancelButton: true,
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
    confirmButtonColor: '#6777ef',
    cancelButtonColor: '#d33',
    cancelButtonText: Lang.get('messages.common.no'),
    confirmButtonText: Lang.get('messages.common.yes')
  }, function () {
    window.livewire.emit('removeJob', jobId);
  });
});
document.addEventListener('deleted', function () {
  swal({
    title: Lang.get('messages.common.remove') + ' !',
    text: Lang.get('messages.job.favourite_job') + Lang.get('messages.common.has_been_removed'),
    type: 'success',
    confirmButtonColor: '#6777ef',
    timer: 2000
  });
});
$(document).ready(function () {
  $('#favouriteJobsId').select2({
    width: '100%'
  });
});
/******/ })()
;