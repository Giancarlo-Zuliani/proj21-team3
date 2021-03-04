@extends('layouts.main-layout')
<a href="{{route('index')}}">Torna alla home!</a>
{{-- RESTAURANT MENU PAGE  --}}
@section('content')
    <h2>Restaurant name: {{$rest -> name}}</h2> <br>
    <ul>
      @foreach ($rest -> items as $item)
        <Item
          :name = "'{{$item -> name}}'"
          :description = "'{{$item -> description}}'"
  
        ></Item>
      @endforeach
    </ul>

@endsection
{{-- ITEM COMPONENT --}}
{{-- @section('itemContainer')
  <ul>
    @foreach ($rest -> items as $item)
      <Item
        :name = "'{{$item -> name}}'"
        :description = "'{{$item -> description}}'"

      ></Item>
    @endforeach
  </ul>
@endsection --}}
