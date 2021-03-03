<?php

namespace App\Http\Controllers;

use App\Typology;
use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
   public function getAllTypologies(){
        $typo = Typology::all();
        return response() -> json($typo);
    }
    public function getTypologyRestaurants($firstType,$secondType){
        $rests = User::all(); 
        $arr = [];
        foreach($rests as $rest){
            if($rest -> typologies -> contains($firstType) && $rest -> typologies -> contains($secondType) )
            $arr[]= $rest; 
        }
        return response() ->json($arr);
    }
}
