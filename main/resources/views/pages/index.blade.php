@extends('layouts.main-layout')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            {{-- <div class="col-md-12" style="background-color:blue;"> --}}
                
                <h1 class="test">Scegli una o più tipologie</h1>
                {{-- TYPOLOGIES --}}
                <div 
                    v-if="!showRestaurant"
                    v-for="type in typologyArray"
                    class="col-md-6 col-lg-4"
                    >

                        <div
                            class="card justify-content-center mx-auto" style="width: 18rem; margin: 20px;"
                            :class="[selectedTypologies.includes(type.id) ? 'selected' : '']"                                                
                            @click="typologySelection( type.id )"
                        >
                            <img class="card-img-top" style="height:180px; width:286px;" :src=`{{asset('storage/assets/typologies/', '')}}/${type.image}.webp`>
                            <div class="card-body">
                                <h6 class="card-title text-center font-weight-bold">@{{type.typology}}</h6>
                            </div>
                        </div>                
                </div>

            {{-- </div> --}}
        </div>
    </div>

@endsection