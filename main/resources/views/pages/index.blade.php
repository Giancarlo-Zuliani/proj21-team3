@extends('layouts.main-layout')

@section('content')
    <div class="container">

        {{-- NO RESTAURANTS FOUND --}}
        {{-- <div v-if="restaurantArray.length < 1 && showRestaurant">
         <h1>
               Nessun ristorante è stato trovato.
         </h1>
        </div>   --}}

        {{-- WELCOME PAGE TEXT  --}}
        <span v-if="!showRestaurant">
            <h1 class="font-weight-bold text-center">In evidenza a Milano</h1>
            <h3 class="text-center">Scopri i negozi più richiesti e ricevi alla tua porta ogni tuo desiderio.</h3>
            <hr class="hr-index">
        </span>

        {{-- SEARCH COUNT CONTAINER --}}
        <div   
            class="text-center" 
            :class="searchResultNum != undefined ? 'show' : 'hide'"
            {{-- v-if="searchResultNum != undefined" --}}
            >

            <h4 
                {{-- v-if="searchResultNum > 2" --}}
                :class="searchResultNum > 2 && searchResultNum != 1 ? 'show' : 'hide'"
                >
                La tua ricerca ha prodotto @{{searchResultNum}} risultati.
            </h4>
            <h4 
                v-if="searchResultNum === 1"
                {{-- :class="searchResultNum == 1 ? 'show' : 'hide'" --}}
                >
                La tua ricerca ha prodotto 1 risultato.
            </h4>
            <h4 
                v-if="searchResultNum === 0"
                {{-- :class="searchResultNum === 0 ? 'show' : 'hide'" --}}
                >
                La tua ricerca non ha prodotto risultati.
            </h4>
            <h4>
                <i 
                    {{-- v-if="selectedTypologies.length > 0 && selectedTypologies !== null && selectedTypologies !== undefined" --}}
                    class="fas fa-search btn btn-primary"
                    {{-- :class="selectedTypologies.length > 0 
                            && selectedTypologies !== null
                            && selectedTypologies !== undefined
                            ? 'show' : 'hide'
                            " --}}
                    @click="getRestaurants">                 
                    Vai ai risultati
                </i>
            </h4>            
        </div>
    
        {{-- SEARCH BUTTON --}}
        <div class="row">
            <div class="col-md-12 search">
                
            </div>
        </div>
        
    
        {{-- BACK TO TYPOLOGIES BUTTON --}}
        <span 
            v-if="showRestaurant"
            class="console"        
            @click="showRestaurant = !showRestaurant">
                <i class="fas fa-arrow-left"></i>
        </span>

        {{-- TYPOLOGIES --}}
        <div class="row" v-if="!showRestaurant">                
            <h1 class="test">Scegli una o più tipologie</h1>

            <div             
                v-for="type in typologyArray"
                class="typobox col-md-6 col-lg-4" 
                >
                <div
                    class="card mx-auto" style="width: 18rem; margin: 20px;"
                    :class="[selectedTypologies.includes(type.id) ? 'selected' : '']"                                                
                    @click="typologySelection( type.id )"
                >
                    <img class="card-img-top" style="height:180px; width:286px;" :src=`{{asset('storage/assets/typologies/', '')}}/${type.image}.webp`>
                    <div class="card-body">
                        <h6 class="card-title text-center font-weight-bold">@{{type.typology}}</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- RESTAURANTS --}}
        <div class="row" v-if="showRestaurant">                
            <h1 class="test">Scegli il tuo ristorante</h1>
            <div                 
                v-for="rest in restaurantArray"
                class="col-md-6 col-lg-4"
                >                
                <div class="card mx-auto" style="width: 18rem; margin: 20px;">       
                    <img class="card-img-top" style="height:180px; width:286px;" :src=`{{asset('storage/assets/users/', '')}}/${rest.img}.webp`>
                    <div class="card-body">
                        <a :href=`{{route('show-menu','')}}/${rest.id}`>
                            <h6 class="card-title text-center font-weight-bold">@{{rest.name}}</h6>                            
                        </a>
                    </div>
                </div>
            </div>                        
        </div>

    </div>
@endsection