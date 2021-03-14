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
  //CONTROLLER FOR CHECK-OUT PAGE
  public function payment(Request $request){
    $data = $request -> all();
    $dishes = [];
    $quantities = [];
    $cartArr=[];
    foreach($data['items'] as $item){
        $arr = explode(',' , $item);
        $dishes[] = $arr [0];
        $quantities[] = $arr[1];
        $cartArr []= array('dish' => Item::findOrFail($arr[0]) -> name , 
                        'quantity' => $arr[1],
                        'price' => $arr[2]);
    }; 
    $orderedItems = Item::findOrFail($dishes);
    $user = User::findOrFail($data['user_id']);
    $deliveryPrice = $user -> price_delivery;
    $fixedPrice = $this -> getFinalPrice($dishes , $quantities,$deliveryPrice);
    //BRAINTREE GET TRANSACTION TOKEN  
    $gateway = new Braintree\Gateway(config('braintree'));
    $token = $gateway -> clientToken() -> generate();
    return view('pages.checkout' , compact('token','fixedPrice', 'dishes','quantities','cartArr','orderedItems' ,'deliveryPrice'));
  }
  //CHECK-OUT CONTROLLER PAYMENT REQUEST AND ORDER STORE
  public function checkout(Request $request){
    $data = $request -> all();
    $dish = Item::findOrFail($data['dishes'][0]);
    $deliveryPrice = $dish -> user -> price_delivery;
    //BRAINTREE TRANSACTION
    $gateway = new Braintree\Gateway( config('braintree'));
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
    $order -> final_price = $this ->  getFinalPrice($data['dishes'] , $data['quantities'] ,$deliveryPrice) * 100 ;
    $order -> save();
    $order -> items() -> attach($data['dishes']);
    for ($i=0; $i < count($data['quantities']); $i++) { 
      DB::update('update item_order set quantity =' . $data['quantities'][$i]. ' where order_id =' . $order -> id);
    }
      
    //MAIL SENDER
    Mail::to($order -> email)->send(new TestMail($order));
    return redirect() -> route('success');
  }
  //THIS FUNCTION RETURN CHECKED ORDER COST    
  private function getFinalPrice($dishArr , $quantityArr , $deliveryPrice){
    $total_price = 0;
    $index = 0;
    foreach($dishArr as $dish){
        $dish = Item::findOrFail($dish);
        $dishesPrice = $dish -> price * $quantityArr[$index];
        $total_price += $dishesPrice;
        $index++;
    };
    return ($total_price + $deliveryPrice) / 100;
  }
}
