<?php

namespace App\Http\Controllers;

use App\Typology;
use App\User;
use App\Item;

class ApiController extends Controller
{
    // (INDEX) GET ALL TYPOLOGIES
    public function getAllTypologies(){
        $typo = Typology::all();
        return response() -> json($typo);
    }

    // (INDEX) FILTER RESTAURANTS BY TYPOLOGIES
    public function getTypologyRestaurants($firstType ,$secondType = '',$thirdType = ''){
        $rests = User::all();
        $arr = [];
        foreach($rests as $rest){
            if($rest -> typologies -> contains($firstType)
                && ($secondType === '' ? true : $rest -> typologies -> contains($secondType))
                && ($thirdType === '' ? true : $rest -> typologies -> contains($thirdType)))
                $arr[]= $rest;
        }
        return response() ->json($arr);
    }

    // (INDEX) GET COUNT RESTAURANTS FILTERED BY TYPOLOGY
    public function getCountRestaurants($firstType ,$secondType = '',$thirdType = ''){
        $rests = User::all();
        $arr = [];
        foreach($rests as $rest){
            if($rest -> typologies -> contains($firstType)
                && ($secondType === '' ? true : $rest -> typologies -> contains($secondType))
                && ($thirdType === '' ? true : $rest -> typologies -> contains($thirdType)))
                $arr[]= $rest;
        }
        $count = count($arr);
        return response() ->json($count);
    }

    // GET ITEM BY ID FROM BE
    public function getItem($id) {
        $item = Item::findOrFail($id);
        return response() ->json($item);
    }

    // CHART - GET TIME ORDERS
    public function getTime($id) {
        $orderArr = $this -> getUniqueOrderArr($id);
        return response() ->json($orderArr);
    }
    
    //CHART - GET ITEMS SELLS DATA
    public function getItemsStats($id){
        $user = User::findOrFail($id);
        $items = $user -> items;
        $countArr = [];
        $total_sales = 0;
         foreach ($items as $item) { 
            $itemsNames[] = $item -> name;
          };
         foreach($items as $item){
              $sellcount= 0;
              $ord = $item -> orders;
              foreach($ord as $order){
                $qnt = $order -> pivot -> quantity; 
                $sellcount += $qnt;  
                $total_sales +=  $item -> price * $qnt;
              };
              $countArr[] = $sellcount;
          };
          $delivery = count($this ->getUniqueOrderArr($id));
          $total_sales += $delivery * $user -> price_delivery; 
        return response() -> json(['countArr' => $countArr, "nameArr" => $itemsNames , "total_sales" => $total_sales / 100]);
    }
    private function getUniqueOrderArr($id){
        $orderArr = [];
        $user = User::findOrFail($id);
        $items = $user -> items;
        $idFilter= [];
        foreach ($items as $item) {
         foreach ( $item -> orders as $ord ){
            if(!in_array( $ord->id,$idFilter)){
               $idFilter[] = $ord -> id;
               $orderArr[] = $ord;
            }
         } 
       }
       return $orderArr;
    }
}