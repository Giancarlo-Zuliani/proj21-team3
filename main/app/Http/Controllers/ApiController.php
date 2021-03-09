<?php

namespace App\Http\Controllers;

use App\Typology;
use App\User;
use App\Item;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        // dd($item);
        return response() ->json($item);
    }

    // CHART - GET TIME ORDERS

    // Pagina Statistiche Ordini
    // permette di visualizzare le statistiche degli ordini.
    // Nello specifico i grafici mostrano il numero di ordini per mesi/anni e
    // l’ammontare delle vendite
    public function getTime($id) {
        $orderArr = [];
        $user = User::findOrFail($id);
        $items = $user -> items;
        $idFilter= [];
        foreach ($items as $item) {
         foreach ( $item ->orders as $ord ){
             if(!in_array( $ord->id,$idFilter)){
                $idFilter[] = $ord -> id;
                $orderArr[] = $ord;
            }
         } 
       }
        return response() ->json($orderArr);
    }
    
    public function getItemsStats($id){
        $user = User::findOrFail($id);
        $items = $user -> items;
        $itemsNamesS = [];
        $countArr = [];
        foreach ($items as $item) {
            $orderArr = $item -> orders; 
            $itemsNames[] = $item -> name;
          };
          foreach($items as $item){
              $sellcount= 0;
              $ord = $item -> orders;
              foreach($ord as $order){
                  $sellcount += $order -> pivot -> quantity;  
              };
              $countArr[] = $sellcount;
          };
          
         
        return response() -> json(['countArr' => $countArr, "nameArr" => $itemsNames]);
    }
}
