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

    
    renderQuestion: function () {
       return ( 
          <Question></Question>
       );
    },//renderQuestion

    save:function(e){
        e.preventDefault();
        var questionEditorId = this.refs.question.id;
        alert(CKEDITOR.instances.question.getData());    
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