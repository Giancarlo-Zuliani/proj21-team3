@extends('layouts.main-layout')

@section('content')
    <h2>Restaurant name: {{$rest -> name}}</h2>

    <ul>
      @foreach ($rest -> items as $value)
        <h4>{{$value -> name}}</h4>
      @endforeach
    </ul>

@endsection
