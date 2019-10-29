require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.component('Banner', require('./components/Banner.vue'));
Vue.component('Navigation', require('./components/Navigation.vue'));
Vue.component('Product', require('./components/Product.vue'));
Vue.component('Register', require('./components/ModalRegister.vue'));
Vue.component('Login', require('./components/ModalLogin.vue'));
Vue.component('Detail', require('./components/Detail.vue'));

const app = new Vue({
    el: '#app',
    created(){
        axios.get('http://365daymarket.com/api/category')
            .then(respond => {
                this.categories = respond.data.categories;
            });
        axios.get('http://365daymarket.com/api/location')
            .then(respond => {
                this.locations = respond.data.locations;
            });

    },
    data(){
        return {
            categories: [],
            locations: [],
            parentHeight:0,
        }
    }
});
