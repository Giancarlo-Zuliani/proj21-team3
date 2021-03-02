@extends('layouts.main-layout')

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

    <a href="{{route('user-edit', $user -> id)}}">
        <button>aggiungi informazioni consegna</button>
    </a>
    
@endsection