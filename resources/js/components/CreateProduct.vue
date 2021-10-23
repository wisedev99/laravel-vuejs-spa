<template>

                <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl lg:p-20">
        <h3 class="text-center text-4xl mb-20 font-bold">Create Product</h3>
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 list-disc space-y-8"
                      @submit.prevent="addProduct">
                    <div class="form-group mb-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text"
                               class="shadow appearance-none border
                         rounded w-full py-2 px-3 text-gray-700
                          leading-tight focus:outline-none focus:shadow-outline" v-model="product.name">
                    </div>
                    <div class="form-group">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Tasks
                        </label>
                        <input type="text" class="shadow appearance-none border
                         rounded w-full py-2 px-3 text-gray-700
                          leading-tight focus:outline-none focus:shadow-outline" v-model="product.tasks">
                    </div>
                    <div class="flex items-center justify-between">
                    <button type="submit" class="bg-clip-border float-right
                     p-2 bg-indigo-600">Create</button>
                    </div>
                </form>
                </div>
</template>

<script>
export default {
    data() {
        return {
            product: {}
        }
    },
    methods: {
        addProduct() {
            this.axios
                .post(`http://localhost:8000/products`, this.product)
                .then((res) => {
                    this.$router.push({ name: 'home' });
                });
            // this.axios
            //     .post('http://localhost:8000/products/', JSON.stringify(this.product))
            //     .then(response => (
            //         this.$router.push({ name: 'home' })
            //
            //
            //     ))
            //     .catch(err => console.log(err))
            //     .finally(() => this.loading = false)
        }
    }
}
</script>
