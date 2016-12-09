window.Question = React.createClass({

    shouldComponentUpdate:function(){
        //Never update board component
        return false;
    },//shouldComponentUpdate

    componentDidMount:function(){
        CKEDITOR.replace( this.refs.question );
    },//componentDidMount

    render:function(){
        return(
             <div className="question-box">
                <textarea ref="question" id="question" rows="10" cols="80" defaultValue="Enter Question here.">                    
                </textarea>   
            </div>
        );
    },

});