require('./bootstrap');
import VueRouter from 'vue-router';
import CitiesCurrentComponent from "./components/CitiesCurrentComponent";
import CityHoursComponent from "./components/CityHoursComponent";
import UserComponent from "./components/UserComponent";

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('link-component', require('./components/LinkComponent.vue').default);

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'cities.current',
            component: CitiesCurrentComponent
        },
        {
            path: '/hour',
            name: 'city.hours',
            component: CityHoursComponent,
        },
        {
            path: '/user',
            name: 'user.index',
            component: UserComponent,
        },
    ]
});

const app = new Vue({
    el: '#app',
    router
});
