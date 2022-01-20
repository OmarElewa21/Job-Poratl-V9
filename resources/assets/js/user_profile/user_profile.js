'use strict';

$(document).on('submit', '#editProfileForm', function (event) {
    event.preventDefault();
    if ($('#profileErrorMsg').text() !== '') {
        $('#profilePhone').focus();
        return false;
    }
    let loadingButton = jQuery(this).find('#btnPrEditSave');
    loadingButton.button('loading');
    $.ajax({
        url: profileUpdateUrl,
        type: 'post',
        data: new FormData($(this)[0]),
        processData: false,
        contentType: false,
        success: function (result) {
            displaySuccessMessage(result.message);
            $('#editProfileModal').modal('hide');
            location.reload();
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

$('#changePasswordModal').on('shown.bs.modal', function() {
    $(this).find('[autofocus]').focus();
});

$(document).on('submit', '#changePasswordForm', function (event) {
    event.preventDefault();
    let isValidate = validatePassword();
    console.log(isValidate);
    if (!isValidate) {
        return false;
    }
    let loadingButton = jQuery(this).find('#btnPrPasswordEditSave');
    loadingButton.button('loading');
    $.ajax({
        url: changePasswordUrl,
        type: 'post',
        data: new FormData($(this)[0]),
        processData: false,
        contentType: false,
        success: function (result) {
            if (result.success) {
                $('#changePasswordModal').modal('hide');
                displaySuccessMessage(result.message);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

$('#editProfileModal').on('hidden.bs.modal', function () {
    resetModalForm('#editProfileForm', '#profilePictureValidationErrorsBox');
    reset();
    $('#btnPrEditSave').prop('disabled', false);
});
$('#changeLanguageModal').on('hide.bs.modal', function () {
    resetModalForm('#changeLanguageForm', '#editProfileValidationErrorsBox');
    $('#language').trigger('change.select2');
});
// open edit user profile model
$(document).on('click', '.editProfileModal', function (event) {
    renderProfileData();
});

window.renderProfileData = function () {
    $.ajax({
        url: profileUrl,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let user = result.data;
                $('#editUserId').val(user.id);
                $('#firstName').val(user.first_name);
                $('#lastName').val(user.last_name);
                $('#userEmail').val(user.email);
                $('#profilePhone').val(user.phone);
                $('#profilePicturePreview').attr('src', user.avatar);
                $('#editProfileModal').appendTo('body').modal('show');
            }
        },
    });
};

$(document).on('change', '#profilePicture', function () {
    let validFile = isValidFile($(this), '#profilePictureValidationErrorsBox');
    if (validFile) {
        validatePhoto(this, '#profilePicturePreview');
        $('#btnPrEditSave').prop('disabled', false);
    } else {
        $('#btnPrEditSave').prop('disabled', true);
    }
});

window.validatePhoto = function (input, selector) {
    let displayPreview = true;
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            let image = new Image();
            image.src = e.target.result;
            image.onload = function () {
                if ((image.height / image.width) !== 1) {
                    $('#profilePictureValidationErrorsBox').
                        removeClass('d-none');
                    $('#profilePictureValidationErrorsBox').
                        html(Lang.get('messages.common.image_aspect_ratio')).
                        show();
                    $('#btnPrEditSave').prop('disabled', true);
                    return false;
                }
                $(selector).attr('src', e.target.result);
                displayPreview = true;
            };
        };
        if (displayPreview) {
            reader.readAsDataURL(input.files[0]);
            $(selector).show();
        }
    }
};

window.isValidFile = function (inputSelector, validationMessageSelector) {
    let ext = $(inputSelector).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
        $(inputSelector).val('');
        $(validationMessageSelector).removeClass('d-none');
        $(validationMessageSelector).
            html(Lang.get('messages.common.image_file_type')).
            show();
        $(validationMessageSelector).delay(5000).slideUp(300);
        return false;
    }
    $(validationMessageSelector).hide();
    return true;
};

$('#changePasswordModal').on('hidden.bs.modal', function () {
    resetModalForm('#changePasswordForm', '#editPasswordValidationErrorsBox');
});

function validatePassword () {
    let currentPassword = $('#pfCurrentPassword').val().trim();
    let password = $('#pfNewPassword').val().trim();
    let confirmPassword = $('#pfNewConfirmPassword').val().trim();

    if (currentPassword == '' || password == '' || confirmPassword == '') {
        $('#editPasswordValidationErrorsBox').
            show().
            html(Lang.get('messages.user.required_field_messages'));
        return false;
    }
    return true;
}

$(document).on('submit', '#changeLanguageForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#btnLanguageChange');
    loadingButton.button('loading');
    $.ajax({
        url: updateLanguageURL,
        type: 'post',
        data: new FormData($(this)[0]),
        processData: false,
        contentType: false,
        success: function (result) {
            $('#changePasswordModal').modal('hide');
            displaySuccessMessage(result.message);
            setTimeout(function () {
                location.reload();
            }, 1500);
        },
        error: function (result) {
            manageAjaxErrors(result, 'editProfileValidationErrorsBox');
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

$(document).on('click', '.changePasswordModal', function () {
    $('#changePasswordModal').appendTo('body').modal('show');
});

$(document).on('click', '.changeLanguageModal', function () {
    $('#changeLanguageModal').appendTo('body').modal('show');
});

$(document).ready(function (){
    $('#language').select2({
        width: '100%'
    });
});

let input = document.querySelector('#profilePhone'),
    profileErrorMsg = document.querySelector('#profileErrorMsg'),
    profileValidMsg = document.querySelector('#profileValidMsg');

let errorMap = [
    'Invalid number',
    'Invalid country code',
    'Too short',
    'Too long',
    'Invalid number'];

// initialise plugin
let intl = window.intlTelInput(input, {
    initialCountry: 'auto',
    separateDialCode: true,
    geoIpLookup: function (success, failure) {
        $.get('https://ipinfo.io', function () {}, 'jsonp').
            always(function (resp) {
                var countryCode = (resp && resp.country)
                    ? resp.country
                    : '';
                success(countryCode);
            });
    },
    utilsScript: utilsScript,
});

let reset = function () {
    input.classList.remove('error');
    profileErrorMsg.innerHTML = '';
    profileErrorMsg.classList.add('hide');
    profileValidMsg.classList.add('hide');
};

input.addEventListener('blur', function () {
    reset();
    if (input.value.trim()) {
        if (intl.isValidNumber()) {
            profileValidMsg.classList.remove('hide');
        } else {
            input.classList.add('error');
            var errorCode = intl.getValidationError();
            profileErrorMsg.innerHTML = errorMap[errorCode];
            profileErrorMsg.classList.remove('hide');
        }
    }
});

// on keyup / change flag: reset
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);

if (typeof profilePhoneNo != 'undefined' && profilePhoneNo !== '') {
    setTimeout(function () {
        $('#profilePhone').trigger('change');
    }, 500);
}

$('#profilePhone').on('blur keyup change countrychange', function () {
    if (typeof profilePhoneNo != 'undefined' && profilePhoneNo !== '') {
        intl.setNumber('+' + profilePhoneNo);
        profilePhoneNo = '';
    }
    let getCode = intl.selectedCountryData['dialCode'];
    $('#profilePrefixCode').val(getCode);
});

// if (isEdit) {
    let getCode = intl.selectedCountryData['dialCode'];
    $('#profilePrefixCode').val(getCode);
// }

let getProfilePhone = $('#profilePhone').val();
let removeSpaceProfilePhone = getProfilePhone.replace(/\s/g, '');
$('#profilePhone').val(removeSpaceProfilePhone);


