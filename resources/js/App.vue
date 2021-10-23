<template>
    <div class="container">
            <div class="nav nav-tabs mt-4"  id="nav-tab">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <router-link to="/"  class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Products List</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/userList"  class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Users List</router-link>
                    </li>
                </ul>
            </div>
        <router-view>

        </router-view>
    </div>
</template>

<script>

import AllProduct from './components/AllProduct.vue';
import CreateProduct from './components/CreateProduct.vue';
import EditProduct from './components/EditTasks.vue';
import RegistClient from "./components/RegistClient";
export default {
    name:'App',
    components: {
        AllProduct,
        CreateProduct,
        EditProduct,
        RegistClient
    }
}
</script>
