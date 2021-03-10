@extends('layouts.main-layout')

@section('content')
    <div class="container">

         {{-- SEARCH COUNT CONTAINER --}}
        <div class="ricerca" v-if="searchResultNum != undefined">
            <h4 v-if="searchResultNum > 0">
                La tua ricerca ha prodotto @{{searchResultNum}} risultati.
            </h4>
            <h4 v-if="searchResultNum === 0">
                La tua ricerca non ha prodotto risultati.
            </h4>
        </div>

        {{-- SEARCH ICON --}}
        <div class="search">
            <i v-if="selectedTypologies.length > 0 && selectedTypologies !== null && selectedTypologies !== undefined" class="fas fa-search-dollar" @click="getRestaurants"></i>
        </div>

        {{-- BACK TO TYPOLOGIES BUTTON --}}
        <span 
            v-if="showRestaurant"
            class="console"        
            @click="showRestaurant = !showRestaurant">
                <i class="fas fa-arrow-left"></i>
        </span>

        {{-- NO RESTAURANTS FOUND --}}
        <div v-if="restaurantArray.length < 1 && showRestaurant">
         <h1>
               Nessun ristorante è stato trovato.
         </h1>
        </div>  

        {{-- TYPOLOGIES --}}
        <div class="row" v-if="!showRestaurant">                
            <h1 class="test">Scegli una o più tipologie</h1>

            <div                 
                v-for="type in typologyArray"
                class="col-md-6 col-lg-4" 
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