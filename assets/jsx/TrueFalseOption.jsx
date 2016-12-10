window.TrueFalseOption = React.createClass({

    getInitialState: function () {
        return { selected: false }
    },

    
    onTickClicked: function () {
        this.setState({ selected: !this.state.selected });
    },//onTickClicked

    removeComponent: function(){
        ReactDOM.unmountComponentAtNode(ReactDOM.findDOMNode(this).parentNode);        
    },//removeComponent

    renderOption: function () {
        var optionButtonClass = "btn btn-sm btn-default";
        if (this.state.selected == true) {
            optionButtonClass = "btn btn-sm btn-success";
        } else {
            optionButtonClass = "btn btn-sm btn-default";
        }

        if (this.props.questionType == 'MCQ') {
            return (
                <div>
                    <div className="option-box mcq-option" data-optionId={this.props.uniqueId} data-optionName={this.props.optionText} data-isSelected={this.state.selected}>
                        <div className="option-header">
                            <h3 className="option-text">
                                ({this.props.optionText}):
                                <span className="option-select pull-right">
                                    <button type="button" className={optionButtonClass} onClick={this.onTickClicked}>
                                        <i className="fa fa-check" style={{ paddingRight: 10 + 'px' }} aria-hidden="true"></i>This answer option is correct
                                    </button>
                                </span>
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

