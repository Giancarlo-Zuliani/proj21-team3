<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'address' => ['required', 'string', 'max:120'],
        //     'vat_num' => ['required', 'string', 'min:11', 'max:20'],
        //     'phone_num' => ['required', 'string', 'min:8', 'max:20'],
        //     // 'img' => ['required', 'string', 'min:8', 'max:20'],
        //     // 'start_delivery' => ['required', 'string', 'max:20'],
        //     // 'end_delivery' => ['required', 'string', 'max:20'],
        //     // 'price_delivery' => ['required', 'integer', 'max:10'],
        //     // 'lat' => ['required', 'float', 'max:20'],
        //     // 'long' => ['required', 'float', 'max:20'],
        //
        // ]);

        Validator::make($data,
          [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:120'],
            'vat_num' => ['required', 'string', 'min:11', 'max:20'],
            'phone_num' => ['required', 'string', 'min:8', 'max:20'],

          ],
          [
              'name.min' => 'Nome più lungo di 5 caratteri',
              'name.required' => 'Nome obbligatorio',
              // 'priority.required' => 'Il campo priorità è richiesto.',
              // 'priority.between' => 'Il valore :input per la priorità non è fra :min - :max.',
              // 'description.min' => 'Minimo 10 caratteri per la descrizione.'
          ])
          ->validate();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'vat_num' => $data['vat_num'],
            'phone_num' => $data['phone_num'],
           ]);
    }
}
