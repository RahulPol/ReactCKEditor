$(function () {

    var validateQuestion = function () {
        if (CKEDITOR.instances.question.getData().length == 0) {
            console.log('Please fill in the question');
        }
    }

    $('#saveQuestion').on('click', function () {
        validateQuestion();

        console.log(CKEDITOR.instances.question.getData());
    });
});