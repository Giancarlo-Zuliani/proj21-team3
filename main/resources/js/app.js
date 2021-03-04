require('./bootstrap');
require('./dashboard');

window.Vue = require('vue');

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// VUE INSTANCE
const app = new Vue({
    el: '#app',
    data: {
        // INDEX FLAGS 
        showtypo: true,
        showRestaurant: false,
        // ARRAY FILTERED
        restaurantArray: [],
        typologyArray: [],
        selectedTypologies: [],
        // MAX NUMBER OF COMBINATIONS
        searchLength: 3,
        // NUMBER OF RESTAURANTS AFTER SELECTED
        searchResultNum: undefined,
    },
    // (INDEX) PAGE LOADED GET ALL TYPOLOGIES FROM DB
    mounted: function() {
        axios.get('http://127.0.0.1:8000/gettypo')
            .then(response => {
                console.log(response.data);
                this.typologyArray = response.data;
            });
    },
    methods: {
        // API CALL TO GET ALL RESTAURANTS FILTERED BY TYPOLOGY
        getRestaurants() {
            restaurantArray = [];
            let url = 'http://127.0.0.1:8000/getRestaurants'
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
        // SCRIPT TO SELECT TYPOLOGY CARD
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

            // console.log(this.selectedTypologies);
        },
        // SCRIPT PRINT NUMBER OF TOTAL RESTAURANTS AFTER FILTER
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
        },
    }
});

// const app2 = new Vue({
//     el: '#prova',
//     data: {
//     },
// });