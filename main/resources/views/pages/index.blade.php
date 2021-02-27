@extends('layouts.main-layout')
@section('content')

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
