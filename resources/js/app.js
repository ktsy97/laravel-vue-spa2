require('./bootstrap');
import VueRouter from 'vue-router';
import CitiesCurrentComponent from "./components/CitiesCurrentComponent";
import CityHoursComponent from "./components/CityHoursComponent";

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('link-component', require('./components/LinkComponent.vue').default);

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/cities',
            name: 'cities.current',
            component: CitiesCurrentComponent
        },
        {
            path: '/hours',
            name: 'city.hours',
            component: CityHoursComponent
        },
    ]
});

const app = new Vue({
    el: '#app',
    router
});
