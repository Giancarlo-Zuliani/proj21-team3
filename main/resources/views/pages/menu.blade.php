@extends('layouts.main-layout')
{{-- RESTAURANT MENU PAGE  --}}
@section('content')



<div class="container">
  <div class="row justify-content-center align-items-stretch">
    <div class="col-12">
      <div class="jumboTron">
        <img src="{{asset('storage/img/' . $rest -> img)}}" alt="">
        <h2  id="restaurant-name"><span id="rest-name"><strong>{{$rest -> name}}</strong> </span></h2>
      </div>
    </div>

  </div>
  <h1 class="darkBlue" > <strong>Menu</strong> </h1>
  <div id="carTxs" class="row">
    <div class="col-12 my-2" v-if="cartArray.length !== 0">
      <div class="card shadow cardRadius">
        <div class="card-body">
          <div class="itemFlex cartAlign">
            <h5 class="darkBlue"><strong>Il tuo carrello</strong></h5>
            <div class="imgDel itemFlex cartAlign">
              <img src="{{asset('storage/assets/delivery.svg')}}" alt="">
              <p class="cartDel darkBlue">{{$rest -> price_delivery / 100}}€</p>
            </div>
            <form class="itemFlex cartAlign" action="{{ route('store-order')}}" method="POST">
              @csrf
              @method('post')
              <ul class="list-group">
                <li v-for="item, index in cartArray" class="list-group-item  border-0">
                  <div class="cartInfo">
                    <span class="darkBlue">
                      @{{item.quantity}}x
                    </span>
                    <span class="darkBlue">
                      @{{item.name}}
                    </span>
                    <span class="darkBlue">
                      @{{item.price * item.quantity / 100}}€
                    </span>
                  </div>
                  <div class="cartInfo">
                    <span @click="removeFromCart(index)">
                      <i class="fas fa-minus-circle roundColor"></i>
                    </span>
                    <div class="darkBlue">
                      @{{item.ingredients}}
                    </div>
                    <span @click="addItemCart(index)">
                      <i class="fas fa-plus-circle roundColor"></i>
                    </span>
                  </div>
                </li>
              </ul>
              <div class="cartInfo">
                <span class="darkBlue">
                  <strong>TOTALE Prodotti:</strong>
                </span>
                <span class="darkBlue">
                  <strong>@{{finalPrice / 100}}€</strong>
                </span>
              </div>
              <div v-for="item in cartArray">
                <input type="checkbox" name="items[]" :value="[item.id,item.quantity]" hidden checked>
              </div>
              <br>
              <input type="number" name="user_id" hidden value="{{$rest ->  id}}" >
              <input id="pagamento" class="btn btn-success" type="submit" name="" value="Vai al pagamento">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    {{-- MENU ITEMS --}}
    <div class="col-xs-12 col-md-6 col-lg-8" v-if="cartArray.length !== 0">
      <div class="row">
        @foreach ($rest -> items as $item)
            <div v-if="{{$item -> deleted}} === 0" class="col-xs-12 col-lg-6 my-2">
              <div class="card shadow itemHover cardRadius">
                <div class="card-body">
                  <h5 class="card-title itemName"><strong>{{$item -> name}}</strong></h5>
                  <p class="card-text itemDescription darkBlue" style="height: 30px; margin-bottom: 30px;">{{$item -> description}}</p>
                  <p class="card-text itemDescription darkBlue" style="height: 50px;">Ingredienti: {{$item -> ingredients}}</p>
                  <div v-if="{{$item -> available}}" class="itemFlex justifySpace">
                    <span class="card-text darkBlue"><strong>{{$item -> price / 100}}€</strong></span>
                    <span v-if="{{$item -> gluten}}" class="card-text darkBlue"><strong>Glutine: SI</strong></span>
                    <span v-else class="card-text darkBlue"><strong>Glutine: NO</strong></span>
                    <span v-if="{{$item -> lactose}}" class="card-text darkBlue"><strong>Lattosio: SI</strong></span>
                    <span v-else class="card-text darkBlue"><strong>Lattosio: NO</strong></span>
                    <span @click="addToCart({{$item}})">
                      <i class="fas fa-plus-circle roundColor"></i>
                    </span>
                  </div>
                  <div v-else class="itemFlex justifySpace">
                    <span id="notAvailable" class="card-text darkBlue"><strong>PRODOTTO MOMENTANEAMENTE NON DISPONIBILE</strong></span>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
      </div>

    </div>
    <div v-else class="col-12">
      <div class="row justify-content-center">
        @foreach ($rest -> items as $item)
            <div v-if="{{$item -> deleted}} === 0" class="col-xs-12 col-md-6 col-lg-4 my-2">
              <div class="card shadow itemHover cardRadius">
                <div class="card-body">
                  <h5 class="card-title itemName"><strong>{{$item -> name}}</strong></h5>
                  <p class="card-text itemDescription darkBlue" style="height: 30px; margin-bottom: 30px;">{{$item -> description}}</p>
                  <p class="card-text itemDescription darkBlue" style="height: 50px;">Ingredienti: {{$item -> ingredients}}</p>
                  <div v-if="{{$item -> available}}" class="itemFlex justifySpace">
                    <span class="card-text darkBlue"><strong>{{$item -> price / 100}}€</strong></span>
                    <span v-if="{{$item -> gluten}}" class="card-text darkBlue"><strong>Glutine: SI</strong></span>
                    <span v-else class="card-text darkBlue"><strong>Glutine: NO</strong></span>
                    <span v-if="{{$item -> lactose}}" class="card-text darkBlue"><strong>Lattosio: SI</strong></span>
                    <span v-else class="card-text darkBlue"><strong>Lattosio: NO</strong></span>
                    <span @click="addToCart({{$item}})">
                      <i class="fas fa-plus-circle roundColor"></i>
                    </span>
                  </div>
                  <div v-else class="itemFlex justifySpace">
                    <span id="notAvailable" class="card-text darkBlue"><strong>PRODOTTO MOMENTANEAMENTE NON DISPONIBILE</strong></span>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
      </div>

    </div>

    {{-- CARRELLO --}}


    <div id="cartLat" class="col-xs-12 col-md-6 col-lg-4 my-2" v-if="cartArray.length !== 0">
      <div class="card shadow cardRadius">
        <div class="card-body">
          <div class="itemFlex cartAlign">
            <h5 class="darkBlue"><strong>Il tuo carrello</strong></h5>
            <div class="imgDel itemFlex cartAlign">
              <img src="{{asset('storage/assets/delivery.svg')}}" alt="">
              <p class="cartDel darkBlue">{{$rest -> price_delivery / 100}}€</p>
            </div>
            <form class="itemFlex cartAlign" action="{{ route('store-order')}}" method="POST">
              @csrf
              @method('post')
              <ul class="list-group">
                <li v-for="item, index in cartArray" class="list-group-item  border-0">
                  <div class="cartInfo">
                    <span class="darkBlue">
                      @{{item.quantity}}x
                    </span>
                    <span class="darkBlue">
                      @{{item.name}}
                    </span>
                    <span class="darkBlue">
                      @{{item.price * item.quantity / 100}}€
                    </span>
                  </div>
                  <div class="cartInfo">
                    <span @click="removeFromCart(index)">
                      <i class="fas fa-minus-circle roundColor"></i>
                    </span>
                    <div class="darkBlue">
                      @{{item.ingredients}}
                    </div>
                    <span @click="addItemCart(index)">
                      <i class="fas fa-plus-circle roundColor"></i>
                    </span>
                  </div>
                </li>
              </ul>
              <div class="cartInfo">
                <span class="darkBlue">
                  <strong>TOTALE Prodotti:</strong>
                </span>
                <span class="darkBlue">
                  <strong>@{{finalPrice / 100}}€</strong>
                </span>
              </div>
              <div v-for="item in cartArray">
                <input type="checkbox" name="items[]" :value="[item.id,item.quantity]" hidden checked>
              </div>
              <br>
              <input type="number" name="user_id" hidden value="{{$rest ->  id}}" >
              <input id="pagamento" class="btn btn-success" type="submit" name="" value="Vai al pagamento">
            </form>
          </div>
          <input id="deliveryPrice" type="number" name="" value="{{$rest -> price_delivery}}" hidden>
        </div>

      </div>
    </div>
  </div>


</div>
@endsection
