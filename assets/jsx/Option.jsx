window.Option = React.createClass({

    shouldComponentUpdate: function () {
        return false;
    },//shouldComponentUpdate

    componentDidMount: function () {
        CKEDITOR.replace(this.props.uniqueId);
    },//componentDidMount


    renderOption: function () {
        if (this.props.questionType == 'MCQ') {
            return (
                <div>
                    <div className="option-box mcq-option">
                        <div className="option-header">
                            <h3 className="option-text">
                                Option {this.props.optionText}
                                <span className="option-select pull-right">This option is correct</span>
                            </h3>
                        </div>
                        <textarea ref={this.props.id} id={this.props.uniqueId} rows="5" cols="50" >
                        </textarea>
                    </div>
                </div>
            );
        }//MCQ 
    },//renderOptions



    render: function () {
        return (
            this.renderOption()
        );
    },//render
});

