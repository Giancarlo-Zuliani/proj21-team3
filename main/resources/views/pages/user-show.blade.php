@extends('layouts.main-layout')
{{-- USER PROFILE PAGE --}}
@section('content')

    <ul>
        <li>{{$user->name}}</li>
        <li>{{$user->vat_num}}</li>
        <li>{{$user->address}}</li>
        <li>{{$user->phone_num}}</li>
        <li>{{$user->email}}</li>
    </ul>

    <h2>informazioni di consegna</h2>
    <ul>
        <li>start deli</li>
        <li>{{$user->start_delivery}}</li>
        <li>start end</li>
        <li>{{$user->end_delivery}}</li>
        <li>start price</li>
        <li>{{$user->price_delivery / 100}}€</li>
    </ul>

    @if (Auth::user() -> img != null)
      <div class="card-body">
        <h3>Profile image added</h3>
        <img src="{{asset('storage/img/' . Auth::user() -> img)}}">
      </div>
    @endif

    <a href="{{route('user-edit', $user -> id)}}">
        <button>aggiungi informazioni consegna</button>
    </a>

@endsection
