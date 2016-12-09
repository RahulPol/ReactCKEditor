<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@include('company-admin/ca-css-tags')

<style>

.widget-bg {
			//background-color: #000;
			padding: 0px;
			overflow:auto;
			
		}
		.remove-widget {
			color: #fff;
			position: absolute;
			font-size: 12px;
			z-index: 100;
			right:40px;
			background-color:rgba(0,0,0,0.4);
			padding:5px;
		}
		.remove-widget:hover, .mark-answer:hover {
			color: #fff;
			background-color:rgba(0,0,0,1);
		}
		.mark-answer {
			color: #fff;
			position: absolute;
			font-size: 12px;
			z-index: 100;
			right:70px;
			background-color:rgba(0,0,0,0.4);
			padding:5px;
		}
		
		.mark-answer.btn-success { background-color: #00a65a !important;}
		
		textarea {
			resize: vertical;
		}

</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.2.1/react.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.2.1/react-dom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.34/browser.min.js"></script>
    <script type="text/babel" src="{{ URL::asset('js/jsx/question-components.jsx') }}"></script>

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
@include('company-admin/ca-header')
@include('company-admin/ca-sidemenu')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Insert New Question
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ URL::route('company-admin-dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Insert New Question</li>
      </ol>
    </section>

    <!-- Main content -->
    <form method="post">
    <section class="content">

		<div class="row">
			<div class="col-xs-12 col-sm-6 col-sm-offset-3">
						<div id="userMessages"></div>
						<!--<div class="alert alert-success alert-dismissible">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							<h4><i class="icon fa fa-check"></i> Question Inserted Successfully!</h4>
						</div>


						<div class="alert alert-danger alert-dismissible">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							<h4><i class="icon fa fa-check"></i> Error Title</h4>
							Error Description.
						  </div>-->
			</div>
		</div>
			  
      <!-- Small boxes (Stat box) -->
      
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-sm-6">
		
			<div class="box box-solid">
				
				<div class="box-header with-border text-center">
				  <h3 class="box-title">Category</h3>
				</div>
				
				<div class="box-body">
						<select class="form-control" name="category_id" id="category_selection">
							<option value="null">-- Select Category --</option>
							<!--<option value="1">C Programming</option>
							<option value="2">Java Programming</option>
							<option value="3">Verbal Ability</option>
							<option value="4">Database</option>
							<option value="5">Quantitative Aptitude</option>
							<option value="7">Logical Reasoning</option>-->
						  						  
						</select>				
				</div>
				
				<!-- /.box-body -->
			</div>		

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-sm-6">
		
			<div class="box box-solid">
				
				<div class="box-header with-border text-center">
				  <h3 class="box-title text-center">Chapter</h3>
				</div>
				
				<div class="box-body">
				
					<select class="form-control" name="chapter_id" id="chapter_selection">
						  <option value="null">-- Select Chapter --</option>
						  							<!--<option value="3">OCPJP</option>
						  							<option value="4">Language Fundamentals</option>
						  							<option value="5">Declarations and Access Control</option>
						  							<option value="6">Synonyms</option>
						  							<option value="7">Introduction to Database</option>
						  							<option value="9">The Relational Model and Normalization</option>
						  							<option value="10">Operators and Assignments</option>
						  							<option value="11"> Data Modeling with ER Model</option>
						  							<option value="12"> Logical Sequence of Words</option>
						  							<option value="13"> SQL for Database Construction </option>
						  							<option value="14">Managing Multiuser Databases</option>
						  							<option value="15">Introduction to SQL</option>
						  							<option value="16"> Analogy</option>
						  							<option value="17">Train Problems</option>
						  							<option value="18">Permutation and Combination</option>
						  							<option value="19">Flow Control</option>
						  							<option value="20">Exceptions</option>
						  							<option value="21"> Database Design Using Normalization</option>
						  							<option value="23"> Antonyms</option>
						  							<option value="24">Expressions in C</option>
						  							<option value="25">Introduction to OS</option>
						  							<option value="26">Pointers</option>
						  							<option value="27">Data Models into Database Designs</option>
						  							<option value="28">Time and Distance</option>
						  							<option value="29">Ratio and Proportion</option>
						  							<option value="30"> Profit and Loss</option>
						  							<option value="31">Sentence Formation</option>
						  							<option value="36">Structures, Unions, Enums</option>
						  							<option value="38">Arrays</option>
						  							<option value="39">Typedef</option>
						  							<option value="40">Control Instructions</option>
						  							<option value="41">Strings</option>
						  							<option value="42">Functions</option>
						  							<option value="43">Bitwise Operators</option>
						  							<option value="50">Completing Statements</option>
						  							<option value="51">Ordering of Sentences</option>
						  							<option value="52">Idioms and Phrases</option>
						  							<option value="53">Sentence Improvement</option>
						  							<option value="54">Spellings</option>
						  							<option value="55">Simplification </option>
						  							<option value="56">Alligation or Mixture</option>
						  							<option value="57">Verbal Analogies</option>
						  							<option value="58">Area</option>
						  							<option value="59">Surds and Indices</option>
						  							<option value="60"> C Preprocessor</option>
						  							<option value="61">H.C.F and L.C.M</option>
						  							<option value="62">Pipes and Cistern</option>
						  							<option value="63">Number Series</option>
						  							<option value="64">Encode Decode</option>
						  							<option value="65">Letter and Symbol Series</option>
						  							<option value="66">Logical Puzzles</option>
						  							<option value="67">Verbal Reasoning</option>
						  							<option value="68">Spelling Check</option>
						  							<option value="69">Basic Maths</option>
						  							<option value="70">Probability &amp; Statistics</option>
						  							<option value="71">Series/Series Completion</option>
						  							<option value="72">Coding Decoding</option>
						  							<option value="73">Blood Relation</option>
						  							<option value="74">Puzzle</option>
						  							<option value="75">Grammatical Errors</option>
						  							<option value="76">Word Replacement</option>
						  							<option value="77">Fill in the blanks</option>-->
						  						  
						</select>				
				
				</div>
				
				<!-- /.box-body -->
			</div>	

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
		
		
		<div class="row">
			<section class="col-sm-6">
				<div class="box box-solid">
				
					<div class="box-header with-border text-center">
					  <h3 class="box-title text-center">Question</h3>
					</div>
					
					<div class="box-body">

						<div class="form-group">
							<label>Question Heading</label>
							<input type="text" id="questionHeader" name="questionHeader" placeholder="Example: What is the output of the program given below?" class="form-control form-field-check" required="">
						</div>
						
						<hr>
						
						<div class="text-center">
								<button onclick="addQuestionEditor()" id="q-editor-button" class="btn btn-sm btn-default" type="button"><i class="fa fa-plus-square" aria-hidden="true"></i> Text/Equations</button>
								<button onclick="addQuestionCode()" id="q-editor-button" class="btn btn-sm btn-default" type="button"><i class="fa fa-plus-square" aria-hidden="true"></i> Code Editor</button>

								<!-- <div class="btn-group">
								  <button id="q-language-button" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" class="btn btn-sm btn-default dropdown-toggle" type="button">
									<i class="fa fa-plus-square" aria-hidden="true"></i><span id="language-title"> Code Editor Type</span>&nbsp;<span class="caret"></span>
								  </button>
								  <ul id="q-language-select" class="dropdown-menu">
									<li><a onclick="codeEditor('JAVA','0')" href="#">Java</a></li>
									<li><a onclick="codeEditor('CPP','0')" href="#">C++</a></li>
								  </ul>
								</div> -->	

						</div>
						
						<hr>
						<div id="questionBody">
						<!-- <div class="well widget-bg"><button type="button" class="remove-widget btn" onclick=""><i class="fa fa-trash" aria-hidden="true"></i></button>
						<textarea required name="editorID" id="editorID" rows="8" cols="50"></textarea>
						</div> -->
						<div id="questionBodyStart"></div>

						<div class="form-group">
							<label>Question Footer</label>
							<input type="text" id="questionFooter" name="questionFooter" placeholder="Example: Select three options" class="form-control form-field-check">
						</div>
						
						<hr>
						
						<div class="form-group">
							<label>Maximum Marks</label>
							<input type="number" id="maxMarks" name="maxMarks" placeholder="Maximum Marks" min="1" class="form-control form-field-check">
						</div>
						
						
								
					</div>
				</div>
			</section>
			
			<section class="col-sm-6">
				<div class="box box-solid">
				
					<div class="box-header with-border text-center">
					  <h3 class="box-title text-center">Answer</h3>
					</div>
					
					<div class="box-body">
					
						<div class="text-center">
							<button onclick="addOptionEditor()" id="option-button" class="btn btn-sm btn-default" type="button"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Option</button>
							
							<button onclick="addOptionCode()" id="code-input-button" class="btn btn-sm btn-default" type="button"><i class="fa fa-plus-square" aria-hidden="true"></i> Code Editor</button>
							<!-- <div class="btn-group">
							  <button id="q-language-button" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" class="btn btn-sm btn-default dropdown-toggle" type="button">
								<i class="fa fa-plus-square" aria-hidden="true"></i><span id="language-title"> Code Editor Type</span>&nbsp;<span class="caret"></span>
							  </button>
							  <ul id="q-language-select" class="dropdown-menu">
								<li><a onclick="codeEditor('JAVA','0')" href="#">Java</a></li>
								<li><a onclick="codeEditor('CPP','0')" href="#">C++</a></li>
							  </ul>
							</div> -->
							
							<button onclick="addOptionTextUserInput()" id="user-input-button" class="btn btn-sm btn-default" type="button"><i class="fa fa-plus-square" aria-hidden="true"></i> User Input</button>
						
						</div>
						
						<hr>
						
						<div class="options" id="myOption">
						<!-- <h5>&nbsp;&nbsp;Option One</h5>
						<div class="well widget-bg">
						<button type="button" class="remove-widget btn" onclick=""><i class="fa fa-trash" aria-hidden="true"></i></button><button type="button" class="mark-answer btn" onclick=""><i class="fa fa-check" aria-hidden="true"></i></button>
						
						<textarea required name="editorID" id="editorID2" rows="5" cols="50"></textarea> 
						</div> -->
						</div>
						<div id="user-code-input"></div>
						<!-- <div class="answer-code" id="myCode"> -->
						<!-- <div class="well widget-bg" id="widget-id-editorID">
						<h5>&nbsp;&nbsp;Code Structure</h5>
						<button type="button" class="remove-widget btn" onclick=""><i class="fa fa-trash" aria-hidden="true"></i></button>
						<div id="code-type-2">// Enter your code here</div>
						</div> -->
						<!-- </div> -->
						
						<hr>
						<div id="user-text-input"></div>

<!-- 						<div class="callout callout-success">
						<button type="button" class="remove-widget btn" onclick=""><i class="fa fa-trash" aria-hidden="true"></i></button>

						<p>User Input Added: 2</p>
						
						</div>
						
						
						<div class="form-group">
							<label>User Input One</label>
							<textarea class="form-control" placeholder="Answer for user input one" required></textarea>
						</div>
						
						<div class="form-group">
							<label>User Input Two</label>
							<textarea class="form-control" placeholder="Answer for user input two" required></textarea>
						</div> -->
						
						
						
					
					</div>
				</div>
			</section>
		
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-3 col-sm-offset-4">
				<button class="btn btn-primary btn-flat btn-block" type="submit">Add Question</button>
			</div>
		</div>
		
    </section>
    </form>
    <!-- /.content -->
  </div>
  
  
@include('company-admin/ca-footer')
</div>
</body>

<script type="text/babel">

	window.MessageBox = React.createClass({
		render: function(){
			var customClass = "";
			if(this.props.type == "success"){
				customClass = "alert alert-success alert-dismissible";
			}else if(this.props.type == "error"){
				customClass = "alert alert-danger alert-dismissible";
			}
			var descObj = {__html: this.props.description};
			return (
				<div className={customClass} >
					<button aria-hidden="true" data-dismiss="alert" className="close" type="button">×</button>
					<h4><i className="icon fa fa-check"></i>{this.props.title}</h4>
					<div dangerouslySetInnerHTML={descObj}></div>
				</div>
				);
		}
	});

	window.addQuestionEditor = function(){
		if($("#questionBodyText").children().length == 0){
			$("#questionBodyStart").append("<div id='questionBodyText'/>");
			ReactDOM.render(
			  <CKEditorWrapper uniqueID="questionBodyCKEditor" cross="true" removeCallback={window.removeQuestionEditor}/>,
			  document.getElementById('questionBodyText')
			);
		}
		
		
	}

	window.removeQuestionEditor = function(){
		$("#questionBodyText").remove();
	}

	window.addQuestionCode = function(){
		if($("#questionBodyCode").children().length == 0){
			$("#questionBodyStart").append("<div id='questionBodyCode'/>");
			ReactDOM.render(
			  <CodeEditor uniqueID="questionBodyCodeEditor" removeCallback={window.removeCodeEditor}/>,
			  document.getElementById('questionBodyCode')
			);
		}
		
		
	}

	window.removeCodeEditor = function(){
		$("#questionBodyCode").remove();
	}

	var optionsID = 0;
	window.currentNoOfOptions = 0;
	var NUMBER_OF_OPTIONS_ALLOWED = 6;
	window.addOptionEditor = function(){
		$("#code-input-button").prop("disabled", true);
		if(window.currentNoOfOptions < NUMBER_OF_OPTIONS_ALLOWED){
			$("#myOption").append("<div id='option"+optionsID+"'/>");
			ReactDOM.render(
			  <CKEditorWrapper uniqueID={ "optionCKEditor" + optionsID } tick="true" cross="true" removeCallback={window.removeOptionEditor}/>,
			  document.getElementById("option"+optionsID+"")
			);
			optionsID++;
			window.currentNoOfOptions++;
		}
		
		
	}

	window.removeOptionEditor = function(){
		$("#questionBodyCode").remove();
		window.currentNoOfOptions--;
		if(window.currentNoOfOptions == 0 && $("#user-text-input").children().length == 0){
			$("#code-input-button").prop("disabled", false);
		}
	}


	window.addOptionTextUserInput = function(){
		$("#code-input-button").prop("disabled", true);
		$("#user-input-button").prop("disabled", true);
		if($("#user-text-input").children().length == 0){
			ReactDOM.render(
			  <UserInputTextWrapper removeCallback={window.removeOptionTextUserInput}/>,
			  document.getElementById("user-text-input")
			);
		}		
	}
	
	window.removeOptionTextUserInput = function(){
		if(window.currentNoOfOptions == 0){
			$("#code-input-button").prop("disabled", false);
			$("#user-input-button").prop("disabled", false);
		}
	}

	window.addOptionCode = function(){
		$("#option-button").prop("disabled", true);
		$("#user-input-button").prop("disabled", true);

		if($("#user-code-input").children().length == 0){
			ReactDOM.render(
			  <CodeEditor uniqueID="optionCodeEditor" removeCallback={window.removeOptionCodeInput}/>,
			  document.getElementById('user-code-input')
			);
		}
		
		
	}

	window.removeOptionCodeInput = function(){
		$("#option-button").prop("disabled", false);
		$("#user-input-button").prop("disabled", false);
	}

</script>


@include('company-admin/ca-js-tags')

<script src="{{ URL::asset('js/ace-src-min/ace.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ URL::asset('js/ace-src-min/mode-java.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ URL::asset('js/ace-src-min/mode-c_cpp.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ URL::asset('js/company-admin/bootstrap-notify.min.js') }}"></script>
<script src="{{ URL::asset('js/company-admin/bs-notify-settings.js') }}"></script>
<script src="{{ URL::asset('ckeditor/ckeditor.js') }}"></script>

<script>
    function printMessage(message, messageType)	{
	$.notify({
			message: message,
		},{
			type: defaultType + messageType,
			delay: delayTime,
			offset:	{
				x: offsetX,
				y: offsetY
			},
			placement: {
				from: placementFrom,
				align: placementAlign
			},
			animate: {
				enter: animationEnter,
				exit: animationExit
			},
                });
        }
</script>


<script type="text/babel">

$(function() {
    $('form').submit(function() {
        // DO STUFF
        $("#userMessages")[0].innerHTML = "";
        
        var errorMessages = "";
        var optionsFilled = true;
        var numberOfOptions = 0;
        var numberOfMarked = 0;
        var userInput = false;
        var requestData = { 
        		"topic" : {},
        		"question" : { "body" : []},
        		"answer" : { "options" : [] },
        		"can_be_evaluated" : true
        	 };
        var data = $('form').serializeArray();
        for (var prop in data) {
        	
		    if (data.hasOwnProperty(prop)) {
		        
		        switch(data[prop].name){
		        	case "category_id":
			        	if(data[prop].value == "null"){
			        		errorMessages += "<li>Select Category</li>";
			        	}
		        		requestData.topic["category_id"] = data[prop].value;
		        		break;
		        	case "chapter_id":
		        		if(data[prop].value == "null"){
			        		errorMessages += "<li>Select Chapter</li>";
			        	}
		        		requestData.topic["chapter_id"] = data[prop].value;
		        		break;
		        	case "questionHeader":
		        		requestData.question["header"] = data[prop].value;
		        		break;
		        	case "questionBodyCKEditor":
		        		if(CKEDITOR.instances[data[prop].name].getData().length == 0){
			        		errorMessages += "<li>Please fill the question</li>";
			        	}
		        		requestData.question.body.push({ "text": CKEDITOR.instances[data[prop].name].getData()});
		        		break;
		        	case "questionBodyCodeEditor":
		        		if(data[prop].value.length == 0){
			        		errorMessages += "<li>Please Fill Code in Question</li>";
			        	}
		        		requestData.question.body.push({ "code":data[prop].value , "type":$("#lang-" + data[prop].name)[0].value});
		        		break;
		        	case "questionFooter":
		        		requestData.question["footer"] = data[prop].value;
		        		break;
		        	case "maxMarks":
		        		if(data[prop].value.length == 0){
			        		errorMessages += "<li>Max Marks not specified</li>";
			        	}
		        		requestData["maxMarks"] = data[prop].value;
		        		break;
		        	case "optionCodeEditor":
		        		userInput = true;
                                        //
                                        requestData.answer["input"] = { text : data[prop].value };
		        		requestData.answer["code"] = {"code":"","type": $("#lang-" + data[prop].name)[0].value};
		        		requestData.can_be_evaluated = false;
		        		break;
		        	case "userInput":
		        		userInput = true;
		        		if(data[prop].value.length == 0){
			        		errorMessages += "<li>Please enter correct answer for User Input</li>";
			        	}
		        		requestData.answer["input"] = { text : data[prop].value };
		        		break;
		        }
		        if(data[prop].name.startsWith("optionCKEditor")){
		        	//numberOfOptions++;
		        	//
		        	if(CKEDITOR.instances[data[prop].name].getData().length == 0){
		        		optionsFilled = false;
		        	}
		        	// if(data[prop].value.length == 0){
			        // 	optionsFilled = false;
			        // }
			        if($("#inp-" + data[prop].name)[0].value == "true"){
			        	numberOfMarked++;
			        }	
		        	requestData.answer.options.push({ text : CKEDITOR.instances[data[prop].name].getData() , marked : $("#inp-" + data[prop].name)[0].value });
		        }
		    }
		   
		    
		}
		 if(optionsFilled == false){
		    	errorMessages += "<li>Please fill all the options</li>";
		    }
		 if(!userInput){
			    if(window.currentNoOfOptions < 2){
			    	errorMessages += "<li>Atleast 2 options are needed</li>";
			    }
			    if(numberOfMarked < 1){
			    	errorMessages += "<li>Atleast 1 options needs to be marked</li>";
			    }
			}
		if(errorMessages.length > 0){

			errorMessages = "<ul>" + errorMessages + "</ul>";
			/*ReactDOM.render(
			  <MessageBox type="error" title="Incomplete Details" description={errorMessages}/>,
			  document.getElementById('userMessages')
			);*/
                        printMessage(errorMessages,'danger');                       
		}else{
			$.ajax({
			type: "POST",
			url: "/admin-company-question-insertion",
			//processData: false,
        	//contentType: false,
			data: {data: JSON.stringify(requestData)},
			success: function(result){
                                printMessage('Question Inserted Successfully.','success');
				window.clearForm();
			},
			error: function(){
				
				ReactDOM.render(
			  <MessageBox type="error" title="Error" description="Error Inserting the Question. Check and try again.."/>,
			  document.getElementById('userMessages')
			);
			},
		});
		}
        return false; // return false to cancel form action
    });
});


window.clearForm = function(){
	$("#questionBodyStart").empty();
	$("#myOption").empty();
	$("#user-code-input").empty();
	$("#user-text-input").empty();
	$("#option-button").prop("disabled", false);
	$("#user-input-button").prop("disabled", false);
	$("#code-input-button").prop("disabled", false);
	window.currentNoOfOptions = 0;
	$("#questionHeader").val("");
	$("#questionFooter").val("");
	$("#maxMarks").val("");
	$('#chapter_selection').val('null');
	$('#category_selection').val('null');
}


$(function(){
	//CKEDITOR.replace(editorID);
	/*var JavaMode = ace.require("ace/mode/java").Mode;
	var editor = ace.edit("code-type");
	//var editor = ace.edit("code-type-2");
	editor.session.setMode(new JavaMode());
	editor_length = 150;*/
	//document.getElementById("code-type").style.height= editor_length + "px";
	//document.getElementById("code-type-2").style.height= editor_length + "px";
});





var chapters;
var objData;
$.ajax(
    {
        url : "{{ URL::route('get-company-category-chapter') }}",
        type: "GET",
        success:function(data, textStatus, jqXHR) 
        {
            //data: return data from server
            //
            //alert(date['category']);
            
            objData = $.parseJSON(data);
            
            $.each(objData['category'], function(i, item) {
                $('#category_selection').append('<option value="'+i+'">'+item+'</option>');
            })
            chapters = objData['chapter'];
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //if fails      
        }
});


$('#category_selection').change(function(){
    var category_id = $('#category_selection').val();
    $('#chapter_selection').html('');
    $('#chapter_selection').append('<option value="null">-- Select Chapter --</option>');
    if(objData['chapter'][category_id][0].chapter_id == null)
        return false;
    $.each(objData['chapter'][category_id], function(i, item) {
                $('#chapter_selection').append('<option value="'+item.chapter_id+'">'+item.chapter_name+'</option>');
    })
});


</script>
</html>