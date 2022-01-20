'use strict';

// $(document).on('click', '.delete-btn', function (event) {
//     let inquiryId = $(event.currentTarget).attr('data-id');
//     swal({
//             title: Lang.get('messages.common.delete') + ' !',
//             text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.inquiry.inquiry') + '" ?',
//             type: 'warning',
//             showCancelButton: true,
//             closeOnConfirm: false,
//             showLoaderOnConfirm: true,
//             confirmButtonColor: '#6777ef',
//             cancelButtonColor: '#d33',
//             cancelButtonText: Lang.get('messages.common.no'),
//             confirmButtonText: Lang.get('messages.common.yes'),
//         },
//         function () {
//             window.livewire.emit('deleteInquiry', inquiryId);
//         });
// });
//
// document.addEventListener('delete', function () {
//     swal({
//         title: Lang.get('messages.common.deleted') + ' !',
//         text: Lang.get('messages.inquiry.inquiry') + Lang.get('messages.common.has_been_deleted'),
//         type: 'success',
//         confirmButtonColor: '#6777ef',
//         timer: 2000,
//     });
// });
$(document).ready(function () {
    var table = $('#inquiresTbl').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: inquiresUrl,
            type: 'GET',
        },
        columnDefs: [
            {
                'targets': [3],
                'orderable': false,
                'className': 'text-center',
            }],
        columns: [
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'subject',
                name: 'subject',
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
                    return prepareTemplateRender('#inquiresActionTemplate', [
                        {
                            'id': row.id,
                            'url': showInquiry + '/' + row.id,
                        }]);
                },
                name: 'id',
            },
        ],
    });
});
$(document).on('click', '.delete-btn', function (event) {
    let inqueryId = $(event.currentTarget).data('id');
    console.log(Lang.get('messages.inquiry.inquiry'));
    deleteItem(deleteInquiry + '/' + inqueryId, '#inquiresTbl', Lang.get('messages.inquiry.inquiry'));
});
