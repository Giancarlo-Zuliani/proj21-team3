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
    // HOME UTENTE LOGGATO
    public function index() {
        $user = Auth::user() -> id;
        $items = Item::where('user_id', $user) -> get();
        return view('home', compact('items'));
    }
    // FORM CREARE NUOVO PIATTO
    public function createItem() {
      return view('pages.item-create');
    }
    // CREA NUOVO PIATTO
    public function storeItem(Request $request) {
      $pr = $request -> get('price') * 100;

      $price = intval($pr);

      $request -> merge(['price' => $price]);

      $data = $request -> all();

      // dd($data);

      // Validator::make($data, [
      //   'name' => 'required|string',
      //   'description' => 'required|string',
      //   'ingredients' => 'string',
      //   'price' => 'required|integer',
      // ]) -> validate();

      Validator::make($data,
        [
            'name' => 'required|string|min:5',

        ],
        [
            'name.min' => 'Minimo 5 caratteri per il nome.',

        ])
        ->validate();

      $user = User::findOrFail($request -> get('user_id'));
      $item = Item::make($request -> all());
      $item -> user() -> associate($user);
      $item -> save();

      return redirect() -> route('home');
    }

    // FORM MODIFICARE PIATTO
    public function editItem($id) {
      $item = Item::findOrFail($id);
      return view('pages.item-edit', compact('item'));
    }
    // MODIFICA PIATTO
    public function updateItem(Request $request, $id) {
      $data = $request -> all();
      // dd($data, $id);

      Validator::make($data, [
        'name' => 'required|string',
        'description' => 'required',
        'ingredients' => 'string',
        'price' => 'required',
      ]) -> validate();

      $item = Item::findOrFail($id);
      $item -> update($data);

      return redirect() -> route('item-edit', $item -> id);
    }
    // DELETE ITEM (TOGGLE 1 AND 0)
    public function deleteItem($id) {

      $item = Item::findOrFail($id);

      $item -> update(array('deleted' => 1));

      return redirect() -> route('home');

    }

    // USER SHOW
    public function userShow() {


      $user = Auth::user();
      // dd($user);
      return view('pages.user-show', compact('user'));
    }

    // FORM EDIT USER
    public function userEdit() {

      $user = Auth::user();
      // dd($user);
      return view('pages.user-edit', compact('user'));
    }

    // UPDATE USER INFO
    public function updateUser(Request $request, $id) {
      $data = $request -> all();
      $startDelivery = $data['start_delivery'];
      $endDelivery = $data['end_delivery'];
      $price = $data['price_delivery'] * 100;

      $user = User::findOrFail($id);
      $user -> update
      (array(
        'start_delivery' => $startDelivery,
        'end_delivery' => $endDelivery,
        'price_delivery' => $price,
      ));
      ///////// immagine
      $this -> deleteUserImg();

      $image = $request -> file('img');
      $ext = $image -> getClientOriginalExtension();
      $name = rand(100000, 999999).'_'.time();
      $destFile = $name.'.'.$ext;
      $file = $image -> storeAs('img', $destFile, 'public');
      // dd($data, $image);
      // dd($image, $ext, $name, $destFile);
      $user = Auth::user();
      $user -> img = $destFile;
      $user -> save();
/////////////////////////////////
      return redirect() -> route('user-show', $user -> id);
    }

    public function clearUserImg() {

      $this -> deleteUserImg();

      $user = Auth::user();
      $user -> img = null;
      $user -> save();
      return redirect() -> route('user-show', $user -> id);
    }

    private function deleteUserImg() {
      $user = Auth::user();

      try {
        $filename = $user -> img;
        $file = storage_path('app/public/img/' . $filename);
        $res = File::delete($file);
        // dd($file, $res);
      } catch (\Exception $e) {}
    }
}
