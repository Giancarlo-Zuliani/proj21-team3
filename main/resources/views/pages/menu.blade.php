@extends('layouts.main-layout')
<a href="{{route('index')}}">Torna alla home!</a>
{{-- RESTAURANT MENU PAGE  --}}
@section('content')

    <h2>Scegli cosa mangiare nel ristorante <span class="rest-name">{{$rest -> name}}</span></h2> 
    <br>
    <ul>
      @foreach ($rest -> items as $item)
        <div>
          <span> {{$item -> name}} , {{$item -> description}}</span>
          <a href="#"><i class="fas fa-plus" @click ="addToCart({{$item}})">ADD</i></a>
        </div>
      @endforeach
    </ul>

    {{-- carrello --}}
    <div v-if="cartArray.length !== 0" class="carrello">
      <ul>
        <li v-for="item , index in cartArray">
          @{{item.name}} @{{item.quantity}} <i class="fas fa-minus" @click="removeFromCart(index)"></i>
        </li>
      </ul>
    <button @click="showPayment()">Check-out !</button> 
    </div>

    <div id="orderbox">
     
      <form action="{{route('store-order')}}" method="POST">
        @csrf
        @method('post')
        <label for="buyer_name">Nome:</label>
        <input type="text" name="buyer_name"> <br>
        <label for="buyer_lastname">Cognome:</label>
        <input type="text" name="buyer_lastname">
        <label for="address">Indirizzo</label>
        <input type="text" name="address">
        <label for="phone_num">Telefono</label>
        <input type="text" name="phone_num">
        <label for="email">e-mail</label>
        <input type="text" name="email">
        <input type="text" name="discount" hidden value="0">
        
        <input v-for="item in cartArray" name="items[]" :value="[item.id,item.quantity]" type="checkbox" hidden checked>
        {{-- <input v-for="item in cartArray" name="items[]" :value="item.quantity" type="checkbox" hidden checked> --}}

        <input type="submit">
      </form>
    </div>

@endsection
{{-- ITEM COMPONENT --}}
{{-- @section('itemContainer')
  <ul>
    @foreach ($rest -> items as $item)
      <Item
        :name = "'{{$item -> name}}'"
        :description = "'{{$item -> description}}'"

      ></Item>
    @endforeach
  </ul>
@endsection --}}
