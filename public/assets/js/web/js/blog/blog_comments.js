/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**********************************************************!*\
  !*** ./resources/assets/js/web/js/blog/blog_comments.js ***!
  \**********************************************************/


$(document).on('submit', '#commentForm', function (event) {
  event.preventDefault();
  processingBtn('#commentForm', '#submitBtn', 'loading');

  if ($('.comment-id').val() === '') {
    addComment();
  } else {
    updateComment();
  }
});
$(document).on('click', '.delete-comment-btn', function (event) {
  event.preventDefault();
  var deleteId = $(this).data('id');
  var deletedCommentBtn = $(this);
  swal({
    title: Lang.get('messages.common.delete') + ' !',
    text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.post.comment') + '" ?',
    type: 'warning',
    showCancelButton: true,
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
    confirmButtonColor: '#6777ef',
    cancelButtonColor: '#d33',
    cancelButtonText: Lang.get('messages.common.no'),
    confirmButtonText: Lang.get('messages.common.yes')
  }, function () {
    $.ajax({
      type: 'DELETE',
      url: commentUrl + '/' + deleteId,
      success: function success(result) {
        deletedCommentBtn.closest('.comment').remove();
        $('.comment-count span').empty();

        if ($('.comments-area').find('.comment').length !== 0) {
          $('.comment-count').append('<span>(' + $('.comments-area').find('.comment').length + ')</span>');
        } else {
          postComment();
        }

        swal({
          title: Lang.get('messages.common.deleted') + ' !',
          text: Lang.get('messages.post.comment') + Lang.get('messages.common.has_been_deleted'),
          type: 'success',
          confirmButtonColor: '#1967D2',
          timer: 2000
        });
        location.reload();
      }
    });
  });
});
$(document).on('click', '.edit-comment-btn', function (event) {
  event.preventDefault();
  var editId = $(this).data('id');
  $('.comment-id').val($('.delete-comment-btn').data('id'));
  $.ajax({
    type: 'GET',
    url: commentUrl + '/' + editId,
    success: function success(result) {
      $('.comment').val(result.data.comment);
      $('.comment-name').val(result.data.name);
      $('.comment-id').val(result.data.id);
      $('#comment-field').focus();
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    }
  });
});

function addComment() {
  $.ajax({
    type: 'POST',
    url: blogComment,
    data: $('#commentForm').serialize(),
    success: function success(result) {
      if (result.success) {
        location.reload();
        var commentCount = $('.comments-area').find('.comment').length + 1;

        if ($('.comments-area').find('.comment').length === 0) {
          $('.comment-count').append('<span>(' + commentCount + ')</span>');
        } else {
          $('.comment-count span').empty();
          $('.comment-count').append('<span>(' + commentCount + ')</span>');
        }

        if (commentCount >= 0) {
          $('#post-comment').show();
        }

        var data = [{
          'image': !isEmpty(result.data.user) ? result.data.user.avatar : defaultImage,
          'commentName': result.data.name,
          'commentCreated': moment(result.data.created_at).format('DD, MMM yy hh:mm a'),
          'comment': result.data.comment,
          'id': result.data.id
        }];
        $('.comment-box').prepend(prepareTemplateRender('#blogCommentTemplate', data));
        $('#commentForm')[0].reset();
        displaySuccessMessage(result.message);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      processingBtn('#commentForm', '#submitBtn');
    }
  });
}

function updateComment() {
  var updateId = $('.comment-id').val();
  $.ajax({
    type: 'PUT',
    url: commentUrl + '/' + updateId + editCommentUrl,
    data: $('#commentForm').serialize(),
    success: function success(result) {
      $('#comment-' + updateId).html('');
      $('#comment-' + updateId).html(result.data.comment);
      $('#commentForm')[0].reset();
      $('.comment-id').val('');
      displaySuccessMessage(result.message);
      processingBtn('#commentForm', '#submitBtn');
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    }
  });
}

function postComment() {
  var count = $('#comment-count').text();
  var newCount = count.replace('(', '').replace(')', '');

  if (newCount == 0) {
    $('#post-comment').hide();
  }
}

postComment();
/******/ })()
;