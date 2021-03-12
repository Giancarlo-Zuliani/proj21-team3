@extends('layouts.main-layout')

@section('content')
    <div class="container">

        {{-- TYPOLOGIES MAIN TEXT --}}
        <div class="row">
            <div class="col-md-12">
                <div v-if="!showRestaurant">
                    <h1 class="font-weight-bold text-center">In evidenza a Milano</h1>
                    <h3 class="text-center">Scopri i negozi più richiesti e ricevi alla tua porta ogni tuo desiderio.</h3>
                    <hr class="hr-index">
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

        {{-- FILTER RESULT TOTAL --}}
        <div class="row">
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
                    <span>Vai ai risultati</span>                                            
                </button>
            </div>
        </div>
                      
        {{-- RETURN HOME BUTTON --}}
        <div class="row">
            <div
                class="col-md-12 search text-center"
                v-if="showRestaurant"
                >
                <button class="btn btn-primary btn-results border-0 " @click="backTypology()">   
                    <i class="fas fa-arrow-left"></i>
                    <span>Torna alle tipologie</span>                                            
                </button>
            </div>
        </div>

        {{-- TYPOLOGIES --}}
        <div class="row my-4 " v-if="!showRestaurant">                
            <h1 class="test">Scegli una o più tipologie</h1>

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
                <div class="tilt card shadow mx-auto" style="width: 18rem; margin: 20px;"
                    ref="myCard"
                >
                    <img class="card-img-top" style="height:180px; width:286px;" :src=`{{asset('storage/assets/users/', '')}}/${rest.img}.webp`>
                    <div class="card-body card-index">
                        <h6 id="card-text" class="text-capitalize text-center font-weight-bold">@{{rest.name}}</h6>                            
                    </div>
                
                {{-- // GET RESTAURANTS TYPOLOGIES  --}}
                <span v-for="typology in restaurantArray[index].typologies">
                    @{{typology.typology}}   
                </span>                               
                
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