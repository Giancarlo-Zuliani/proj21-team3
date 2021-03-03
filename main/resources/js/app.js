/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./dashboard');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        showtypo: true,
        showRestaurant: false,
        restaurantArray: [],
        typologyArray: [],
        selectedTypologies: []
    },
    mounted: function() {
        axios.get('http://127.0.0.1:8000/gettypo')
            .then(response => {
                console.log(response.data);
                this.typologyArray = response.data;
            });
    },
    methods: {
        getRestaurant() {
            let url = 'http://127.0.0.1:8000/getRestaurant'
            for (i = 0; i < this.selectedTypologies.length; i++) {
                if (this.selectedTypologies[i] === undefined) {
                    url += '/' + '999';
                } else {
                    url += '/' + this.selectedTypologies[i];
                }
            }
            let res = axios.get(url)
                .then(response => {
                    console.log(response.data);
                })
        },

        typologySelection(id) {
            this.selectedTypologies.includes(id) ?
                this.selectedTypologies.splice(
                    this.selectedTypologies.indexOf(id), 1) :
                this.selectedTypologies.push(id);

            console.log(this.selectedTypologies);
        },
    }
});

const app2 = new Vue({
    el: '#prova',

});