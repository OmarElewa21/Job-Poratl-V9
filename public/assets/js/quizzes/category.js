/**
 * Helper Function
 */
 function adjust_class_selection(){
    let fas = document.getElementsByClassName('fas-add');
    for(let i=0; i<fas.length; i++){
        fas[i].classList.add('invisible');
        if(i == fas.length - 1){
            fas[i].classList.remove('invisible');
        }
    }
}

/**
 * Adding new selection category
 */
function addClass(){
    let cat_dev = $('#classes').clone(true);
    cat_dev.find('#class_name').val('');
    $('.classParentDiv').append(cat_dev);
    adjust_class_selection();
}



/**
 * Deleting selection category
 *  
 * @param {object} elem 
 */
function deleteClass(elem){
    if($('.fas-delete').length > 1){
        elem.parentElement.parentElement.remove();
        adjust_class_selection();
    }
    else{
        $("#classes").notify("Can't Have Less Than One Class");
    }
}


/**
 * 
 * @param {int} category_id 
 */
function show(category_id){
    $.ajax({
        url: "/admin/quizzes/category/" + category_id,
        type: 'GET',
        success: function (result) {
            $('#categoryModal').html(result);
            $('#categoryModal').appendTo('body').modal('show');
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        }
    })
}


function importExcel(submitUrl){
    $.ajax({
        url: "/admin/quizzes/category/loading/loadExcel",
        type: 'GET',
        data: {
            "submitUrl": submitUrl,
        },
        success: function (result) {
            $('#categoryModal').html(result);
            $('#categoryModal').appendTo('body').modal('show');
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        }
    })
}

let optionBox = {
    /**
     * Add Category
     * @param {int} category_id
     * @param {string} parent_or_child
    */
    add: (id, mode)=> {
        $.ajax({
            url: '/admin/quizzes/category/create',
            type: 'GET',
            data: {
                "id": id,
                "mode": mode
            },
            success: function (result) {
                $('#categoryModal').html(result);
                if(id == 0){
                    $('#categoryModal').appendTo('body').modal('show');
                }
            },
            error: function (result) {
                displayErrorMessage(result.responseText);
            },
        });
    },
    
    /**
     * Edit Category
     * @param {int} category_id
    */
    edit: (id)=> {
        $.ajax({
            url: '/admin/quizzes/category/' + id + '/edit',
            type: 'GET',
            success: function (result) {
                $('#categoryModal').html(result);
                adjust_class_selection();
            },
            error: function (result) {
                displayErrorMessage(result.responseText);
            },
        });
    },

    /**
     * @param {int} category_id
     */
    delete: (category_id)=> {
        $.confirm({
            title: 'Confirm!',
            content: 'Are You Sure, Do you want to remove this Category ? ',
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-blue',
                    action: function(){
                        $.ajax({
                            url: '/admin/quizzes/category/' + category_id,
                            type: 'DELETE',
                            success: function (result) {
                                displaySuccessMessage(result);
                                $('#categoryModal').modal('hide');
                                $(".card").load(window.location + " .card-body");
                            },
                            error: function (result) {
                                displayErrorMessage(result.responseText);
                            },
                        });
                    }
                },
                No: {
                    text: 'No',
                    action: function(){
                    }
                }
            }
        });
    }
}

/**
 * End Main Functions
 * Start Main Flow
 */
$(document).on('submit', '#addCategoryForm', function (e) {
    e.preventDefault();
    processingBtn('#addCategoryForm', '#btnSave', 'loading');
    e.preventDefault();
    $.ajax({
        url: categorySaveUrl,
        type: 'POST',
        data: $(this).serialize(),
        success: function (result) {
            displaySuccessMessage(result);
            $('#categoryModal').modal('hide');
            $(".card").load(window.location + " .card-body");
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        },
        complete: function () {
            processingBtn('#addCategoryForm', '#btnSave');
        },
    });
});

$(document).on('submit', '#editCategoryForm', function (e) {
    e.preventDefault();
    processingBtn('#editCategoryForm', '#btnSave', 'loading');
    e.preventDefault();
    $.ajax({
        url: '/admin/quizzes/category/' + $('#cat_id').val(),
        type: 'PUT',
        data: $(this).serialize(),
        success: function (result) {
            displaySuccessMessage(result);
            $('#categoryModal').modal('hide');
            $(".card").load(window.location + " .card-body");
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        },
        complete: function () {
            processingBtn('#editCategoryForm', '#btnSave');
        },
    });
});
