@extends('layouts.main-layout')

@push('scriptPayment')
  <script src="{{asset('js/payment.js')}}"></script>
@endpush

@section('content')


<div class="container col-lg-11">
  <h1><strong>Informazioni di contatto</strong></h1>
  <div  class="row col-md-12">  
    {{-- FORM PAYMENT --}}
    <form method="post" id="payment-form" class="payment-checkout-form col-md-12 col-lg-5" action="{{  route('checkout') }}">
      @csrf
      @method('post')
      <div>
        <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="150" style="display:none">
      </div>
    </label>
    {{-- BUYER INFO --}}
    <div class="form-group">
      <label for="buyer_name">Nome</label>
      <input type="text" name="buyer_name" class="form-control" id="buyer_name" placeholder="Nome" required minlength="3">
    </div>
    <div class="form-group ">
      <label for="buyer_lastname">Cognome</label>
      <input type="text" name="buyer_lastname" class="form-control" id="buyer_lastname" placeholder="Cognome" required minlength="3">
    </div>
    
    <div class="form-group ">
      <label for="email">Email</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
    </div>
    
    <div class="form-group ">
      <label for="address">Indirizzo</label>
      <input type="text" class="form-control" name="address" id="address" placeholder="Indirizzo" required minlength="5">
    </div>
    <div class="form-group ">
      <label for="phone_num">Numero di telefono</label>
      <input type="text" class="form-control" id="phone_num" name="phone_num" value="" placeholder="Numero di telefono" required minlength="10">
    </div>
    <div class="form-group" >
          <input type="text" class="form-control" name="discount" id="discount" value="123" placeholder="Sconto" hidden>
        </div>
        <div class="form-group" hidden>
          <label for="final_price">Totale</label>
          <input type="number" class="form-control" name="final_price" id="final_price" value="" placeholder="Totale">
        </div>
        
        
        @foreach ($dishes as $dish)
        <input type="checkbox" name="dishes[]"value="{{$dish}}" checked hidden>
        @endforeach
        
        @foreach ($quantities as $quantity)
        <input type="checkbox" name="quantities[]"value="{{$quantity}}" checked hidden>
        @endforeach
       
        <h1> <strong>Dati di pagamento</strong> </h1>
         <div class="bt-drop-in-wrapper">
           <div id="bt-dropin"></div>
         </div>
         <input id="client_token" name="token" type="hidden" value="{{ $token }}">
         <input id="nonce" name="payment_method_nonce" type="hidden" >
         <div class="pay-button text-center">
           <button class="btn" type="submit">
            Conferma ordine
           </button>
       </div>
     </form>
     <div class= "col-lg-2"></div>
     {{-- MENU ITEMS --}}
      <div id="checkoutcart" class=" col-lg-5 text-center">
        <div class= "stick">
          <div class="card">
            <h1>Il tuo ordine</h1>
            <img class="center" src="{{asset('storage/assets/delivery.svg')}}" alt="">
            <h5>{{$deliveryPrice / 100}}€</h5>
            @foreach ($orderedItems as $item)
            <div class="card-body">
                 <h6>{{$quantities[$loop -> index]}}x</h6>
                 <h5>{{$item -> name}}</h5>
                 <h6>€{{$item -> price * $quantities [$loop -> index] / 100}} </h6>
            </div>
            @endforeach
            <div id="carttotal">
              <h5>Totale:</h5>
              <h5>{{$fixedPrice}}€</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div id= "waitBanner">
  <img src="{{asset('storage/assets/pac-man.svg')}}" alt="">
  <div id= "bannerstringcontainer">
    <h2 >stiamo processando il suo ordine </h2>
    <span id = "processingAnimation"></span>
  </div>
</div>
@endsection
<script src="https://js.braintreegateway.com/web/dropin/1.22.1/js/dropin.min.js"></script>
