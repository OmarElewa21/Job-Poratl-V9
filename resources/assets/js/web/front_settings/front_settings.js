'use strict';

$(document).on('change', '#advertiseImage', function () {
    $('#validationErrorsBox').addClass('d-none');
    if (isValidAdvertise($(this), '#validationErrorsBox')) {
        displayAdvertiseImage(this, '#advertisePreview');
    }
    $('#validationErrorsBox').delay(5000).slideUp(300);
});

window.displayAdvertiseImage = function (input, selector) {
    let displayPreview = true;
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            let image = new Image();
            image.src = e.target.result;
            image.onload = function () {
                if ((image.height != 450 || image.width != 630)) {
                    $('#advertiseImage').val('');
                    $('#validationErrorsBox').removeClass('d-none');
                    $('#validationErrorsBox').
                        html('The image must be of pixel 450 x 630').
                        show();
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

window.isValidAdvertise = function (inputSelector, validationMessageSelector) {
    let ext = $(inputSelector).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['jpg', 'jpeg', 'png']) == -1) {
        $(inputSelector).val('');
        $(validationMessageSelector).removeClass('d-none');
        $(validationMessageSelector).
            html('The image must be a file of type: jpg, jpeg, png.').
            show();
        return false;
    }
    $(validationMessageSelector).hide();
    return true;

};
$(document).ready(function () {
    $('#currency').select2({
        width: '100%',
    });
});

$(document).on('change', '.featured-job-active', function () {
    let featuredJobId;
    if ($(this).prop('checked') == true) {
        featuredJobId = 1;
    } else {
        featuredJobId = 0;
    }
    changeFeaturedJob(featuredJobId);
});

window.changeFeaturedJob = function (id) {
    $.ajax({
        url: 'front-settings' + '/' + id + '/change-is-job-active',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
            }
        },
        error: function (result) {
            displayErrorMessage(result.message);
        },
    });
};

$(document).on('change', '.featured-company-active', function () {
    let featuredCompanyId;
    if ($(this).prop('checked') == true) {
        featuredCompanyId = 1;
    } else {
        featuredCompanyId = 0;
    }
    changeFeaturedCompany(featuredCompanyId);
});

window.changeFeaturedCompany = function (id) {
    $.ajax({
        url: 'front-settings' + '/' + id + '/change-is-company-active',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
            }
        },
        error: function (result) {
            displayErrorMessage(result.message);
        },
    });
};

$(document).on('change', '.job-country-active', function () {
    let jobCountryId;
    if ($(this).prop('checked') == true) {
        jobCountryId = 1;
    } else {
        jobCountryId = 0;
    }
    changeJobCountry(jobCountryId);
});

window.changeJobCountry = function (id) {
    $.ajax({
        url: 'front-settings' + '/' + id + '/change-is-job-country-active',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
            }
        },
        error: function (result) {
            displayErrorMessage(result.message);
        },
    });
};
