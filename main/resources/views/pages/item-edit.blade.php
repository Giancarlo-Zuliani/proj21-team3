@extends('layouts.main-layout')

@section('content')
  <h1>Edit item</h1>

  <form action="{{route('item-update', $item -> id)}}" method="post">
    @csrf
    @method('post')

    <label for="name">Name:</label>
    <input type="text" name="name" value="{{$item -> name}}"> <br><br>

    <label for="description">Description:</label>
    <input type="text" name="description" value="{{$item -> description}}"> <br><br>

    <label for="ingredients">Ingredients:</label>
    <input type="text" name="ingredients" value="{{$item -> ingredients}}"> <br><br>

    <label for="price">Price:</label>
    <input type="text" name="price" value="{{$item -> price}}"> <br><br>

    <span>Lattosio</span>
   
    <input type="radio" id="lactose" name="lactose" value="1"
    @if ($item -> lactose == 1)        
        checked 
    @endif        
    >
    <label for="lactose">Si</label>
    <input type="radio" id="nolactose" name="lactose" value="0"
    @if ($item -> lactose == 0)        
        checked 
    @endif 
    >
    <label for="nolactose">No</label>

    <br><br>

    <span>Glutine</span>
    <input type="radio" id="gluten" name="gluten" value="1"
    @if ($item -> gluten == 1)        
        checked
    @endif 
    >
    <label for="gluten">Si</label>
    <input type="radio" id="nogluten" name="gluten" value="0"
    @if ($item -> gluten == 0)        
        checked 
    @endif     
    >
    <label for="nogluten">No</label>
    <br><br>
    
    {{-- available --}}
    <span>Disponibile</span>
    <input type="radio" id="available" name="available" value="1"
    @if ($item -> available == 1)        
        checked
    @endif 
    >
    <label for="gluten">Si</label>
    <input type="radio" id="notavailable" name="available" value="0"
    @if ($item -> available == 0)        
        checked 
    @endif     
    >
    <label for="available">No</label>
    <br><br>

    {{-- deleted --}}
    <input type="hidden" name="deleted" value="1">
    {{-- user id --}}
    <input type="hidden" name="user_id" value="{{Auth::user() -> id}}">
    {{-- submit --}}
    <input type="submit" value="STORE"> <br><br>
  </form>
@endsection
