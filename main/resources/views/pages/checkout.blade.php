@extends('layouts.main-layout')

@section('content')
    <div class="container-center">

        <div class="payment-checkout">

              <form method="post" id="payment-form" class="payment-checkout-form" action="{{  route('checkout') }}"">
                  @csrf
                  @method('post')
                <section>
                    <input type="text" placeholder="name" >
                      <div>
                         <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="150" style="display:none">

                         style="display:none">
                     </div>
                  </label>
                  <div class="bt-drop-in-wrapper">
                     <div id="bt-dropin"></div>
                  </div>
                </section>


                <input id="client_token" name="token" type="hidden" value="{{ $token }}"/>
                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <input id="sponsor_plan" name="sponsor_plan" type="hidden" value="51" />
                <div class="pay-button">
                <button class="btn-succes" type="submit">
                          <span>Paga e avvia la sponsorizzazione</span>

                </button>
                </div>
              </form>
        </div>
    </div>
<script src="https://js.braintreegateway.com/web/dropin/1.22.1/js/dropin.min.js"></script>

@endsection
