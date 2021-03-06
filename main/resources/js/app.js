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
        cartArray: [],
        pay: false,
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
        addToCart(item) {
            if (this.cartArray.some(obj => obj.id === item.id)) {
                this.cartArray.forEach(elem => {
                    if (elem.id === item.id) {
                        elem.quantity++;
                    }
                });
            } else {
                item.quantity = 1;
                this.cartArray.push(item);
            }
        },
        removeFromCart(index) {
            console.log(index);
            if (this.cartArray[index].quantity === 1) {
                this.cartArray.splice(index, 1);
            } else {
                this.cartArray[index].quantity--;
            }
        },
        showPayment() {
            this.pay = true;
        }

    }

});

// const app2 = new Vue({
//     el: '#prova',
//     data: {
//     },
// });

// CHART.JS SCRIPT
/* var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
}); */