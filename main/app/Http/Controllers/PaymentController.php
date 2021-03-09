<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Item;
use App\Order;
use App\User;
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
      $orderedItems = Item::findOrFail($dishes);
      $user = User::findOrFail($data['user_id']);
      $deliveryPrice = $user -> price_delivery;
      $fixedPrice = $this -> getFinalPrice($dishes , $quantities,$deliveryPrice);
      $gateway = new Braintree\Gateway(config('braintree'));
        $token = $gateway -> clientToken() -> generate();
        return view('pages.checkout' , compact('token','fixedPrice', 'dishes','quantities','orderedItems'));
    }

    public function checkout(Request $request){
      $data = $request -> all();
      $dish = Item::findOrFail($data['dishes'][0]);
      $deliveryPrice = $dish -> user -> price_delivery;
      $gateway = new Braintree\Gateway( config('braintree')
      );
      $result = $gateway -> transaction() -> sale([
        'amount'=> $this -> getFinalPrice($data['dishes'] , $data['quantities'] ,$deliveryPrice),
        'paymentMethodNonce'=> $request ['payment_method_nonce'],
      ]);
      $order = new Order;
      $order -> buyer_name = $data['buyer_name'];
      $order -> buyer_lastname = $data['buyer_lastname'];
      $order -> address = $data['address'];
      $order -> phone_num = $data['phone_num'];
      $order -> email = $data['email'];
      $order -> payment_status = $result -> success;
      $order -> final_price = $data['final_price'];
      $order -> save();
      $order -> items() -> attach($data['dishes']);
      for ($i=0; $i < count($data['quantities']); $i++) { 
        DB::update('update item_order set quantity =' . $data['quantities'][$i]. ' where order_id =' . $order -> id);
      }
      
      // invio email
      Mail::to($order -> email)->send(new TestMail($order));
      return redirect() -> route('success');
    }
    
    private function getFinalPrice($dishArr , $quantityArr , $deliveryPrice){
      $total_price = 0;
      $index = 0;
      foreach($dishArr as $dish){
          $piatto = Item::findOrFail($dish);
          $prezzo = $piatto -> price * $quantityArr[$index];
          $total_price += $prezzo;
          $index++;
      };
      return ($total_price + $deliveryPrice) / 100;
    }
}
