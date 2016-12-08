window.AddItem = React.createClass({
    handleSubmit: function (e) {
        e.preventDefault();
        this.props.onAdd(this.refs.newItem.value);
    },
    render: function () {
        return (<form id="add-todo" onSubmit={this.handleSubmit}>
            <input ref="newItem" type="text" required />
            <input type="submit" value="Hit me" />
        </form>)
    }

});