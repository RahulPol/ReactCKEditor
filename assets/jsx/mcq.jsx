/// <reference path="../../typings/jquery/jquery.d.ts" />

 $(function(){
        var optionArray = ['A','B','C','D','E','F','G','H'];
        var optionCount = 0;
        window.mcqOptions = [];

        var initializeQuestionBoard = function () {            
            ReactDOM.render(
                <QeustionBoard id="question"></QeustionBoard>,
                document.getElementById('QeustionBoard')
            );    
        };

        var initializeMCQOptions = function(){ 

            optionArray.map(function(option,i){                
                if(i<=3){
                    var id = "option-" + option;
                                                                         
                    $("#OptionBoard").append('<div class="mcq-option" id="option-id-'+ option +'" />');

                     var mcqOption =  ReactDOM.render(
                            <Option uniqueId={id} key={i} optionText={option} questionType='MCQ'></Option>,
                            document.getElementById('option-id-'+ option +'')
                        );
                    
                    window.mcqOptions.push(mcqOption);
                    
                }   
            })
            
        };

        

        initializeQuestionBoard();        
        initializeMCQOptions();
        

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
        