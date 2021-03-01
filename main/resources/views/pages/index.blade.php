@extends('layouts.main-layout')
@section('content')

  <div class="container">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

    </div>
    {{-- Back to Typologies button --}}
    <div v-if="showRestaurant" class="console" @click="showRestaurant = !showRestaurant">
        <i class="fas fa-arrow-left"></i>
    </div>

    <section>
        <div class="row">
            {{-- typology container --}}
            <div class="typologybox" v-for="type in randomTypoArray" @click="getRestaurant(type.id)" v-if="!showRestaurant" class="">
                @{{type.typology}}
            </div>
        </div>

        {{-- restaurant container --}}
        <a v-for="rest in restaurantArray" :href=`{{route('show-menu','')}}/${rest.id}`>
            <div  class="typologybox" v-if="showRestaurant">
                @{{rest.name}}
            </div>
        </a>

    </section>
@endsection
