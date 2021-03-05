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
  
        ></Item>
      @endforeach
    </ul>

    {{-- carrello --}}
    <div class="carrello">
      <h1>carrello</h1>
      <ul>
        <li>item 1</li>
        <li>item 2</li>
      </ul>
      <a href="{{route('pagamento')}}">
        <input class="btn btn-primary" type="submit"  value="Check-out">
      </a>
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
