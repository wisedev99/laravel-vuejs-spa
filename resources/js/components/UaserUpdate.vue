<template>
    <div class="flex justify-center items-center w-full bg-blue-400">
        <div class="w-1/2 bg-white rounded shadow-2xl p-8 m-4">
            <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">Component Form</h1>
            <form
                @submit.prevent="updateProduct">
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="first_name">First Name</label>
                    <input class="border py-2 px-3 text-grey-800" type="text" name="first_name" id="first_name">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="last_name">Last Name</label>
                    <input class="border py-2 px-3 text-grey-800" type="text" name="last_name" id="last_name">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="Date">Birth Date</label>
                    <input class="border py-2 px-3 text-grey-800" type="date" name="date" id="date">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="email">Email</label>
                    <input class="border py-2 px-3 text-grey-800" type="email" name="email" id="email">
                </div>

                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" >textarea</label>
                    <textarea class="border py-2 px-3 text-grey-800" name="textarea" id="textarea"></textarea>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" >Select</label>

                </div>
                <button class="block bg-green-400 hover:bg-green-600 text-white uppercase text-lg mx-auto p-4 rounded" type="submit">Save</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            user: {},
            tasks: {}
        }
    },
    created() {
        this.axios
            .get(`http://localhost:8000/clients/${this.$route.params.id}`)
            .then((res) => {
                this.user = res.data;
                console.log("I am from server take this iformation ", this.user);
            });
    },
    methods: {
        updateProduct() {
            this.axios
                .patch(`http://localhost:8000/clients/${this.$route.params.id}`, this.user)
                .then((res) => {
                    this.$router.push({ name: 'home' });
                });
        }
    }
}
</script>
