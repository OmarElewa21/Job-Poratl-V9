/**
 * Helper Function
 */
function adjust_category_selection(){
    let fas = document.getElementsByClassName('fas-add');
    for(let i=0; i<fas.length; i++){
        fas[i].classList.add('invisible');
        if(i == fas.length - 1){
            fas[i].classList.remove('invisible');
        }
    }
}


function checkForDontShowInputs(){
    $(".donnotShowCheckbox").each(function(){
        if($(this).is(":checked")){
            $(this).attr('name', 'show[' + $(this).parent().siblings('.category_name').val() + ']');
        }
        
    })
}

/**
 * Adding new selection category
 */
function addCategory(){
    let cat_dev = $('#category-div').clone(true);
    cat_dev.find('.n_questions').val('');
    cat_dev.find('#donnotShowCheckbox').prop("checked", false);
    $('.categoryParentDiv').append(cat_dev);
    adjust_category_selection();
}



/**
 * Deleting selection category
 *  
 * @param {object} elem 
 */
function deleteCategory(elem){
    if($('.fas-delete').length > 1){
        elem.parentElement.parentElement.remove();
        adjust_category_selection();
    }
    else{
        $("#category-div").notify("Can't Have Less Than One Category");
    }
}


function add_signs(quiz_id){
    $.ajax({
        url: '/admin/quizzes/quiz/' + quiz_id + '/add_signs',
        type: 'GET',
        success: function (result) {
            $('#quizModal').html(result);
            $('#quizModal').appendTo('body').modal('show');
            ranges.adjustRangeRows();
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        }
    });
}


function importExcel(submitUrl){
    $.ajax({
        url: "/admin/quizzes/category/loading/loadExcel",
        type: 'GET',
        data: {
            "submitUrl": submitUrl,
        },
        success: function (result) {
            $('#quizModal').html(result);
            $('#quizModal').appendTo('body').modal('show');
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        }
    })
}

function showGrades(quiz_id, user_id, take_number, is_guest=0){
    $.ajax({
        url: "/admin/quizzes/quiz/" + quiz_id + "/grade",
        type: 'GET',
        data: {
            'user_id': user_id,
            'take_number': take_number,
            'is_guest': is_guest 
        },
        success: function (result) {
            $('#gradesModel').html(result);
            $('#gradesModel').appendTo('body').modal('show');
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        }
    })
}


function showdetailedGrades(quiz_id, user_id, take_number, is_guest=0){
    $.ajax({
        url: "/admin/quizzes/quiz/" + quiz_id + "/detailedGrades",
        type: 'GET',
        data: {
            'user_id': user_id,
            'take_number': take_number,
            'is_guest': is_guest
        },
        success: function (result) {
            $('#gradesModel').html(result);
            $('#gradesModel').appendTo('body').modal('show');
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        }
    })
}


function showUser(user_id, is_guest=0){
    $.ajax({
        url: "/admin/quizzes/quiz/" + user_id + "/user/" + is_guest,
        type: 'GET',
        success: function (result) {
            $('#gradesModel').html(result);
            $('#gradesModel').appendTo('body').modal('show');
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        }
    })
}

function showSkills(quiz_id, user_id, take_number, is_guest=0){
    $.ajax({
        url: "/admin/quizzes/quiz/" + quiz_id + "/skills/show",
        type: 'GET',
        data: {
            'user_id': user_id,
            'take_number': take_number,
            'is_guest': is_guest
        },
        success: function (result) {
            $('#gradesModel').html(result);
            $('#gradesModel').appendTo('body').modal('show');
            skillMatchingSet(quiz_id, user_id, take_number, is_guest=0);
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        }
    })
}


function skillMatchingSet(quiz_id, user_id, take_number, is_guest=0){
    let allSelects = document.getElementById('skillSelectionForm').querySelectorAll("input[class='select']");
    let selectAll = document.getElementById("select-all");
    selectAll.addEventListener('change', ()=>{
        if(document.getElementById("select-all").checked == true){
            let skillIdsList = [];
            [].forEach.call(allSelects, (selectElement)=>{
                selectElement.checked = true;
                skillIdsList.push(selectElement.value);
            });
            $.ajax({
                url: "/admin/quizzes/quiz/" + quiz_id + "/skills/show",
                type: 'GET',
                data: {
                    'user_id'     : user_id,
                    'take_number' : take_number,
                    'is_guest'    : is_guest,
                    'skillIdsList': skillIdsList
                },
                success: function (result) {
                    $('#gradesModel').html(result);
                    $('#gradesModel').appendTo('body').modal('show');
                    skillMatchingSet(quiz_id, user_id, take_number, is_guest=0);
                },
                error: function (result) {
                    displayErrorMessage(result.responseText);
                }
            })
        }
    });
    
    [].forEach.call(allSelects, (selectElement)=>{
        selectElement.addEventListener('change', ()=>{
            let skillIdsList = [];
            let selects = document.querySelectorAll("input[class='select']:checked");
            [].forEach.call(selects, (select)=>{
                skillIdsList.push(select.value);
            });
            $.ajax({
                url: "/admin/quizzes/quiz/" + quiz_id + "/skills/show",
                type: 'GET',
                data: {
                    'user_id'     : user_id,
                    'take_number' : take_number,
                    'is_guest'    : is_guest,
                    'skillIdsList': skillIdsList
                },
                success: function (result) {
                    $('#gradesModel').html(result);
                    $('#gradesModel').appendTo('body').modal('show');
                    skillMatchingSet(quiz_id, user_id, take_number, is_guest=0);
                },
                error: function (result) {
                    displayErrorMessage(result.responseText);
                }
            })
        });
    });
}

