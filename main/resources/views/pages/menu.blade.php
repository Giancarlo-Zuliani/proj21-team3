@extends('layouts.main-layout')
<a href="{{route('index')}}">Torna alla home!</a>
{{-- RESTAURANT MENU PAGE  --}}
@section('content')

    <h2>Scegli cosa mangiare nel ristorante <span class="rest-name">{{$rest -> name}}</span></h2> 
    <br>
    <ul>
      @foreach ($rest -> items as $item)
        <Item
          :name = "'{{$item -> name}}'"
          :description = "'{{$item -> description}}'"
          :id="{{$item -> id}}"
        ></Item>
      @endforeach
    </ul>

    {{-- carrello --}}
    <div class="carrello">
      <cart>
          
      </cart>
     
    </div>

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
