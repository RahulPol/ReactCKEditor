window.CKEditorWrapper = React.createClass({
      	getInitialState: function(){
      		if(this.props.selected == null){
      			return { "selected" : false };
      		}else if(this.props.selected){
      			return { "selected" : true };
      		}
      		return { "selected" : false };
		    
		},
      	componentDidMount: function(){
      		var that =this;			
      		var instance = CKEDITOR.replace(this.props.uniqueID, { 
                        extraPlugins: 'mathjax,imageuploader',
                        mathJaxLib: 'http://cdn.mathjax.org/mathjax/2.2-latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML'
                        ,on: { 
							instanceReady: function(ev) { 
								if(that.props.editorReadOnly){
									instance.setReadOnly(that.props.editorReadOnly);
								}

                                
                                ev.editor.dataProcessor.htmlFilter.addRules(
                                    {
                                        elements:
                                        {
                                            $: function (element) {
                                                
                                                // Output dimensions of images as width and height
                                                if (element.name == 'img') {
                                                    
                                                    var style = element.attributes.style;

                                                    if (style) {
                                                        // Get the width from the style.
                                                        var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec(style),
                                                            width = match && match[1];

                                                        // Get the height from the style.
                                                        match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec(style);
                                                        var height = match && match[1];

                                                        if (width) {
                                                            element.attributes.style = element.attributes.style.replace(/(?:^|\s)width\s*:\s*(\d+)px;?/i, '');
                                                            element.attributes.width = width;
                                                        }

                                                        if (height) {
                                                            element.attributes.style = element.attributes.style.replace(/(?:^|\s)height\s*:\s*(\d+)px;?/i, '');
                                                            element.attributes.height = height;
                                                        }
                                                    }
                                                }



                                                if (!element.attributes.style){
                                                    delete element.attributes.style;
                                                    delete element.attributes.height;
                                                    delete element.attributes.width;
                                                }
                                                
                                                element.attributes.style = "max-width:100%";
                                                    
                                                return element;
                                            }
                                        }
                                    });

 
    			}}});
      		
      		// if(this.props.editorReadOnly){
      		// 	instance.setReadOnly(this.props.editorReadOnly);
      		// }
      	},
      	onCrossClicked: function(){
      		ReactDOM.unmountComponentAtNode(ReactDOM.findDOMNode(this).parentNode);
      		this.props.removeCallback();
      	},
      	onTickClicked: function(){
      		
      		this.setState({ "selected" : !this.state.selected });
      	},
      	render: function(){
      		var crossButton,tickButton;
      		if(this.props.cross && this.props.cross == "true"){
      			crossButton = (<button type="button" className="remove-widget btn" onClick={this.onCrossClicked}><i className="fa fa-trash" aria-hidden="true"></i></button>);
      		}
      		if(this.props.tick && this.props.tick == "true"){
      			var classname = "fa fa-check";
				var optionbuttonclass = "mark-answer btn ";
      			if(this.state.selected == true){
      				classname  = "fa fa-check";
					optionbuttonclass += "btn-success";
      			}
      			tickButton = (<button type="button" className={optionbuttonclass} onClick={this.onTickClicked}><i className={classname} aria-hidden="true"></i></button>);
      		}
      		var customID = "inp-" + this.props.uniqueID;
      		
      		return (	<div className="well widget-bg">
							{ crossButton }
							{ tickButton }
							<textarea required name={this.props.uniqueID} id={this.props.uniqueID} rows="5" cols="50" defaultValue={this.props.data}></textarea>
							<input type="hidden" id={ customID } name={customID} value={this.state.selected}></input>
						</div>
					)
      	}
      });

	window.CodeEditor = React.createClass({
		editor : "",
		getInitialState: function(){
		    return { "language" : "Select Code Language" };
		},
		componentDidMount: function(){
			var JavaMode = ace.require("ace/mode/java").Mode;
			if(this.editor == ""){
				this.editor = ace.edit(this.props.uniqueID);
			}
			this.editor = ace.edit(this.props.uniqueID);
			this.editor.session.setMode(new JavaMode());
			this.editor_length = 150;
			document.getElementById(this.props.uniqueID).style.height= this.editor_length + "px";
			
			if(this.props.codeReadOnly){
				
				this.editor.setReadOnly(this.props.codeReadOnly);
			}
			var textarea = $('textarea[name="'+this.props.uniqueID+'"]');
			var that = this;
			this.editor.getSession().on("change", function () {
			    textarea.val(that.editor.getSession().getValue());
			});
		},
		onLanguageChanged: function(name){
			this.setState({ "language" : "Code Language - " + name });
			if(this.editor != ""){
				var ccppMode = require("ace/mode/c_cpp").Mode;
        		this.editor.getSession().setMode(new ccppMode());
			}
		},
		onCrossClicked: function(){
      		ReactDOM.unmountComponentAtNode(ReactDOM.findDOMNode(this).parentNode);
      		if(this.props.removeCallback){
      			this.props.removeCallback();
      		}
      	},
		render: function(){
			var displayNone = {"display": "none"};
			var customID = "lang-" + this.props.uniqueID;
			var displayCode = "// Enter your code here";
			if(this.props.code){
				displayCode = this.props.code;
			}
			return (
					<div className="well widget-bg" id="widget-id-editorID">
						<div className="btn-group">
							  <button type="button" className="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="q-language-button">
								<i aria-hidden="true" className="fa fa-plus-square"></i><span id="language-title"> {this.state.language} </span>&nbsp;<span className="caret"></span>
							  </button>
							  <ul className="dropdown-menu" id="q-language-select">
								<li><a onClick={this.onLanguageChanged.bind(this,"Java")}>Java</a></li>
								<li><a onClick={this.onLanguageChanged.bind(this,"C++")}>C++</a></li>
							  </ul>
							</div>
							<button type="button" className="remove-widget btn" onClick={this.onCrossClicked}><i className="fa fa-trash" aria-hidden="true"></i></button>
						<div id={this.props.uniqueID}>{displayCode}</div>
						<textarea name={this.props.uniqueID} defaultValue={displayCode} style={displayNone} />
						<input type="hidden" id={customID} name={customID} value={this.state.language}/>
					</div>
				);
		}
	});
	
	window.UserInputTextWrapper = React.createClass({
		onCrossClicked: function(){
      		ReactDOM.unmountComponentAtNode(ReactDOM.findDOMNode(this).parentNode);
      		this.props.removeCallback();
      	},
		render: function(){

			return (
				<div>
					<div className="callout callout-success">
						<button type="button" className="remove-widget btn" onClick={this.onCrossClicked}><i className="fa fa-trash" aria-hidden="true"></i></button>

						<p>User Input</p>
						
						</div>
						<div className="form-group">
							<label>User Input</label>
							<textarea name="userInput" defaultValue={this.props.data} className="form-control" placeholder="Answer for user input one" required></textarea>
						</div>
				</div>
				);
		}
	});

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
					<button aria-hidden="true" data-dismiss="alert" className="close" type="button">�</button>
					<h4><i className="icon fa fa-check"></i>{this.props.title}</h4>
					<div dangerouslySetInnerHTML={descObj}></div>
				</div>
				);
		}
	});