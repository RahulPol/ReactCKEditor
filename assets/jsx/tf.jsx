/// <reference path="../../typings/jquery/jquery.d.ts" />

 $(function(){
        var optionArray = ['A','B','C','D','E','F','G','H'];
        var optionCount = 0;        
        window.trueFalseOptions = [];

        var initializeQuestionBoard = function () {            
            ReactDOM.render(
                <QeustionBoard id="question"></QeustionBoard>,
                document.getElementById('QeustionBoard')
            );    
        };

        var initializeTrueFalseOptions = function(){    
 
            var trueId = "option-A";
            var falseId = "option-B";

            $("#OptionBoard").append('<div class="truefalse-option" id="option-id-A" />');

            var trueOption =  ReactDOM.render(
                    <Option uniqueId={trueId} key="0" optionText="A" optionValue="True" questionType='TrueFalse'></Option>,
                    document.getElementById('option-id-A')
                );
                
            $("#OptionBoard").append('<div class="truefalse-option" id="option-id-B" />');                
            var falseOption =  ReactDOM.render(
                    <Option uniqueId={falseId} key="1" optionText="B" optionValue="False" questionType='TrueFalse'></Option>,
                    document.getElementById('option-id-B')
                );
            window.trueFalseOptions.push(trueOption);
            window.trueFalseOptions.push(falseOption);

        };

        

        initializeQuestionBoard();        
        initializeTrueFalseOptions();
        

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

        $('#saveQuestion').on('click', function () {
            validateQuestion();

            $('#OptionBoard').find('.option-box').each(function () {
                validateOption($(this).attr('data-optionid'));
            })

            
        });

        $('#mcq').on('click',function(){
            var mcqUrl = window.location.protocol + "//" +  window.location.hostname + "/ReactCKEditor/mcq.html"
            window.location.href = mcqUrl;
        });

        $('#truefalse').on('click',function(){
            var mcqUrl = window.location.protocol + "//" +  window.location.hostname + "/ReactCKEditor/tf.html"
            window.location.href = mcqUrl;
        });

        
    })
        