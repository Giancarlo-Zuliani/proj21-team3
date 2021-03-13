@extends('layouts.main-layout')
{{-- USER PROFILE PAGE --}}
@section('content')

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class=" card shadow col-xl-10  text-center" >
          @if (Auth::user() -> img)
            <div class="card-body">
              {{-- <img class="img-user-show"  src="{{asset('storage/assets/users/' . Auth::user() -> img . '.webp')}}"> --}}
              <img class="img-user-show"  src="{{asset('storage/img/' . Auth::user() -> img )}}">

            </div>
          @endif


      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row justify-content-center">
          <div class="card shadow col-md-5">
              <div class="card-header text-capitalize text-center">
                <h3 class="title-show">
                  Informazioni personali
                </h3>
              </div>
              <div class="card-body">
                <ul class="text-user-show">
                  <li class="text-li-user-show">
                    &bull; Nome: {{$user->name}}
                  </li>
                  <li class="text-li-user-show">
                    &bull; Codice fiscale:  {{$user->vat_num}}
                  </li>
                  <li class="text-li-user-show">
                    &bull; Indirizzo:  {{$user->address}}
                  </li>
                  <li class="text-li-user-show">
                    &bull; Numero di telefono:  {{$user->phone_num}}
                  </li>
                  <li class="text-li-user-show">
                    &bull; E-mail: {{$user->email}}
                  </li>
                </ul>

                {{-- @if ($user->start_delivery && end_delivery != '')     --}}
                {{-- <h2>Orari e informazioni</h2>
                <ul>
                  <li>Orario di apertura:</li>
                  <li>{{$user->start_delivery}}</li>
                  <li>Orario di chiusura:</li>
                  <li>{{$user->end_delivery}}</li>
                  <li>Prezzo delle consegne:</li>
                  <li>{{$user->price_delivery / 100}}€</li>
                </ul> --}}
                {{-- @endif --}}



                {{-- <a href="{{route('user-edit', $user -> id)}}">
                    <button class="btn btn-primary">Aggiorna e aggiungi altre informazioni</button>
                </a> --}}
              </div>
          </div>

          <div class="card shadow col-md-5">
              <div class="card-header  text-center">
                <h3 class="title-show">
                  Informazioni e Orari
                </h3>
              </div>
              <div class="card-body">
                <ul class="text-user-show">
                  <li>
                    &bull; Orario di apertura:
                  </li>
                  <li class="text-li-user-show">
                    {{$user->start_delivery}}
                  </li>
                  <li class="text-li-user-show">
                    &bull; Orario di chiusura:
                  </li>
                  <li>
                    {{$user->end_delivery}}
                  </li>
                  <li>
                    &bull;  Prezzo delle consegne:
                  </li>
                  <li class="text-li-user-show">
                    {{$user->price_delivery / 100}}€
                  </li>
                </ul>
                {{-- @endif --}}



                {{-- <a href="{{route('user-edit', $user -> id)}}">
                    <button class="btn btn-primary">Aggiorna e aggiungi altre informazioni</button>
                </a> --}}
              </div>
          </div>
    </div>

  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="container-btn col-es-2 col-sm-5 col-md-3 col-lg-2 ">
        <a href="{{route('user-edit', $user -> id)}}" >
            <button class="button-fashion text-capitalize text-center">
              Aggiorna informazioni
            </button>
        </a>
      </div>
    </div>
  </div>





@endsection
