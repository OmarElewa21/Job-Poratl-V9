/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************************!*\
  !*** ./resources/assets/js/custom/state_country.js ***!
  \*****************************************************/
$(document).ready(function () {
  $('#countryId').on('change', function () {
    $.ajax({
      url: companyStateUrl,
      type: 'get',
      dataType: 'json',
      data: {
        postal: $(this).val()
      },
      success: function success(data) {
        $('#stateId').empty();
        $.each(data.data, function (i, v) {
          $('#stateId').append($('<option></option>').attr('value', i).text(v));
        });
      }
    });
  });
  $('#stateId').on('change', function () {
    $.ajax({
      url: companyCityUrl,
      type: 'get',
      dataType: 'json',
      data: {
        state: $(this).val(),
        country: $('#countryId').val()
      },
      success: function success(data) {
        $('#cityId').empty();
        $.each(data.data, function (i, v) {
          $('#cityId').append($('<option></option>').attr('value', i).text(v));
        });
      }
    });
  });
});
/******/ })()
;