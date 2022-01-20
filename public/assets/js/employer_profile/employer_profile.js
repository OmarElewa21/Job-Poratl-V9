/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************************************************!*\
  !*** ./resources/assets/js/employer_profile/employer_profile.js ***!
  \******************************************************************/


$(document).on('submit', '#editProfileForm', function (event) {
  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnPrEditSave');
  loadingButton.button('loading');
  $.ajax({
    url: profileUpdateUrl,
    type: 'post',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      $('#editProfileModal').modal('hide');
      location.reload();
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});
$(document).on('submit', '#changePasswordForm', function (event) {
  event.preventDefault();
  var isValidate = validatePassword();

  if (!isValidate) {
    return false;
  }

  var loadingButton = jQuery(this).find('#btnPrPasswordEditSave');
  loadingButton.button('loading');
  $.ajax({
    url: changePasswordUrl,
    type: 'post',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      if (result.success) {
        $('#changePasswordModal').modal('hide');
        displaySuccessMessage(result.message);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});
$('#editProfileModal').on('hidden.bs.modal', function () {
  resetModalForm('#editProfileForm', '#validationErrorsBox');
  $('#btnPrEditSave').prop('disabled', false);
});
$('#changeLanguageModal').on('hidden.bs.modal', function () {
  resetModalForm('#changeLanguageForm', '#editProfileValidationErrorsBox');
  $('#language').trigger('change.select2');
}); // open edit user profile model

$(document).on('click', '.editProfileModal', function (event) {
  renderProfileData();
});

window.renderProfileData = function () {
  $.ajax({
    url: profileUrl,
    type: 'GET',
    success: function success(result) {
      if (result.success) {
        var user = result.data.employer;
        var company = result.data.company;
        $('#editUserId').val(user.id);
        $('#companyId').val(company.id);
        $('#firstName').val(user.first_name);
        $('#editEmail').val(user.email);
        $('#editphoneNumber').val(user.phone);

        if (isEmpty(company.company_url)) {
          $('#previewImage').attr('src', defaultImageUrl);
        } else {
          $('#previewImage').attr('src', company.company_url);
        }

        $('#editProfileModal').appendTo('body').modal('show');
      }
    }
  });
};

$(document).on('change', '#employerImage', function () {
  if (isValidFile($(this), '#validationErrorsBox')) {
    validatePhoto(this, '#previewImage');
  }
});

window.validatePhoto = function (input, selector) {
  var displayPreview = true;

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var image = new Image();
      image.src = e.target.result;

      image.onload = function () {
        if (image.height / image.width !== 1) {
          $('#validationErrorsBox').removeClass('d-none');
          $('#validationErrorsBox').html(Lang.get('messages.common.image_aspect_ratio')).show();
          $('#btnPrEditSave').prop('disabled', true);
          return false;
        }

        $(selector).attr('src', e.target.result);
        $('#btnPrEditSave').prop('disabled', false);
        displayPreview = true;
      };
    };

    if (displayPreview) {
      reader.readAsDataURL(input.files[0]);
      $(selector).show();
    }
  }
};

$('#changePasswordModal').on('hidden.bs.modal', function () {
  resetModalForm('#changePasswordForm', '#editPasswordValidationErrorsBox');
});

function validatePassword() {
  var currentPassword = $('#pfCurrentPassword').val().trim();
  var password = $('#pfNewPassword').val().trim();
  var confirmPassword = $('#pfNewConfirmPassword').val().trim();

  if (currentPassword == '' || password == '' || confirmPassword == '') {
    $('#editPasswordValidationErrorsBox').show().html(Lang.get('messages.user.required_field_messages'));
    return false;
  }

  return true;
}

$(document).on('submit', '#changeLanguageForm', function (event) {
  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnLanguageChange');
  loadingButton.button('loading');
  $.ajax({
    url: updateLanguageURL,
    type: 'post',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      $('#changePasswordModal').modal('hide');
      displaySuccessMessage(result.message);
      setTimeout(function () {
        location.reload();
      }, 1500);
    },
    error: function error(result) {
      manageAjaxErrors(result, 'editProfileValidationErrorsBox');
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});
$('#changePasswordModal').on('shown.bs.modal', function () {
  $(this).find('[autofocus]').focus();
});
$(document).on('click', '.changePasswordModal', function () {
  $('#changePasswordModal').appendTo('body').modal('show');
});
$(document).on('click', '.changeLanguageModal', function () {
  $('#changeLanguageModal').appendTo('body').modal('show');
});
$(document).ready(function () {
  $('#language').select2({
    width: '100%'
  });
  $("#editEmail").keypress(function (e) {
    return false;
  });
});
/******/ })()
;