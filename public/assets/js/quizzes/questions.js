/* 
* Helper Functions
*/
function settings_adjust(){
    let last_answer = document.getElementsByClassName('answer-fas-plus');
    let answer_weight = document.getElementsByClassName('answer_weight');

    for(let i=0; i<last_answer.length; i++){
        last_answer[i].classList.remove('last_answer');
        if(i == last_answer.length - 1){
            last_answer[i].classList.add('last_answer');
        }
        answer_weight[i].setAttribute('name', 'answer_weight[' + i + ']')
    }
}

function settings_adjust_foredit(){
    let last_answer = document.getElementsByClassName('i-add');
    let answer_weight = document.getElementsByClassName('answer_weight-foredit');

    for(let i=0; i<last_answer.length; i++){
        last_answer[i].classList.remove('last_answer');
        if(i == last_answer.length - 1){
            last_answer[i].classList.add('last_answer');
        }
        answer_weight[i].setAttribute('name', 'answer_weight[' + i + ']')
    }
}

function add_answer(){
    let answer_element = $('.answer-box').first().clone(true);
    answer_element.find('.text-area').val("");
    answer_element.find('.answer_weight').val("");
    answer_element.find('.answer-fas-plus').addClass('last_answer')
    $('#answers').append(answer_element);
    settings_adjust()
}

function remove_answer(element){
    if(document.getElementsByClassName('answer-box').length > 2){
        element.parentElement.parentElement.remove();
    }
    else{
        $("#answers").notify("Can't Have Less Than Two Answers");
    }
    settings_adjust()
}

function add_answer_foredit(){
    let answer_element = $('.answer-box_edit').first().clone(true);
    answer_element.find('.text-area').val("");
    answer_element.find('.answer_weight-foredit').val("");
    answer_element.find('.answer-fas-plus').addClass('last_answer')
    $('#answers_edit').append(answer_element);
    settings_adjust_foredit()
}

function remove_answer_foredit(element){
    if(document.getElementsByClassName('answer-box_edit').length > 2){
        element.parentElement.parentElement.remove();
    }
    else{
        $("#answers_edit").notify("Can't Have Less Than Two Answers");
    }
    settings_adjust_foredit()
}

let questions = {
    /**
     * Add Question
     * @param {int} categoryId 
     * @param {boolean} from_question_index
     */
    add: (categoryId, from_question_index=false)=> {
        $.ajax({
            url: '/admin/quizzes/question/create',
            type: 'GET',
            data: {category_id: categoryId},
            success: function (result) {
                $('#categoryModal').html(result);
                if(from_question_index){
                    $('#categoryModal').appendTo('body').modal('show');
                    $('#back-btn').addClass('d-none');
                    $('.close').removeClass('d-none');
                }
                adjust_class_selection();
            },
            error: function (result) {
                displayErrorMessage(result.responseText);
            },
        });
    },

    /**
     * Edit Category
     * @param {int} question_id
    */
    edit: (question_id)=> {
        $.ajax({
            url: '/admin/quizzes/question/' + question_id + '/edit',
            type: 'GET',
            success: function (result) {
                $('#categoryModal').html(result);
                $('#categoryModal').appendTo('body').modal('show');
                settings_adjust_foredit();
            },
            error: function (result) {
                displayErrorMessage(result.responseText);
            },
        });
    },

    /**
     * @param {int} question_id
     */
    delete: (question_id)=> {
        $.confirm({
            title: 'Confirm!',
            content: 'Are You Sure, Do you want to remove this question? ',
            buttons: {
                Yes: {
                    text: 'Yes',
                    btnClass: 'btn-blue',
                    action: function(){
                        $.ajax({
                            url: '/admin/quizzes/question/' + question_id,
                            type: 'DELETE',
                            success: function (result) {
                                displaySuccessMessage(result);
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
    },
}

/**
 * End Main Functions
 * Start Main Flow
 */
$(document).on('submit', '#addNewQuestionForm', function (e) {
    e.preventDefault();
    processingBtn('#addNewQuestionForm', '#btnSave', 'loading');
    e.preventDefault();
    $.ajax({
        url: '/admin/quizzes/question',
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
            processingBtn('#editCategoryForm', '#btnSave');
        },
    });
});

$(document).on('submit', '#editQuestionForm', function (e) {
    e.preventDefault();
    processingBtn('#editQuestionForm', '#btnSave', 'loading');
    e.preventDefault();
    $.ajax({
        url: '/admin/quizzes/question/' + $('#question_id').val(),
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
