$(document).ready(function (){

    var table = $('#postCommentsTbl').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: postCommentsUrl,
            type: 'GET',
        },
        columnDefs:[

        {
            'targets': [4],
            'orderable': false,
            'className':'text-center',
            'width':'5%'
        },
            {
                'targets': [5],
                'visible': false,
            },
        ],
        columns: [
            {
                data: function (row) {
                    let element = document.createElement('textarea');
                    element.innerHTML = row.post.title;
                    return '<a href="/posts/details/'+ row.post.id +'">' + element.value + '</a>';
                },
                name: 'post.title',
            },
            {
                data: function (row) {
                    let element = document.createElement('textarea');
                    let email = document.createElement('textarea');
                    element.innerHTML = row.name;
                    email.innerHTML = row.email;
                    return '<b>'+element.value+'</b><br><p>'+email.value+'</p>';
                },
                name: 'name',
            },
            {
                data: function (row) {
                    let comment = row.comment;
                    let commentLen = (row.comment).length;
                    if (commentLen > 50)
                    {
                        return comment.substr(0, 50)+'...'
                    }
                    return row.comment;
                },
                name: 'comment'
            },
            {
                data: function (row) {
                    return moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').
                    format('Do MMM, YYYY');
                },
                name: 'created_at',
            },
            {
                data: function (row) {
                    return prepareTemplateRender('#postCommentsActionTemplate',[{'id':row.id}]);
                },
                name: 'id'
            },
            {
                data: function () {
                    return '';
                },
                name: 'email',
            },
        ],
    });
});

$(document).on('click', '.delete-btn', function (event) {
    let jobId = $(event.currentTarget).data('id');
    deleteItem(deleteComment + '/' + jobId, '#postCommentsTbl', Lang.get('messages.post_comment.post_comment'));
});

$(document).on('click', '.show-btn', function (event) {
    if (ajaxCallIsRunning) {
        return;
    }
    ajaxCallInProgress();
    let commentId = $(event.currentTarget).attr('data-id');
    $.ajax({
        url: showComment + '/' + commentId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#postTitle,#postComment,#postUser,#postEmail,#postCreatedOn').html('');
                $('#postTitle').append(result.data.post.title);
                $('#postComment').append(result.data.comment);
                $('#postUser').append(result.data.name);
                $('#postEmail').append(result.data.email);
                let created_on = moment(result.data.created_at).fromNow();
                $('#postCreatedOn').append(created_on);
                $('#showModal').appendTo('body').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});
