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
    <h1>ToBooList</h1>

    <ul>
        <li v-for="(task, index) in todoList" :key="index">
            {{ task.text }}
        </li>
    </ul>

    <form @submit="addNewTask">
        <input type="text" name="task" v-model="newTask">
        <input type="submit" value="Add new task">
    </form>
</template>

<style >

</style>
