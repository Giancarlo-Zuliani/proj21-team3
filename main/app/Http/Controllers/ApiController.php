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
}
