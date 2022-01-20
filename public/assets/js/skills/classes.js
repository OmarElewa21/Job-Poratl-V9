function importExcel(submitUrl){
    $.ajax({
        url: "/admin/quizzes/category/loading/loadExcel",
        type: 'GET',
        data: {
            "submitUrl": submitUrl,
        },
        success: function (result) {
            $('#classModal').html(result);
            $('#classModal').appendTo('body').modal('show');
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        }
    })
}


function classes(skill_id){
    $.ajax({
        url: "/admin/skills/" + skill_id + "/classes",
        type: 'GET',
        success: function (result) {
            $('#classModal').html(result);
            $('#classModal').appendTo('body').modal('show');
            adjust_class_selection();
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        }
    })
}


function adjust_class_selection(){
    let fas = document.getElementsByClassName('fas-add');
    for(let i=0; i<fas.length; i++){
        fas[i].classList.add('invisible');
        if(i == fas.length - 1){
            fas[i].classList.remove('invisible');
        }
    }
}


function deleteClass(element){
    if($('.fas-delete').length > 1){
        element.parentElement.parentElement.remove();
        adjust_class_selection();
    }
    else{
        $("#class-div").notify("Can't Have Less Than One Class");
    }
}


function addClass(){
    let class_dev = $('#class-div').clone(true);
    class_dev.find('.min_score_percentage').val('');
    class_dev.find('.max_score_percentage').val('');
    class_dev.find('.class_weight_from_skill').val('');
    $('.classParentDiv').append(class_dev);
    adjust_class_selection();
}


$(document).on('submit', '#skillClassesForm', function (e) {
    e.preventDefault();
    processingBtn('#skillClassesForm', '#btnSave', 'loading');
    e.preventDefault();
    $.ajax({
        url: '/admin/skills/' + $('#skill_id').val() + '/classes',
        type: 'POST',
        data: $(this).serialize(),
        success: (result)=> {
            displaySuccessMessage(result);
            $('#classModal').modal('hide');
            $(".card").load(window.location + " .card-body");
        },
        error: function (result) {
            displayErrorMessage(result.responseText);
        },
        complete: function () {
            processingBtn('#skillClassesForm', '#btnSave');
        },
    });
});
