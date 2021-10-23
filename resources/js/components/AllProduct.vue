<template>
    <div class="container px-4">
        <h1 class="block  text-center text-gray-800 mb-3  font-bold ">Users && Tasks</h1>
<!--        "/js/app.js": "/js/app.js",-->
<!--        "/css/app.css": "/css/app.css"-->
        <table class="table table-white table-bordered mx-auto text-center">
            <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2" style="width: 200px;">Names</th>
                <th class="px-4 py-2 border-0">
                 <tr>
                  <th class="px-4 py-2 border-0" style="width: 400px;">Task</th>
                    <th class="px-4 py-2 border-0" style="width: 350px;">DiedLine</th>
                    <th class="px-4 py-2 border-0" style="width: 230px;">Status</th>
                    <th class="px-4 py-2 border-0" style="width: 400px;">Actions</th>
                 </tr>
                  </th>
            </tr>
            </thead>
            <tbody>
            <tr  v-for="user in users" :key="user.id" v-if="user.tasks.length > 0">
                <td class="border px-4 pt-5 text-center">{{ user.id }}</td>
                <td class="border px-4 pt-5 text-center ">{{ user.full_name}}</td>
            <td>
                  <tr v-for="task in user.tasks" :key="task.id">
                <td class="border px-4 py-2 text-break text-center text-justify text-black-50x" style="width: 400px;">
                    {{ task.task_name }}
                </td>
                <td class="border px-4 py-2" style="width: 350px;">{{ task.died_line }}</td>
                <td class="border px-4 py-2" style="width: 230px;">
                    <input type="checkbox" id="checkbox" @click="StatusChange(task.id)" v-model="task.status">
                    <label for="checkbox" v-if="task.status === 0"> </label>
                    <label for="checkbox" v-if="task.status === 1"> </label>
                <td class="border px-4 py-2" style="width: 400px;">
                    <div>
                        <router-link :to="{name: 'edit', params: { id: task.id}}"  class="btn btn-success"> Edit </router-link>
                        <button class="btn btn-danger" @click="deleteProduct(task.id)">Delete</button>
                    </div>
                </td>
                  </tr>
            </td>
       </tr>
            </tbody>
        </table>
    </div>

</template>

<script>

let i = '';
let u = '';
export default {
name: 'AllProduct',
    data() {
        return {
            users: []
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/clients')
            .then(response => {
                this.users = response.data;
            });
    },
    methods: {
        deleteProduct(id) {
            this.axios
                .delete(`http://localhost:8000/tasks/${id}`)
                .then(response => {
                    this.users.map(data => {
                        i = data.tasks;
                        u = i.map(data => data.id).indexOf(id);
                        i.splice(u, 1);
                    });


                    //  i = this.users.map(data => data.id).indexOf(id);
                    // this.users.splice(i, 1);
                });
            this.axios
                .get('http://localhost:8000/clients')
                .then(response => {
                    this.users = response.data;
                });
            console.log(  u ,  'kkkkkkkkkkkkkkkkk');
        },

        StatusChange(id) {
            this.axios
                .patch(`http://localhost:8000/status/${id}`)
                .then(response => {
                    console.log(response.data);
                    // u = this.users.map(data => data.id).indexOf(id);
                    // this.users.splice(i, 1);
                });
        }
    }
}
</script>
