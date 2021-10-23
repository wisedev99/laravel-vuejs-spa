import AllProduct from './components/AllProduct.vue';
import CreateProduct from './components/CreateProduct.vue';
import EditTasks from './components/EditTasks.vue';
import RegistClient from "./components/RegistClient";
import AddTasks from "./components/AddTasks.vue";
import UserList from "./components/UserList";
import EditClient from "./components/EditClient";
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllProduct
    },
    {
        name: 'create',
        path: '/create',
        component: CreateProduct
    },
    {
        name: 'edit',
        path: '/edit:id',
        component:EditTasks
    },
    {
        name: 'addClient',
        path: '/addClient',
        component:RegistClient
    },
    {
        name:'editClient',
        path:'/editClient:id',
        component:EditClient
    },
    {
        name:'userList',
        path:'/userList',
        component:UserList
    },
    {
        name:'AddTasks',
        path:'/addTasks',
        component:AddTasks
    }
];
