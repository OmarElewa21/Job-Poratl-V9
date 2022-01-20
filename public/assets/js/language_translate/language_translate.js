/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**********************************************************************!*\
  !*** ./resources/assets/js/language_translate/language_translate.js ***!
  \**********************************************************************/


$(document).ready(function () {
  $('.translateLanguage,#subFolderFiles').select2();
  var lang = languageName;
  var file = fileName;
  var url = 'translation-manager?';
  $(document).on('change', '.translateLanguage', function () {
    lang = $(this).val();

    if (lang == '') {
      window.location.href = url;
    } else {
      window.location.href = url + 'name=' + lang + '&file=' + file;
    }
  });
  $(document).on('change', '#subFolderFiles', function () {
    file = $(this).val();

    if (file == '') {
      location.href = url;
    } else {
      window.location.href = url + 'name=' + lang + '&file=' + file;
    }
  });
});
$(document).on('click', '.addLanguageModal', function () {
  $('#addModal').appendTo('body').modal('show');
});
$(document).on('submit', '#addNewForm', function (e) {
  e.preventDefault();
  processingBtn('#addNewForm', '#btnSave', 'loading');
  $.ajax({
    url: languageCreateURL,
    type: 'POST',
    data: $(this).serialize(),
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#addModal').modal('hide');
        setTimeout(function () {
          location.reload();
        }, 2000);
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
$('#addModal').on('hidden.bs.modal', function () {
  resetModalForm('#addNewForm', '#validationErrorsBox');
});
/******/ })()
;