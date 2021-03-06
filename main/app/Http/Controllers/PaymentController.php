<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Braintree;

class PaymentController extends Controller
{
    public function payment(){
      $gateway = new Braintree\Gateway(config('braintree'));
        $token = $gateway -> clientToken() -> generate();
        return view('pages.checkout' , compact('token'));
    }

    public function checkout(Request $request){
      $data = $request -> all();
      $gateway = new new Braintree\Gateway( config('braintree')
      );
      $result = $gateway -> transaction() -> sale([
        'amount'=> 200,
        'paymentMethodNonce'=> $request ['payment_method_nonce'],
      ]);
      dd($result);

    }
}
