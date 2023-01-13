<script >
import axios from 'axios';


const apiUrl = "http://localhost/";

export default {
    name: "TodoList",
    data() {
        return {
            todoList: [],
            newTask: ""
        }
    },
    methods: {
        getAllData() {
            axios.get(apiUrl + "api.php")
                .then(res => {

                    const data = res.data;

                    console.log(data);

                    this.todoList = data;
                })
        },
        addNewTask(e) {
            e.preventDefault();

            // const newTodoTask = this.newTask;

            const params = {
                params: {
                    "text": this.newTask
                }
            };

            axios.get(apiUrl + "add.php", params)
                .then(() => {
                    this.getAllData();

                    this.newTask = "";
                })
        }
    },
    mounted() {
        this.getAllData();
    }
}


</script>

<template>

    <div class="container">
        <h1>ToBooList</h1>

        <div class="list">
            <ul>
                <li v-for="(task, index) in todoList" :key="index" :class="task.completed === true ? 'completed' : ''">
                    {{ task.text }}
                </li>
            </ul>

            <form @submit="addNewTask">
                <input type="text" name="task" v-model="newTask" class="add">
                <input type="submit" value="Add new task" class="btn">
            </form>
        </div>

    </div>

</template>

<style lang="scss" scoped>
.container {
    width: 50%;
    margin: 100px auto;
    padding: 50px 30px;
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #FBFACD;
    border: 3px solid #DEBACE;
    border-radius: 10px;

    h1 {
        text-align: center;
        font-size: 40px;
        margin-bottom: 40px;
        color: #7F669D;
    }

    .list {
        padding: 30px;
        border-radius: 10px;
        background-color: #DEBACE;
        border: 2px solid #7F669D;
    }

    ul li {
        margin-bottom: 10px;
        color: #7F669D;
        font-size: 18px;

        &.completed {
            text-decoration: line-through;
        }
    }

    form {
        margin-top: 30px;

        .btn {
            margin-left: 10px;
            padding: 5px 10px;
            background-color: #DEBACE;
            border: 2px solid #7F669D;
            border-radius: 10px;
            color: #7F669D;
            font-weight: bold;

            &:hover {
                color: #FBFACD;
                background-color: #DEBACE;
            }
        }

        .add {
            height: 30px;
            width: 250px;
            padding: 5px;
        }
    }


}
</style>
