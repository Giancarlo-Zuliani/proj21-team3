@extends('layouts.main-layout')

@push('scriptPayment')
  <script src="{{asset('js/payment.js')}}"></script>
@endpush

@section('content')
    <div class="container">
          {{-- MENU ITEMS --}}
          <div class="row">
          @foreach ($orderedItems as $item)
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$item -> name}}</h5>
                  <p class="card-text">Quantità: {{$quantities [$loop -> index]}}</p>
                  <p class="card-text">Prezzo:{{$item -> price * $quantities [$loop -> index] / 100}}€</p>
                </div>
              </div>
            </div>
            @endforeach
            {{-- FORM PAYMENT --}}
              <form method="post" id="payment-form" class="payment-checkout-form" action="{{  route('checkout') }}">
                  @csrf
                  @method('post')
                      <div>
                         <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="150" style="display:none">
                     </div>
                  </label>
                  {{-- <div class="bt-drop-in-wrapper">
                     <div id="bt-dropin"></div>
                  </div> --}}
                  {{-- BUYER INFO --}}
                  <div class="form-row">
                    <div class="form-group">
                      <label for="buyer_name">Nome</label>
                      <input type="text" name="buyer_name" class="form-control" id="buyer_name" placeholder="Nome" required minlength="3">
                    </div>
                    <div class="form-group">
                      <label for="buyer_lastname">Cognome</label>
                      <input type="text" name="buyer_lastname" class="form-control" id="buyer_lastname" placeholder="Cognome" required minlength="3">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="address">Indirizzo</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Indirizzo" required minlength="5">
                  </div>
                  <div class="form-group">
                    <label for="phone_num">Numero di telefono</label>
                    <input type="text" class="form-control" id="phone_num" name="phone_num" value="" placeholder="Numero di telefono" required minlength="10">
                  </div>
                  <div class="form-group" >
                    {{-- <label for="discount">Sconto</label> --}}
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

                  {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif --}}

                  <div class="bt-drop-in-wrapper">
                     <div id="bt-dropin"></div>
                  </div>

                <input id="client_token" name="token" type="hidden" value="{{ $token }}">
                <input id="nonce" name="payment_method_nonce" type="hidden" >
                <div class="pay-button">


                <button class="btn btn-success" type="submit">
                  Paga
                </button>
                </div>
            </form>

        </div>
<script src="https://js.braintreegateway.com/web/dropin/1.22.1/js/dropin.min.js"></script>
@endsection
