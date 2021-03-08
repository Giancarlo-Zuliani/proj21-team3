<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class OrderController extends Controller
{
    public function storeOrder(Request $request) {
        $data = $request -> all();
        $dishes = [];
        $quantities = [];
        foreach($data['items'] as $item){
            $arr = explode(',' , $item);
            $dishes[] = $arr[0];
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
        dd($total_price / 100);
    }
}
