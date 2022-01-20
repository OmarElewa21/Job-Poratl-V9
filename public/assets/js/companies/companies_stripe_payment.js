/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************************************!*\
  !*** ./resources/assets/js/companies/companies_stripe_payment.js ***!
  \*******************************************************************/
$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(document).on('click', '#makeFeatured', function () {
    var _this = this;

    var payloadData = {
      companyId: companyID
    };
    $(this).html('<div class="spinner-border spinner-border-sm " role="status">\n' + '                                            <span class="sr-only">Loading...</span>\n' + '                                        </div>');
    $(this).addClass('disabled');
    $.post(companyStripePaymentUrl, payloadData).done(function (result) {
      var sessionId = result.data.sessionId;
      stripe.redirectToCheckout({
        sessionId: sessionId
      }).then(function (result) {
        $(this).html('Make Featured').removeClass('disabled');
        manageAjaxErrors(result);
      });
    })["catch"](function (error) {
      $(_this).html('Make Featured').removeClass('disabled');
      manageAjaxErrors(error);
    });
  });
});
/******/ })()
;