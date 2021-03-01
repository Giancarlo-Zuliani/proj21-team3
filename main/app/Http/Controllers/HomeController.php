<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Item;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function createItem() {
      return view('pages.item-create');
    }

    public function storeItem(Request $request) {
      $pr = $request -> get('price') * 100;

      $price = intval($pr);

      $request -> merge(['price' => $price]);

      $data = $request -> all();

      // dd($data);

      Validator::make($data, [
        'name' => 'required|string|min:3',
        'description' => 'required|string|min:5',
        'ingredients' => 'string|min:4',
        'price' => 'required|integer',
      ]) -> validate();

      $user = User::findOrFail($request -> get('user_id'));
      $item = Item::make($request -> all());
      $item -> user() -> associate($user);
      $item -> save();

      return redirect() -> route('home');
    }



    public function usersUpload(Request $request)
    {
      $validatedData = $request->validate([
        'foto' => 'required|file',
      ]);

      $this -> imageDelete();

      $image = $request -> file('foto');
      $ext = $image -> getClientOriginalExtension();
      $name = rand(100000, 999999) . '_' . time();
      $fileName = $name . '.' . $ext;
      $file = $image -> storeAs('/photos', $fileName, 'public');

      $user = Auth::user();
      $user -> photo = $fileName;
      $user -> save();

      return redirect() -> back();
    }




    public function usersDelete()
    {
      $this -> imageDelete();

      $user = Auth::user();
      $user -> photo = null;
      $user -> save();

      return redirect() -> back();
    }


    public function imageDelete()
    {

      $user = Auth::user();

      try {
        $file = storage_path('app/public/photos/' . $user -> photo);
        File::delete($file);
      } catch (\Exception $e) {
      }

    }
}
