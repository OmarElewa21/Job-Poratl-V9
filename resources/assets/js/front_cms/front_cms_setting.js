'use strict';

$(document).ready(function() {
    $(document).on('change', '#aboutImageOne', function () {
        if (isValidFile($(this), '#validationErrorsBox')) {
            displayPhoto(this, '#aboutImagePreviewOne');
        }
    });
    $(document).on('change', '#aboutImageTwo', function () {
        if (isValidFile($(this), '#validationErrorsBox')) {
            displayPhoto(this, '#aboutImagePreviewTwo');
        }
    });
    $(document).on('change', '#aboutImageThree', function () {
        if (isValidFile($(this), '#validationErrorsBox')) {
            displayPhoto(this, '#aboutImagePreviewThree');
        }
    });
    
});
