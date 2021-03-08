<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
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

      $gateway = new Braintree\Gateway( config('braintree')
      );
      $result = $gateway -> transaction() -> sale([
        'amount'=> $data['final_price'],
        'paymentMethodNonce'=> $request ['payment_method_nonce'],
      ]);
      // dd($result -> success, $data);
      $order = new Order;
      $order -> buyer_name = $data['buyer_name'];
      $order -> buyer_lastname = $data['buyer_lastname'];
      $order -> address = $data['address'];
      $order -> phone_num = $data['phone_num'];
      $order -> email = $data['email'];
      $order -> discount = $data['discount'];
      $order -> payment_status = $result -> success;
      // dd(gettype(intval($data['final_price'])));
      $order -> total_price = $data['final_price'];
      $order -> final_price = $data['final_price'];
      $order -> save();
      $order -> items() -> attach($data['dishes']);
      // dd($data['quantities']);
      for ($i=0; $i < count($data['quantities']); $i++) { 
        DB::update('update item_order set quantity =' . $data['quantities'][$i]. ' where order_id =' . $order -> id);
      }
      
      // invio email
      Mail::to($order -> email)->send(new TestMail($order));

      return redirect() -> route('success');

    }
}
