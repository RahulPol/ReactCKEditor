$(function () {

    var validateQuestion = function () {
        if (CKEDITOR.instances.question.getData().length == 0) {
            console.log('Please fill in the question');
        }
    }

    var validateOption = function (selector) {
        if (CKEDITOR.instances[selector].getData().length == 0) {
            console.log("Please fill the option ", selector);
        }
    }

    // var validateOptions = function () {
    //     $('#OptionBoard').find('.option-box').each(function () {
    //         validateOption($(this).attr('data-optionid'));
    //     })
    // }

    $('#saveQuestion').on('click', function () {
        validateQuestion();

        $('#OptionBoard').find('.option-box').each(function () {
            validateOption($(this).attr('data-optionid'));
        })

        validateOptions();
        console.log(CKEDITOR.instances.question.getData());
    });


});