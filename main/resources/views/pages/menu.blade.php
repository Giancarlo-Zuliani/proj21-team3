@extends('layouts.main-layout')

@section('content')
    <h2>Restaurant name: {{$rest -> name}}</h2> <br>

    {{-- <ul>
      @foreach ($rest -> items as $item)
        <Item
          :name = "'{{$item -> name}}'"
          :description = "'{{$item -> description}}'"

        ></Item>
      @endforeach

    </ul> --}}



@endsection

@section('itemContainer')
  <ul>
    @foreach ($rest -> items as $item)
      <Item
        :name = "'{{$item -> name}}'"
        :description = "'{{$item -> description}}'"

      ></Item>
    @endforeach

  </ul>
@endsection
