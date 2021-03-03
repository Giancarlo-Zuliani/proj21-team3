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
    public function getTypologyRestaurants($arr){
        $ser = serialize($arr);
        $typologies= Typology::findOrFail($ser);
        $rests = $typologies -> users();
        return response() ->json($rests);
    }
}
