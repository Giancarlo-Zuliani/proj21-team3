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
    public function getTypologyRestaurants($id){
        $rests = Typology::findOrFail($id) -> users() -> get() ;
        return response() ->json($rests);
    }
}
