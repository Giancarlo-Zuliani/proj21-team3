<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\User;

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
