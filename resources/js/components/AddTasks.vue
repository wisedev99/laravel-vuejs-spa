<template>
    <div class="flex justify-center container items-center w-50 bg-blue-400">
        <div class="w-1/4 bg-white rounded shadow-2xl p-8 m-4">
            <h1 class="block  text-center text-gray-800  font-bold ">Add Task</h1>
            <form class="form p-3"  @submit.prevent="addTasks">
                <div class="form-group">
                    <label for="number" >Client's id</label>
                    <input type=number id="number" class="form-control" aria-describedby="number" v-model="tasks.client_id"  placeholder="Client's id">
                </div>
                <div class="form-group">
                    <label for="name">Task Name</label>
                    <input type="name" class="form-control" id="name" v-model="tasks.task_name">
                </div>
                <div class="form-group">
                    <label>Text</label>
                    <textarea type="textarea" name="textarea" class="form-control" v-model="tasks.task_text" id="textarea" aria-describedby="textarea"></textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input type="number" max="1" min="0" class="form-control" v-model="tasks.status" >
                </div>
                <div class="form-group">
                    <label for="date">Died line</label>
                    <input type="date" class="form-control" v-model="tasks.died_line" id="date">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "AddTasks",
    data() {
        return {
            tasks: {}
        }
    },
    methods: {
        addTasks() {
            this.axios
                .post(`http://localhost:8000/tasks`, this.tasks)
                .then((res) => {
                    this.$router.push({name: 'userList'});
                });
        }
    }
}
</script>

<style>

</style>
