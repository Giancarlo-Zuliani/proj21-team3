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
        selectedTypologies: [],
        searchLength: 3,
        searchResultNum: undefined,
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
            restaurantArray = [];
            let url = 'http://127.0.0.1:8000/getRestaurant'
            for (let i = 0; i < this.searchLength; i++) {
                if (this.selectedTypologies[i] == undefined) {
                    continue
                } else {
                    url += '/' + this.selectedTypologies[i];
                }
            }

            axios.get(url)
                .then(response => {
                    console.log(response.data);
                    this.restaurantArray = response.data;
                    this.showRestaurant = !this.showRestaurant;
                });
        },

        typologySelection(id) {
            if (this.selectedTypologies === undefined || this.selectedTypologies.length < 3) {
                this.selectedTypologies.includes(id) ?
                    this.selectedTypologies.splice(
                        this.selectedTypologies.indexOf(id), 1) :
                    this.selectedTypologies.push(id);
                console.log(this.selectedTypologies);
            } else if (
                this.selectedTypologies.includes(id)) {
                this.selectedTypologies.splice(this.selectedTypologies.indexOf(id), 1)
                console.log(this.selectedTypologies);
            };
            this.getRestaurantCount(id);
        },

        getRestaurantCount(id) {
            let url = 'http://127.0.0.1:8000/getCountRestaurant'
            if (this.selectedTypologies.length > 0) {

                for (let i = 0; i < this.searchLength; i++) {
                    if (this.selectedTypologies[i] == undefined) {
                        continue;
                    } else {
                        url += '/' + this.selectedTypologies[i];
                    }
                }

                axios.get(url)
                    .then(response => {
                        this.searchResultNum = response.data;
                        console.log(response.data);
                    });
            } else {
                this.searchResultNum = undefined;
            }
        }
    }
});

const app2 = new Vue({
    el: '#prova',

});