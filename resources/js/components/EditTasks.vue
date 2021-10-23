<template>
    <div class="flex justify-center items-center w-full bg-blue-400">
        <div class="w-1/2 bg-white rounded shadow-2xl p-8 m-4">
            <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">Tasks Update</h1>
            <form
                @submit.prevent="updateProduct">
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" >Task's Name</label>
                    <input class="border py-2 px-3 text-grey-800" type="text" name="task_name" v-model="tasks.task_name" >
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" >Task's Text</label>
                    <textarea class="border py-2 px-3 text-grey-800" name="textarea"  v-model="tasks.task_text"></textarea>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" >Status</label>
                    <input class="border py-2 px-3 text-grey-800" min="0" max="1" type="number"  v-model="tasks.status">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" >DiedLine Time</label>
                    <input class="border py-2 px-3 text-grey-800" type="date"  v-model="tasks.died_line">
                </div>
                <div class="flex flex-col mb-4">
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
            tasks: {}
        }
    },
    created() {
        this.axios
            .get(`http://localhost:8000/tasks/${this.$route.params.id}`)
            .then((res) => {
                this.tasks = res.data;
                console.log("I am from server take this iformation ", this.tasks);
            })
    },
    methods: {
        updateProduct() {
            this.axios
                .patch(`http://localhost:8000/tasks/${this.$route.params.id}`, this.tasks)
                .then((res) => {
                    this.$router.push({ name: 'home' });
                });
        }
    }
}
</script>
