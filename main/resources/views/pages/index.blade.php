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
    <div v-if="searchResultNum != undefined">
        <h5 v-if="searchResultNum > 0">
            la tua ricerca ha prodotto @{{searchResultNum}} risultati;
        </h5>
        <h5 v-if="searchResultNum === 0">
            la tua ricerca  non ha prodotto risultati;
        </h5>
    </div>
    
    <div>
        <i v-if="selectedTypologies.length > 0 && selectedTypologies !== null && selectedTypologies !== undefined" class="fas fa-search-dollar" @click="getRestaurants"></i>
    </div>
    {{-- Back to Typologies button --}}
    <div v-if="showRestaurant" class="console" @click="showRestaurant = !showRestaurant">
        <i class="fas fa-arrow-left"></i>
    </div>

    <section>
        <div class="row">
            {{-- typology container --}}
            <div class="typologybox" v-for="type in typologyArray" @click="typologySelection( type.id )" v-if="!showRestaurant" class="">
                @{{type.typology}}
            </div>
        </div>

        {{-- restaurant container --}}
        <div v-if="showRestaurant">
            <h3>ci sono tot ristoranti @{{restaurantArray.length}}</h3>
            <a v-for="rest in restaurantArray" :href=`{{route('show-menu','')}}/${rest.id}`>
                <div  class="typologybox" >
                    @{{rest.name}}
                </div>
            </a> 
        </div>

        <div v-if="restaurantArray.length < 1 && showRestaurant">

            <h1>
                NON CI SONO RISTORANTI
            </h1>

        </div>
    </section>
@endsection
