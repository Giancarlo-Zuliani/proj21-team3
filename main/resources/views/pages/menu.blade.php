@extends('layouts.main-layout')
<a href="{{route('index')}}">Torna alla home!</a>
{{-- RESTAURANT MENU PAGE  --}}
@section('content')

<div class="container">

  <h2 class="test"><span class="rest-name">{{$rest -> name}}</span></h2>
  {{-- CARRELLO --}}
  <form v-if="cartArray.length !== 0" action="{{ route('store-order')}}" method="POST">
    @csrf
    @method('post')
    <ul v-if="cartArray.length !== 0" class="list-group">  
      <li v-for="item, index in cartArray" class="list-group-item d-flex justify-content-between align-items-center">
        @{{item.name}} 
        <span class="badge badge-info badge-pill">
          @{{item.quantity}}                 
        </span>
        <span class="badge badge-info badge-pill">
          @{{item.price * item.quantity / 100}}€  
        </span>
        <span @click="removeFromCart(index)" class="badge badge-danger badge-pill">
          <i class="fas fa-minus"></i>
        </span>        
      </li>          
    </ul>

      <div v-for="item in cartArray">
        <input type="checkbox" name="items[]" :value="[item.id,item.quantity]" hidden checked>
      </div>
      <br>
      <input type="number" name="user_id" hidden value="{{$rest ->  id}}" >
      <input class="btn btn-success" type="submit" name="" value="Checkout">
  </form>

    {{-- MENU ITEMS --}}
    @foreach ($rest -> items as $item)        
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$item -> name}}</h5>
              <p class="card-text">{{$item -> description}}</p>
              <p class="card-text">{{$item -> price / 100}}€</p>
              <a href="#/" @click="addToCart({{$item}})" class="btn btn-primary">
                <i class="fas fa-plus"></i>
              </a>
            </div>
          </div>
        </div>      
      </div>                
    @endforeach
</div>
@endsection

