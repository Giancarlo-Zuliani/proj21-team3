@extends('layouts.main-layout')
{{-- USER PROFILE PAGE --}}
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
          <div class="card shadow col-md-6">
              <div class="card-header text-center">
                <h3 class="title-show">
                  Informazioni personali
                </h3>
              </div>
              <div class="card-body">
                <ul class="text-user-show">
                  <li class="text-li-user-show">
                     Nome:
                    {{$user->name}}
                  </li>                                                    
                  <li class="text-li-user-show">
                     Codice fiscale:
                    {{$user->vat_num}}
                  </li>                                                        
                  <li class="text-li-user-show">
                     Indirizzo:
                    {{$user->address}}
                  </li>
                  <li class="text-li-user-show">
                     Numero di telefono:
                    {{$user->phone_num}}
                  </li>
                  <li class="text-li-user-show">
                     E-mail:
                    {{$user->email}}
                  </li>
                </ul>
                <div class="card-header text-center">
                  <h3 class="title-show">
                    Orari e consegna
                  </h3>
                </div>                            
              <div class="card-body">
                <ul class="text-user-show">
                  <li>
                    Orario di apertura:
                    {{$user->start_delivery}}
                  </li>
                  <li class="text-li-user-show">
                     Orario di chiusura:
                    {{$user->end_delivery}}
                  </li>
                  <li>
                    Prezzo delle consegne:
                    {{$user->price_delivery / 100}}€
                  </li>        
                </ul>                                  
              </div>

                <div class="text-center">
                  @if (Auth::user() -> img)
                    <img class="rounded img-user-show" style="max-width: 80%;"  src="{{asset('storage/img/' . Auth::user() -> img )}}">
                  @endif
                </div>

                <div class="container">
                  <div class="row justify-content-center text-center">
                    <div class="container-btn col-xs-5 col-sm-5 col-md-3 col-lg-5">
                      <a href="{{route('user-edit', $user -> id)}}" >
                          <button class="btn btn-outline-warning text-capitalize text-center">
                            Aggiorna informazioni
                          </button>
                      </a>
                    </div>
                  </div>
                </div>

          </div>
    </div>
  </div>

  
<div>
@endsection
