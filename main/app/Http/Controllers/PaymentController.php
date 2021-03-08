<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Item;
use App\Order;
use Braintree;

class PaymentController extends Controller
{
    public function payment(Request $request){
      $data = $request -> all();
      $dishes = [];
      $quantities = [];
      foreach($data['items'] as $item){
          $arr = explode(',' , $item);
          $dishes[] = $arr [0];
          $quantities[] = $arr[1];
      };
      $total_price = 0;
      $index = 0;
      foreach($dishes as $dish){
          $piatto = Item::findOrFail($dish);
          $prezzo = $piatto -> price * $quantities[$index];
          $total_price += $prezzo;
          $index++;
      };

      $orderedItems = Item::findOrFail($dishes);
      $fixedPrice = $total_price /100;
      $gateway = new Braintree\Gateway(config('braintree'));
        $token = $gateway -> clientToken() -> generate();
        return view('pages.checkout' , compact('token','fixedPrice', 'dishes','quantities','orderedItems'));
    }

    public function checkout(Request $request){
      $data = $request -> all();

      // Validator::make($data,
      //   [
      //       'buyer_name' => 'required|string|min:3',
      //       'buyer_lastname' => 'required|string|min:3',
      //       'email' => 'required|email',
      //       'address' => 'required|string|min:5',
      //       'phone_num' => 'required|string|min:10',
      //   ])
      //   ->validate();

      $gateway = new Braintree\Gateway( config('braintree')
      );
      $result = $gateway -> transaction() -> sale([
        'amount'=> 200,
        'paymentMethodNonce'=> $request ['payment_method_nonce'],
      ]);
      dd($result, $data);

    }
}
