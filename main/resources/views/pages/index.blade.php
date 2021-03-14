@extends('layouts.main-layout')

@section('content')
    <div class="container">

        {{-- JUMBOTRON --}}       
        <div class="my-5 text-center container" v-if="!showRestaurant">
            <div class="row mb-2">
               <div class="col text-center">
                <h1 class="font-weight-bolder text-center">I tuoi piatti preferiti, consegnati da noi.</h1>
                <h3 class="text-center">Scopri i negozi più richiesti e ricevi alla tua porta ogni tuo desiderio.</h3>

               </div>
            </div>
            <div class="row d-flex align-items-center">
               <div class="col-1 d-flex align-items-center justify-content-center">
                  <a href="#carouselExampleIndicators" role="button" data-slide="prev">
                     <div class="carousel-nav-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                           <path d="m88.6,121.3c0.8,0.8 1.8,1.2 2.9,1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8,0l-54,53.9c-1.6,1.6-1.6,4.2 0,5.8l54,53.9z"/>
                        </svg>
                     </div>
                  </a>
               </div>
               <div class="col-10">
                  <!--Start carousel-->
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="row">
                              <div style="background-image:url({{asset('storage/assets/ordina-2.jpg')}})" class="col-12 col-md d-flex align-items-center justify-content-center">
                                <h4 class="text-white font-weight-bolder">Ordina il tuo piatto</h4>
                              </div>
                              
                              <div style="background-image:url({{asset('storage/assets/consegna.jpg')}})" class="col-12 col-md d-flex align-items-center justify-content-center">
                                <h4 class="text-white font-weight-bolder">Monitora la consegna</h4>
                              </div>
                              <div  style="background-image:url({{asset('storage/assets/eat.jpeg')}})" class="col-12 col-md d-flex align-items-center justify-content-center" class="col-12 col-md d-flex align-items-center justify-content-center">
                                 <h4 class="text-white font-weight-bolder">Buon appetito!</h4>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="row">
                              <div style="background-image:url('https://www.hotelalgamilano.it/sites/alga2torri.gisnet.it/files/Hotel_Santa_Barbara_Milano_01t.jpg')" class="col-12 col-md d-flex align-items-center justify-content-center">
                                <h4 class="text-white font-weight-bolder">Siamo nati a Milano</h4>
                              </div>
                              <div style="background-image:url('https://ilfattoalimentare.it/wp-content/uploads/2020/04/fattorino-food-delivery-consegna-a-domicilio-takeaway-AdobeStock_330797108-scaled.jpeg');" class="col-12 col-md d-flex align-items-center justify-content-center">
                                <h4 class="text-white font-weight-bolder">Rispettiamo le regole anti-COVID</h4>
                              </div>
                              <div style="background-image:url('https://static.dw.com/image/48024462_101.jpg');" class="col-12 col-md d-flex align-items-center justify-content-center" class="col-12 col-md d-flex align-items-center justify-content-center">
                                <h4 class="text-white font-weight-bolder">Più di 500 partners</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--End carousel-->
               </div>
               <div class="col-1 d-flex align-items-center justify-content-center"><a  href="#carouselExampleIndicators" data-slide="next">
                  <div class="carousel-nav-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="m40.4,121.3c-0.8,0.8-1.8,1.2-2.9,1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8,0l53.9,53.9c1.6,1.6 1.6,4.2 0,5.8l-53.9,53.9z"/>
                     </svg>
                  </div>
                  </a>
               </div>
            </div>
         </div>
         
    

        {{-- RESTAURANTS MAIN TEXT --}}
        <div class="row">
            <div class="col-md-12">
                <div v-if="showRestaurant">
                    <h1 class="font-weight-bold text-center">Ristoranti con le tue tipologie</h1>
                    <hr class="hr-index">
                </div>
            </div>
        </div>

       

        <div class="row">
            <div class="col-md-12">
                <h1 class="test"  v-if="!showRestaurant">Scegli una o più tipologie</h1>
            </div>
        </div>

         {{-- FILTER RESULT TOTAL --}}
         <div id="tipologie" class="row">
            <div   
                class="text-center search-count col-md-12" 
                :class="searchResultNum != undefined ? 'show' : 'hide'"
                >
                <h5 
                    v-if="searchResultNum >= 2 && searchResultNum != 1"
                    >
                    La tua ricerca ha prodotto @{{searchResultNum}} risultati.
                </h5>
                <h5 
                    v-if="searchResultNum === 1"
                    >
                    La tua ricerca ha prodotto 1 risultato.
                </h5>
                <h5 
                    v-if="searchResultNum === 0
                    || searchResultNum === undefined
                    || searchResultNum === null"
                    >
                    La tua ricerca non ha prodotto risultati.
                </h5>                        
            </div>
        </div>
        
        {{-- SEARCH BUTTON --}}
        <div class="row">
            <div 
                class="col-md-12 search text-center"
                :class="!showRestaurant && searchResultNum > 0 ? 'show' : 'hide'"
                >
                <button class="btn btn-primary btn-results border-0 " @click="getRestaurants">   
                    <i class="fas fa-search"></i>
                    <span class="font-weight-bold">Vai ai risultati</span>                                            
                </button>
            </div>
        </div>
                      
        {{-- RETURN HOME BUTTON --}}
        <div class="row">
            <div
                class="col-md-12 search text-center"
                v-if="showRestaurant"
                >
                <a href="#tipologie">
                <button class="btn btn-primary btn-results border-0 " @click="backTypology()">   
                    <i class="fas fa-arrow-left"></i>
                    <span class="font-weight-bold">Torna alle tipologie</span>                                            
                </button>
                </a>
            </div>
        </div>

        {{-- TYPOLOGIES --}}
        <div class="row my-4 " v-if="!showRestaurant">                
            {{-- <h1 class="test">Scegli una o più tipologie</h1> --}}

            <div             
                v-for="type in typologyArray"
                class="typobox col-md-6 col-lg-4" 
                >
                <div
                    class="tilt card mx-auto shadow" style="width: 18rem; margin: 20px;"
                    ref="myCard"
                    
                    :data-toggle="bannerMax"
                    data-target="#maxThree"
                    :class="[selectedTypologies.includes(type.id) ? 'selected' : '']"             
                    @click="typologySelection( type.id )"    
                >
                    <img class="card-img-top" style="height:180px; width:286px;" :src=`{{asset('storage/assets/typologies/', '')}}/${type.image}.webp`>
                    <div class="card-body card-index">
                        <h6 id="card-text" class="text-capitalize text-center font-weight-bold">@{{type.typology}}</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- RESTAURANTS --}}
        <div class="row my-4" v-if="showRestaurant">                
            <h1 class="test">Scegli il tuo ristorante</h1>
            <div                 
                v-for="(rest, index) in restaurantArray"
                class="col-md-6 col-lg-4"
                >          
                <a :href=`{{route('show-menu','')}}/${rest.id}`>      
                <div class="tilt restaurant-card card shadow mx-auto" style="width: 18rem; margin: 20px;"
                    ref="myCard"
                    id="menu"
                >
                    <img class="card-img-top" style="height:180px; width:286px;" :src=`{{asset('storage/assets/users/', '')}}/${rest.img}.webp`>
                    <div class="card-body card-index">
                        <h6 id="card-text" class="text-capitalize text-center font-weight-bold">@{{rest.name}}</h6>
                    </div>

                    {{-- RESTAURANTS INFO  --}}
                    <div id="list">                        
                        <div class="price-container">
                            <img style="max-width:25px;" src="{{asset('storage/assets/delivery.svg')}}">
                            <span>@{{rest.price_delivery / 100}}€</span>
                        </div>
                        <span 
                            class="text-capitalize typology-name"
                            v-for="typology in restaurantArray[index].typologies"
                            >
                            @{{typology.typology}}   
                        </span>                                                                                                    
                    </div>  
                

                </div>
                </a>
            </div>                        
        </div>
    
  
        <!-- SELECT MAX 3 TYPOLOGIES WARNING -->
        <div class="modal fade" id="maxThree" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header mx-auto">
                <h5 class="modal-title text-center"
                        id="exampleModalLongTitle">
                        Spiacente, seleziona al massimo 3 tipologie.
                        <br>
                        <i class="fas fa-exclamation-triangle"></i>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="far fa-times-circle"></i>
                </button>
                </div>
            </div>
            </div>
        </div>
        
    </div>
@endsection