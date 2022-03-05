import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import ChooseProductModal from "./components/Products/_choose-product-modal";

const routes = [
    {
        name:'choose-product',
        path: "/choose-product",
        component: ChooseProductModal,
    },
];

export default new vueRouter({
    mode: "history",
    routes
});
