const { type } = require('jquery');

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
        finalPrice: 0,
        pay: false,
        typologyBox: null,
        deliveryPrice: undefined,
        // MAX 3 TYPOLOGY BANNER
        bannerMax: '',
    },
    // (INDEX) PAGE LOADED GET ALL TYPOLOGIES FROM DB
    mounted: function() {
        axios.get('http://127.0.0.1:8000/gettypo')
            .then(response => {
                this.typologyArray = response.data;

                // FOCUS EFFECT
                this.$nextTick(() => {
                    this.focusEffect()
                })

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
                    this.restaurantArray = response.data;
                    this.backTypology();
                });


        },
        // SCRIPT TO SELECT TYPOLOGY CARD
        typologySelection(id) {
            if (this.selectedTypologies === undefined || this.selectedTypologies.length < 3) {
                this.selectedTypologies.includes(id) ?
                    this.selectedTypologies.splice(
                        this.selectedTypologies.indexOf(id), 1) :
                    this.selectedTypologies.push(id);
                this.bannerMax = '';
            } else if (this.selectedTypologies.includes(id)) {
                this.selectedTypologies.splice(this.selectedTypologies.indexOf(id), 1)
                this.bannerMax = '';
            } else if (this.selectedTypologies.length <= 3) {
                this.bannerMax = 'modal';
                console.log(this.bannerMax);
            };
            this.getRestaurantCount(id);
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
                        // console.log(response.data);
                    });
            } else {
                this.searchResultNum = undefined;
            }
        },
        //ADD ITEMS TO CART FUNCTION
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
            };
            this.getCartTotal();
        },
        //REMOVE ITEMS FROM CART
        removeFromCart(index) {
            if (this.cartArray[index].quantity === 1) {
                this.cartArray.splice(index, 1);
            } else {
                this.cartArray[index].quantity--;
            };
            this.getCartTotal();
        },
        addItemCart(index) {
            this.cartArray[index].quantity++;
            this.getCartTotal();
        },
        //GET ORDER COST
        getCartTotal() {
            this.finalPrice = 0;
            this.cartArray.forEach((item) => {
                this.finalPrice += item.price * item.quantity;
            });
            this.$nextTick(function() {
                this.deliveryPrice = parseInt(document.getElementById('deliveryPrice').value);
                this.finalPrice += this.deliveryPrice;
                console.log(this.deliveryPrice);
            })
        },
        showPayment() {
            this.pay = true;
        },

        // FOCUS EFFECT ON CARD
        focusEffect() {
            if (this.$refs.myCard != undefined) {

                for (let i = 0; i < this.$refs.myCard.length; i++) {
                    let el = this.$refs.myCard[i];
                    const height = el.clientHeight
                    const width = el.clientWidth

                    el.addEventListener('mousemove', handleMove)

                    function handleMove(e) {
                        const xVal = e.layerX
                        const yVal = e.layerY
                        const yRotation = 20 * ((xVal - width / 2) / width)
                        const xRotation = -20 * ((yVal - height / 2) / height)
                        const string = 'perspective(500px) scale(1.1) rotateX(' + xRotation + 'deg) rotateY(' + yRotation + 'deg)'
                        el.style.transform = string
                    }
                    el.addEventListener('mouseout', function() {
                        el.style.transform = 'perspective(500px) scale(1) rotateX(0) rotateY(0)'
                    })
                    el.addEventListener('mousedown', function() {
                        el.style.transform = 'perspective(500px) scale(0.9) rotateX(0) rotateY(0)'
                    })
                    el.addEventListener('mouseup', function() {
                        el.style.transform = 'perspective(500px) scale(1.1) rotateX(0) rotateY(0)'
                    })
                }
            }
        },
        //SWITCH TYPOLOGIES AND RESTAURANT SHOW IN INDEX
        backTypology() {
            this.showRestaurant = !this.showRestaurant;
            // FOCUS EFFECT
            this.$nextTick(() => {
                this.focusEffect()
            })
        }
    },
});

// CUSTOM CURSOR
new kursor({
    type: 1,
    color: '#d30d66',
    removeDefaultCursor: true
});

// DELETE ITEM
 // banner div
 const deleteBanner = document.getElementsByClassName("delete-banner");
 // trash can
 const trash = document.getElementsByClassName("fa-trash-alt");
 // annulla
 const annulla = document.getElementsByClassName("annulla");

 for(let i = 0; i < trash.length; i++) {
     trash[i].addEventListener('click', function() {
         deleteBanner[i].classList.toggle("show");
     })
 }

 for(let j = 0; j < annulla.length; j++) {
     annulla[j].addEventListener('click', function() {
         deleteBanner[j].classList.toggle("show");
     })
 }