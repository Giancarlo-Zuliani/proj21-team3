<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MainController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function showMenu($id){
        $rest = User::findOrFail($id);
        return view('pages.menu' ,compact('rest'));
    }
}
