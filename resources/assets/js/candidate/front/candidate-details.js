$(document).ready(function () {
    'use strict';
    $(document).on('submit', '#reportToCandidate', function (e) {
        e.preventDefault();
        processingBtn('#reportToCandidate', '#btnSave', 'loading');
        $.ajax({
            url: reportToCandidateUrl,
            type: 'POST',
            data: $(this).serialize(),
            success: function (result) {
                if (result.success) {
                    displaySuccessMessage(result.message);
                    $('.close-modal').click();
                    $(".reportToCandidate").attr("style", "pointer-events:none;");
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseJSON.message);
            },
            complete: function () {
                processingBtn('#reportToCandidate', '#btnSave');
            },
        });
    });
});
$('#reportToCandidateModal').on('hidden.bs.modal', function () {
    $('#noteForReportToCompany').val('');
})
