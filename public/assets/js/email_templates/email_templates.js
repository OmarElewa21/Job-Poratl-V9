/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************************!*\
  !*** ./resources/assets/js/email_templates/email_templates.js ***!
  \****************************************************************/


var tableName = '#emailTemplateTbl';
$(tableName).DataTable({
  processing: true,
  serverSide: true,
  'order': [[0, 'desc']],
  ajax: {
    url: emailTemplateUrl
  },
  columnDefs: [{
    'targets': [0]
  }, {
    'targets': [1],
    'className': 'text-center',
    'orderable': false,
    'width': '10%'
  }, {
    targets: '_all',
    defaultContent: 'N/A'
  }],
  columns: [{
    data: 'template_name',
    name: 'template_name'
  }, {
    data: function data(row) {
      var url = emailTemplateUrl + '/' + row.id;
      var data = [{
        'url': url + '/edit'
      }];
      return prepareTemplateRender('#emailTemplate', data);
    },
    name: 'id'
  }]
});
/******/ })()
;