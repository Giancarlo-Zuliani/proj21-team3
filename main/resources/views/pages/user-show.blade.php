@extends('layouts.main-layout')
{{-- USER PROFILE PAGE --}}
@section('content')

<div class="row justify-content-center">
  <div class="col-md-8">
      <div class="card">
          <div class="card-header"><h3>Informazioni personali</h3></div>
          <div class="card-body">
            <ul>
              <li>Nome: {{$user->name}}</li>
              <li>Codice fiscale:  {{$user->vat_num}}</li>
              <li>Indirizzo:  {{$user->address}}</li>
              <li>Numero di telefono:  {{$user->phone_num}}</li>
              <li>E-mail: {{$user->email}}</li>
            </ul>

            {{-- @if ($user->start_delivery && end_delivery != '')     --}}
            <h2>Orari e informazioni</h2>
            <ul>
              <li>Orario di apertura:</li>
              <li>{{$user->start_delivery}}</li>
              <li>Orario di chiusura:</li>
              <li>{{$user->end_delivery}}</li>
              <li>Prezzo delle consegne:</li>
              <li>{{$user->price_delivery / 100}}€</li>
            </ul>
            {{-- @endif --}}

            @if (Auth::user() -> img != null)
              <div class="card-body">
                <h3>Immagine aggiunta:</h3>
                <img src="{{asset('storage/assets/users/' . Auth::user() -> img . '.webp')}}">
              </div>
            @endif

            <a href="{{route('user-edit', $user -> id)}}">
                <button class="btn btn-primary">Aggiorna e aggiungi altre informazioni</button>
            </a>
          </div>
      </div>
  </div>
</div>
  

  

@endsection
