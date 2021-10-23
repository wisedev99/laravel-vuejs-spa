<template>
    <div class="container">

        <div class="d-grid margg gap-2 d-md-flex justify-content-md-end sticky-top">
            <router-link to="/addTasks" type="button"  class="btn row btn-primary mr-3"> Add Task </router-link>
            <router-link to="/addClient" type="button"  class="btn row btn-primary mr-3"> Add User </router-link>
        </div>
    <table class="table table-white table-bordered mx-auto text-center mr-3">
        <thead>
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Username</th>
            <th class="px-4 py-2">Birth Date</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Singe At</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr  v-for="user in users" :key="user.id">
            <td class="border px-4 py-2">{{ user.id }}</td>
            <td class="border px-4 py-2">{{ user.full_name}}</td>
            <td class="border px-4 py-2">{{ user.birth_date}}</td>
            <td class="border px-4 py-2">{{ user.email}}</td>
            <td class="border px-4 py-2">{{ user.signed_at}}</td>
            <td class="border px-4 py-2">
                <div>
                    <router-link :to="{name: 'editClient', params: { id: user.id}}"  class="btn btn-success">Edit</router-link>
                    <button class="btn btn-danger" @click="deleteUsers(user.id)"> Delete </button>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    </div>
</template>

<script>
let i = '';
let al = '!!!  This User has Tasks! ';
export default  {
    name:"userList",
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
    deleteUsers(id) {
        this.axios
            .delete(`http://localhost:8000/clients/${id}`)
            .then(response => {
                 // this.users = response.data;
                 i = this.users.map(data => data.id).indexOf(id);
                  this.users.splice(i, 1);

                }).catch(err => alert(al))
        .finally(() => this.loading = false)
    }
}
}
</script>
<style>
.margg {
     margin-bottom: 20px;
     margin-top: 20px;
}
</style>
