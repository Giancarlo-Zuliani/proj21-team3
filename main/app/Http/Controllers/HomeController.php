<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Item;
use App\Typology;

class HomeController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

    // (DASHBOARD (user area) - HOME) GET ALL USER'S ITEMS
  public function index() {
      $user = Auth::user() -> id;
      $items = Item::where('user_id', $user) -> get();
      return view('home', compact('items'));
  }

  // (ITEM-CREATE) FORM TO CREATE NEW ITEM
  public function createItem() {
    return view('pages.item-create');
  }

  // STORE NEW ITEM
  public function storeItem(Request $request) {
    if(is_numeric($request -> price)){
      $pr = $request -> get('price') * 100;
      $price = intval($pr);
      $request -> merge(['price' => $price]);
    };
    $data = $request -> all();
    Validator::make($data,
      [
          'name' => 'required|string|min:5',
          'description' => 'required|string',
          'ingredients' => 'required|string',
          'price' => 'required|numeric|gt:0',
          'lactose' => 'required|in:1,0',
          'gluten' => 'required|in:1,0'
      ],[
          'name.min' => 'Minimo 5 caratteri per il nome',
          'name.required' => 'Campo obbligatorio',
          'description.required' => 'Campo obbligatorio',
          'ingredients.required' => 'Campo obbligatorio',
          'price.required' => 'Campo obbligatorio',
          'price.numeric' => 'Inserire un valore numerico',
          'price.gt' => 'prezzo deve essere superiore a 0',
          'lactose.in' => 'inserire valore lattosio',
          'gluten.in' => 'inserire valore glutine',
          'lactose.required' => 'inserire valore lattosio',
          'gluten.required' => 'inserire valore glutine',
          'price.numeric' => 'inserisci un valore numerico'
          ])->validate();

    $user = User::findOrFail($request -> get('user_id'));
    $item = Item::make($data);
    $item -> user() -> associate($user);
    $item -> save();

    return redirect() -> route('home');
  }

    // (ITEM-EDIT) FORM TO EDIT ITEM
  public function editItem($id) {
    $item = Item::findOrFail($id);
    return view('pages.item-edit', compact('item'));
  }

  // UPDATE ITEM
  public function updateItem(Request $request, $id) {
    if(is_Numeric($request -> price)){
      $pr = $request -> get('price') * 100;
      $price = intval($pr);
      $request -> merge(['price' => $price]);
    }
    $data = $request -> all();

    Validator::make($data,
      [
          'name' => 'required|string|min:5',
          'description' => 'required|string',
          'ingredients' => 'string',
          'price' => 'required|numeric',
      ],[
          'name.min' => 'Minimo 5 caratteri per il nome',
          'name.required' => 'Campo obbligatorio',
          'description.required' => 'Campo obbligatorio',
          'price.required' => 'Campo obbligatorio',
          'price.numeric' => 'inserisci un valore numerico per il prezzo'
      ])->validate();

    $item = Item::findOrFail($id);
    $item -> update($data);
      
    return redirect() -> route('home');
  }

  // DELETE ITEM (TOGGLE 1 AND 0)
  public function deleteItem($id) {
    $item = Item::findOrFail($id);
    $item -> update(array('deleted' => 1));
    return redirect() -> route('home');
  }

  // (USER-SHOW (area user)) USER'S PROFILE PAGE
  public function userShow() {
    $user = Auth::user();
    return view('pages.user-show', compact('user'));
  }

  // (USER-EDIT) EDIT USER PAGE
  public function userEdit() {
    $user = Auth::user();
    $typos = Typology::all();
    return view('pages.user-edit', compact('user' , 'typos'));
  }

  // UPDATE USER INFO
  public function updateUser(Request $request, $id) {
    $data = $request -> all();
    $restTypo = $request -> typologies;
    Validator::make($data,
      [
        'typologies' => 'required'
      ],[
        'typologies.required' => 'scegli almeno una tipologia per il tuo ristorante'
      ])->validate();
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

    // UPDATE USER IMAGE
    $image = $request -> file('img');
    $user = Auth::user();
    if($image !== null){
      $this -> deleteUserImg();
      $ext = $image -> getClientOriginalExtension();
      $name = rand(100000, 999999).'_'.time();
      $destFile = $name.'.'.$ext;
      $file = $image -> storeAs('img', $destFile, 'public');
      $user -> img = $destFile;
      $user -> save();
    }

    /// TYPOLOGIES SYNC (associate typologies to user);
    $typos = Typology::findOrFail($restTypo);
    $user -> typologies() -> sync($typos);
    return redirect() -> route('user-show', $user -> id);
  }

  // REMOVE USER'S IMAGE
  public function clearUserImg() {
    $this -> deleteUserImg();
    $user = Auth::user();
    $user -> img = null;
    $user -> save();
    return redirect() -> route('user-show', $user -> id);
  }

  // DELETE IMAGE FROM FOLDER
  private function deleteUserImg() {
    $user = Auth::user();
    try {
      $filename = $user -> img;
      $file = storage_path('app/public/img/' . $filename);
      $res = File::delete($file);
    } catch (\Exception $e) {}
  }

  // CHECK OUT PAGE
  public function payment() {
    return view('pages.checkout');
  }    
}
