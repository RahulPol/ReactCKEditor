
//Create Todo component
window.TodoComponent = React.createClass({
    getInitialState: function () {
        return {
            todos: ['fls-dev', 'fls-uat', 'fls-prod', 'Exhaustated...lets have a party']
        }
    },//getInitialState

    //custom functions
    onDelete: function (item) {
        var updatedTodos = this.state.todos.filter(function (val, index) {
            return item !== val;
        })

        this.setState({
            todos: updatedTodos
        })
    },

    onAdd: function (item) {
        var updatedTodos = this.state.todos;
        updatedTodos.push(item);
        this.setState({
            todos: updatedTodos
        });
    },

    render: function () {
        console.log('render');
        var todos = this.state.todos;

        todos = todos.map(function (item, index) {
            return (
                <TodoItem key={index} item={item} onDelete={this.onDelete} ></TodoItem>
            )
        }.bind(this));

        return (
            <div id="todo-list">
                <p>The busiest people have the most leisure...</p>
                <ul>
                    {todos}
                </ul>
                <AddItem onAdd={this.onAdd} />
            </div>
        );
    },//render


    componentWillMount: function () {
        //get data from db and set state, this method is called only once
        // Api.get('example.com/api/users').then((data)=> {
        //     this.setState({users:data});
        // })
        console.log('component will mount');
    },

    componentDidMount: function () {
        //add external js library to elements 
        console.log('component did mount');
    },

    componentWillReceiveProps: function (nextProps) {
        //next props contains new parameters and you can compare this with existing parameters
        // if(this.props.userId != nextProps.userId){
        //     make api call
        // }

    },

    componentWillUpdate: function (nextProps, nextState) {
        //this will be called before updating component ,contain new state and new props

        console.log('component will update');
    }


});

//Render component in html
ReactDOM.render(<TodoComponent msg="This is a message" ></TodoComponent>, document.getElementById('todo-wrapper'));

