/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!************************************************************!*\
  !*** ./resources/assets/js/email_templates/create-edit.js ***!
  \************************************************************/


$(document).ready(function () {
  $('#body').summernote({
    minHeight: 200,
    height: 200,
    dialogsInBody: true,
    toolbar: [['style', ['style']], ['font', ['bold', 'underline', 'clear']], ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']], ['table', ['table']], ['insert', ['link', 'picture']], ['view', ['codeview']]]
  });
  $(document).on('submit', '#editEmailTemplateForm', function (e) {
    if (!checkSummerNoteEmpty('#body', 'Body field is required.', 1)) {
      e.preventDefault();
      return true;
    }
  });
  $(document).on('click', '.note-link-btn', function (e) {
    e.preventDefault();
    var text = $('.note-form-group .note-link-text').val().trim().length;
    var url = $('.note-form-group .note-link-url').val().trim().length;

    if (text == 0) {
      displayErrorMessage('Text Field is required.');
      $('.link-dialog').modal("show");
      return false;
    }

    if (url == 0) {
      displayErrorMessage('Url Field is required.');
      $('.link-dialog').modal("show");
      return false;
    }

    return true;
  });
  $(document).on('click', '.note-image-btn', function (e) {
    var imageUrl = $('.note-group-image-url .note-image-url').val().trim().length;
    var imageModal = $('.note-modal:eq(1)');

    if (imageUrl == 0) {
      imageModal.show();
      imageModal.addClass('show');
      displayErrorMessage('Url Field is required.');
      return false;
    }

    imageModal.hide();
    imageModal.removeClass('show');
    return true;
  });
  /* summernote modal label */

  $('.note-modal .form-group label').append(' <span class="text-danger">*</span>');
});
/******/ })()
;