/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************************************!*\
  !*** ./resources/assets/js/post_comments/post_comments.js ***!
  \************************************************************/
$(document).ready(function () {
  var table = $('#postCommentsTbl').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: postCommentsUrl,
      type: 'GET'
    },
    columnDefs: [{
      'targets': [4],
      'orderable': false,
      'className': 'text-center',
      'width': '5%'
    }, {
      'targets': [5],
      'visible': false
    }],
    columns: [{
      data: function data(row) {
        var element = document.createElement('textarea');
        element.innerHTML = row.post.title;
        return '<a href="/posts/details/' + row.post.id + '">' + element.value + '</a>';
      },
      name: 'post.title'
    }, {
      data: function data(row) {
        var element = document.createElement('textarea');
        var email = document.createElement('textarea');
        element.innerHTML = row.name;
        email.innerHTML = row.email;
        return '<b>' + element.value + '</b><br><p>' + email.value + '</p>';
      },
      name: 'name'
    }, {
      data: function data(row) {
        var comment = row.comment;
        var commentLen = row.comment.length;

        if (commentLen > 50) {
          return comment.substr(0, 50) + '...';
        }

        return row.comment;
      },
      name: 'comment'
    }, {
      data: function data(row) {
        return moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY');
      },
      name: 'created_at'
    }, {
      data: function data(row) {
        return prepareTemplateRender('#postCommentsActionTemplate', [{
          'id': row.id
        }]);
      },
      name: 'id'
    }, {
      data: function data() {
        return '';
      },
      name: 'email'
    }]
  });
});
$(document).on('click', '.delete-btn', function (event) {
  var jobId = $(event.currentTarget).data('id');
  deleteItem(deleteComment + '/' + jobId, '#postCommentsTbl', Lang.get('messages.post_comment.post_comment'));
});
$(document).on('click', '.show-btn', function (event) {
  if (ajaxCallIsRunning) {
    return;
  }

  ajaxCallInProgress();
  var commentId = $(event.currentTarget).attr('data-id');
  $.ajax({
    url: showComment + '/' + commentId,
    type: 'GET',
    success: function success(result) {
      if (result.success) {
        $('#postTitle,#postComment,#postUser,#postEmail,#postCreatedOn').html('');
        $('#postTitle').append(result.data.post.title);
        $('#postComment').append(result.data.comment);
        $('#postUser').append(result.data.name);
        $('#postEmail').append(result.data.email);
        var created_on = moment(result.data.created_at).fromNow();
        $('#postCreatedOn').append(created_on);
        $('#showModal').appendTo('body').modal('show');
        ajaxCallCompleted();
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    }
  });
});
/******/ })()
;