/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************************!*\
  !*** ./resources/assets/js/front_register/google-recaptcha.js ***!
  \****************************************************************/


window.checkGoogleReCaptcha = function (registerType) {
  var response = grecaptcha.getResponse();

  if (response.length == 0) {
    displayErrorMessage('You must verify google recaptcha.');
    processingBtn(registerType == 1 ? '#addCandidateNewForm' : '#addEmployerNewForm', registerType == 1 ? '#btnCandidateSave' : '#btnEmployerSave');
    return false;
  }

  return true;
};
/******/ })()
;