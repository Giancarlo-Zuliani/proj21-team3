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

    <form class="" action="{{ route('store-order')}}" method="POST">
      @csrf
      @method('post')
    <div v-if="cartArray.length !== 0" class="carrello">
      <ul>
        <li v-for="item , index in cartArray">
          @{{item.name}} @{{item.quantity}} <i class="fas fa-minus" @click="removeFromCart(index)"></i>
        </li>
      </ul>
    </div>

    <div id="orderbox">
      <div class="" v-for="item in cartArray">
        <input type="checkbox" name="items[]" :value="[item.id,item.quantity]" checked>


      </div>
      <input type="submit" name="" value="Checkout">
      <!-- <a href="{{route('store-order')}}"> <button>vai al pagamento</button> </a> -->
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
