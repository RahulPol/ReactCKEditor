window.Board = React.createClass({
    getInitialState: function () {
        return {
            options: ['Option_A', 'Option_B', 'Option_C', 'Option_D',]
        }
    },//getInitialState

    shouldComponentUpdate:function(){
        //Never update board component
        return false;
    },//shouldComponentUpdate

    componentDidMount:function(){
        CKEDITOR.replace( this.refs.question );
    },//componentDidMount

    renderQuestion: function () {
       return ( 
           <div className="question-box">
                <textarea ref="question" id="question" rows="10" cols="80" defaultValue="Enter Question here.">                    
                </textarea>   
            </div>
       );
    },//renderQuestion

    save:function(e){
        e.preventDefault();
        var questionEditorId = this.refs.question.id;
        alert(CKEDITOR.instances.question.getData());
        
        //alert(CKEDITOR.instances.questionEditor.getData());
    },

    renderOptions: function () {
        var options = this.state.options;                
    },//rednerOptions


    render: function () {
        return (
            <div className="col-md-12">
                <form>
                   {this.renderQuestion()}   

                   <button className="btn btn-primary pull-right" onClick={this.save} style={{marginTop:10 + "px"}}>Save</button>
                </form>
            </div>
        );
    },//render
});

ReactDOM.render(
    <Board></Board>,
    document.getElementById('board')
);