function skillCardSorting(){
    selectedVal = $( "#sortingSelect option:selected" ).val();
    switch(selectedVal){
        case "random":
            $("#skillListContainer").html("");
            Object.entries(skillCards).sort(function(a, b){
                return 0.5 - Math.random()
            }).forEach((elem)=>{$("#skillListContainer").append(elem[1])});
        break;
        
        case "heighest":
            $("#skillListContainer").html("");
            Object.entries(skillCards).sort(function(a, b){
                return b[1].querySelector('.progress').ariaValueNow - a[1].querySelector('.progress').ariaValueNow
            }).forEach((elem)=>{$("#skillListContainer").append(elem[1])});
        break;
        
        case "lowest":
            $("#skillListContainer").html("");
            Object.entries(skillCards).sort(function(a, b){
                return a[1].querySelector('.progress').ariaValueNow - b[1].querySelector('.progress').ariaValueNow
            }).forEach((elem)=>{$("#skillListContainer").append(elem[1])});
        break;
        default:
    }
}


$('#gradesTbl').DataTable({
    order: [[0, 'asc']],
    rowGroup: {
        dataSrc: 1
    },
    columnDefs: [{
        "targets": [2,4,5],
        "orderable": false
    }]
});


let ranges = {
    /**
     * @summary keep only one plus add element in the form
     */
    adjustRangeRows: ()=> {
        let fas = document.getElementsByClassName('fas-add');
        for(let i=0; i<fas.length; i++){
            fas[i].classList.add('invisible');
            if(i == fas.length - 1){
                fas[i].classList.remove('invisible');
            }
        }
    },

    /**
     * @summary add range to category
     * 
     * @param {int} quiz_id 
     * @param {int} category_id 
     */
    add: (quiz_id, category_id)=> {
        $.ajax({
            url: '/admin/quizzes/quiz/' + quiz_id + '/add_range/' + category_id,
            type: 'GET',
            success: function (result) {
                $('#quizModal').html(result);
                $('#quizModal').appendTo('body').modal('show');
                ranges.adjustRangeRows();
            },
            error: function (result) {
                displayErrorMessage(result.responseText);
            }
        });
    },

    addRangeRow: ()=> {
        let div = $('#target').clone(true);

        div.find('.range_min').val('');
        div.find('.range_max').val('');
        div.find('.range_sign').val('');

        $('.parentTarget').append(div);

        ranges.adjustRangeRows();
    },

    /**
     * 
     * @param {obj} elem 
     */
    removeRangeRow: (elem)=> {
        if($('.fas-delete').length > 1){
            elem.parentElement.parentElement.remove();
            ranges.adjustRangeRows();
        }
        else{
            $(".parentTarget").notify("Can't Have Less Than One Range");
        }
    }
}


let skills = {
    skills: (quiz_id)=>{
        $.ajax({
            url: '/admin/quizzes/quiz/' + quiz_id + '/skills',
            type: 'GET',
            success: function (result) {
                $('#quizModal').html(result);
                $('#quizModal').appendTo('body').modal('show');
                ranges.adjustRangeRows();
            },
            error: function (result) {
                displayErrorMessage(result.responseText);
            }
        });
    },

    addSkillRow: ()=>{
        let div = $('#target').clone(true);

        $('.parentTarget').append(div);

        ranges.adjustRangeRows();
    },

    removeSkillRow: (elem)=>{
        if($('.fas-delete').length > 1){
            elem.parentElement.remove();
            ranges.adjustRangeRows();
        }
        else{
            $(".parentTarget").notify("Can't Have Less Than One Skill");
        }
    }
}


