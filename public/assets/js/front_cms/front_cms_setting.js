/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!************************************************************!*\
  !*** ./resources/assets/js/front_cms/front_cms_setting.js ***!
  \************************************************************/


$(document).ready(function () {
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
/******/ })()
;