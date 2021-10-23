<template>
    <div class="flex justify-center container items-center w-50 bg-blue-400">
        <div class="w-1/4 bg-white rounded shadow-2xl p-8 m-4">
            <h1 class="block  text-center text-gray-800  font-bold ">Edit User</h1>
            <form class="form p-3 "  @submit.prevent="editUser">
                <div class="form-group">
                    <label for="name" >Username</label>
                    <input type="name" id="name" class="form-control" aria-describedby="name" v-model="users.full_name" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="date">Birth Date</label>
                    <input type="date" class="form-control" v-model="users.birth_date" id="date">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" v-model="users.email" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "editClient",
    data() {
        return {
            users: {}
        }
    },
    created() {
        this.axios
            .get(`http://localhost:8000/clients/${this.$route.params.id}`)
            .then((res) => {
                this.users = res.data;
                console.log("I am from server take this iformation ", this.users);
            })
    },
    methods: {
        editUser() {
            this.axios
                .patch(`http://localhost:8000/clients/${this.$route.params.id}`, this.users)
                .then((res) => {

                this.$router.push({name: 'userList'});
                });
        }
    }
}
</script>

<style>

</style>