let quizzes = {
    add: ()=> {
        $.ajax({
            url: '/admin/quizzes/quiz/create',
            type: 'GET',
            success: function (result) {
                $('#quizModal').html(result);
                $('#quizModal').appendTo('body').modal('show');
            },
            error: function (result) {
                displayErrorMessage(result.responseText);
            }
        })
    },

    edit : (id)=> {
        $.ajax({
            url: '/admin/quizzes/quiz/' + id + '/edit',
            type: 'GET',
            success: function(result) {
                $('#quizModal').html(result);
                $('#quizModal').appendTo('body').modal('show');
                adjust_category_selection();
            },
            error: function (result) {
                displayErrorMessage(result.responseText);
            }
        })
    },

    delete: (id)=> {
        $.confirm({
            title: 'Confirm!',
            content: 'Are You Sure, Do you want to delete this quiz ? ',
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-blue',
                    action: function(){
                        $.ajax({
                            url: '/admin/quizzes/quiz/' + id,
                            type: 'DELETE',
                            success: (result)=> {
                                displaySuccessMessage(result);
                                $(".card").load(window.location + " .card-body");
                            },
                            error: (result)=> {
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
    },

    assignUsers: (quiz_id)=>{
        $.ajax({
            url: '/admin/users/candidates/' + quiz_id,
            type: 'GET',
            success: function(result) {
                $('#quizModal').html(result);
                $('#quizModal').appendTo('body').modal('show');
            },
            error: function (result) {
                displayErrorMessage(result.responseText);
            }
        })
    }
}

$(document).on('submit', '#addQuizForm', function (e) {
    e.preventDefault();
    processingBtn('#addQuizForm', '#btnSave', 'loading');
    e.preventDefault();
    checkForDontShowInputs();
    $.ajax({
        url: '/admin/quizzes/quiz',
        type: 'POST',
        data: $(this).serialize(),
        success: (result)=> {
            displaySuccessMessage(result);
            $('#quizModal').modal('hide');
            $(".card").load(window.location + " .card-body");
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        },
        complete: function () {
            processingBtn('#addQuizForm', '#btnSave');
        },
    });
});

$(document).on('submit', '#editQuizForm', function (e) {
    e.preventDefault();
    processingBtn('#editQuizForm', '#btnSave', 'loading');
    e.preventDefault();
    checkForDontShowInputs();
    $.ajax({
        url: '/admin/quizzes/quiz/' + $('#quiz_id').val(),
        type: 'PUT',
        data: $(this).serialize(),
        success: (result)=> {
            displaySuccessMessage(result);
            $('#quizModal').modal('hide');
            $(".card").load(window.location + " .card-body");
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        },
        complete: function () {
            processingBtn('#editQuizForm', '#btnSave');
        },
    });
});

$(document).on('submit', '#addRangeForm', function (e) {
    e.preventDefault();
    processingBtn('#addRangeForm', '#btnSave', 'loading');
    e.preventDefault();
    $.ajax({
        url: '/admin/quizzes/quiz/' + $('#quiz_id').val() + '/add_range/' + $('#category_id').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: (result)=> {
            displaySuccessMessage(result);
            $('#quizModal').modal('hide');
            $(".card").load(window.location + " .card-body");
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        },
        complete: function () {
            processingBtn('#addRangeForm', '#btnSave');
        },
    });
});


$(document).on('submit', '#addSignsForm', function (e) {
    e.preventDefault();
    processingBtn('#addSignsForm', '#btnSave', 'loading');
    e.preventDefault();
    $.ajax({
        url: '/admin/quizzes/quiz/' + $('#quiz_id').val() + '/store_signs',
        type: 'POST',
        data: $(this).serialize(),
        success: (result)=> {
            displaySuccessMessage(result);
            $('#quizModal').modal('hide');
            $(".card").load(window.location + " .card-body");
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        },
        complete: function () {
            processingBtn('#addSignsForm', '#btnSave');
        },
    });
});


$(document).on('submit', '#skillsForm', function (e) {
    e.preventDefault();
    processingBtn('#skillsForm', '#btnSave', 'loading');
    e.preventDefault();
    $.ajax({
        url: '/admin/quizzes/quiz/' + $('#quiz_id').val() + '/store_skills',
        type: 'POST',
        data: $(this).serialize(),
        success: (result)=> {
            displaySuccessMessage(result);
            $('#quizModal').modal('hide');
            $(".card").load(window.location + " .card-body");
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        },
        complete: function () {
            processingBtn('#skillsForm', '#btnSave');
        },
    });
});


$(document).on('submit', '#loadCandidatesForm', function (e) {
    e.preventDefault();
    processingBtn('#loadCandidatesForm', '#btnSave', 'loading');
    e.preventDefault();
    $.ajax({
        url: '/admin/users/candidates/' + $('#quiz_id').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: (result)=> {
            displaySuccessMessage(result);
            $('#quizModal').modal('hide');
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        },
        complete: function () {
            processingBtn('#loadCandidatesForm', '#btnSave');
        },
    });
});
