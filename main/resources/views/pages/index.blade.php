@extends('layouts.main-layout')
{{-- INDEX (HOME PAGE WEBSITE (all typologies)) --}}
@section('content')

  <div class="container">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Area utente</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

    </div>
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

    {{-- TYPOLOGIES AND RESTAURANTS --}}
    <section>
        <div v-if="!showRestaurant" class="row">
            {{-- typology container --}}
            <div
                class="typologybox"
                :class="[selectedTypologies.includes(type.id) ? 'selected' : '']"                    
                v-for="type in typologyArray"
                @click="typologySelection( type.id )"
                {{-- v-if="!showRestaurant" --}}
             >
               <span class="typolo-name">@{{type.typology}}</span> 
                {{-- TYPOLOGY IMG --}}
                <div class="img-container">
                    <img class="typology-img" :src=`{{asset('storage/assets/typologies/', '')}}/${type.image}.webp`>
                </div>
                
            </div>
        </div>

        {{-- restaurant container --}}
        <div class="row">    
            <div v-if="showRestaurant">
                {{-- <h3>Ci sono @{{restaurantArray.length}} ristoranti con le tipologie che hai scelto:</h3> --}}
                <a v-for="rest in restaurantArray" :href=`{{route('show-menu','')}}/${rest.id}`>
                    <div class="restaurant-name">
                        @{{rest.name}}
                    </div>
                </a>
            </div>
        </div>

        {{-- no restaurants --}}
        <div v-if="restaurantArray.length < 1 && showRestaurant">
            <h1>
                Nessun ristorante è stato trovato.
            </h1>
        </div>
    </section>
@endsection
