<?php

namespace App\Http\Controllers;

use App\Typology;
use App\User;
use App\Item;
use Illuminate\Http\Request;

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

    
}