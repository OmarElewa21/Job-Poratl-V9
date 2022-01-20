/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************************!*\
  !*** ./resources/assets/js/jobs/jobs_stripe_payment.js ***!
  \*********************************************************/
$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(document).on('click', '.featured-job', function () {
    var _this = this;

    var payloadData = {
      jobId: $(this).data('id')
    };
    $(this).html('<div class="spinner-border spinner-border-sm " role="status">\n' + '                                            <span class="sr-only">Loading...</span>\n' + '                                        </div>');
    $(this).tooltip('hide');
    $('#jobsTbl a.featured-job').addClass('disabled');
    $.post(jobStripePaymentUrl, payloadData).done(function (result) {
      var sessionId = result.data.sessionId;
      stripe.redirectToCheckout({
        sessionId: sessionId
      }).then(function (result) {
        $(this).html('Make Featured').removeClass('disabled');
        $('#jobsTbl a.featured-job').removeClass('disabled');
        manageAjaxErrors(result);
      });
    })["catch"](function (error) {
      $(_this).html('Make Featured').removeClass('disabled');
      $('#jobsTbl a.featured-job').removeClass('disabled');
      manageAjaxErrors(error);
    });
  });
});
/******/ })()
;