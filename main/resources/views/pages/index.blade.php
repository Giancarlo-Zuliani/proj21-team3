@extends('layouts.main-layout')

@section('content')
    <div class="typologybox" v-for="type in randomTypoArray" @click="getRestaurant(type.id)" v-if="showtypo">
        @{{type.typology}}
    </div>
    <a v-for="rest in restaurantArray" :href=`{{route('show-menu','')}}/${rest.id}`>
        <div  class="typologybox" v-if="showRestaurant">
            @{{rest.name}}
        </div>
    </a>
@endsection
