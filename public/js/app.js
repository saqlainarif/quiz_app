var app_url = $('meta[name="app-url"]').attr('content');
jQuery(function ($) {

    $("#QForm").validate({
        rules: {
            answer: {
                required: true
            }
        }
    });

});

function SaveAnswer(id,result_id) {
    if ($("#QForm").valid()) {
        var answer = $("input[name='answer']:checked").val();
        $.ajax({
            url: app_url + '/save_answer',
            method: 'POST',
            type: 'json',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                question_id: id,
                result_id: result_id,
                user_selection: answer
            },
            success: function (res) {
                // console.log(res)
                if (res.data.status == 1) {
                    getNextQuestion(id,result_id);
                } else {
                    alert('Error while getting next question.');
                }

            }, errors: function (err) {
                alert(error);
            }
        });
    }
}

function skipQuestion(id, result_id) {
    $.ajax({
        url: app_url + '/skip_question',
        method: 'POST',
        type: 'json',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            question_id: id,
            result_id: result_id
        },
        success: function (res) {
            if (res.data.status == 1) {
                getNextQuestion(id,result_id);
            } else {
                alert('You can\'t skip more than 10 questions.');
            }

        }, errors: function (err) {
            alert(error);
        }
    });
}

function getNextQuestion(id,result_id) {
    $.ajax({
        url: app_url + '/getnext',
        method: 'POST',
        type: 'json',
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            question_id: id,
            result_id: result_id
        },
        success: function (res) {
            if (res.data.status == 1) {
                $("#questionDiv").html(res.data.html);
            } else {
                window.location = app_url + '/compile_result/'+result_id;
            }
        }, errors: function (err) {
            alert(error);
        }
    });
}
