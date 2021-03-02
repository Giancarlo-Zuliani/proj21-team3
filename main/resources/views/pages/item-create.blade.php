@extends('layouts.main-layout')

@section('content')
  <h1>New item</h1>

  <form class="" action="{{route('item-store')}}" method="post">
    @csrf
    @method('post')

    <label for="name">Name:</label>
    <input type="text" name="name" value="" class=" @error('name') is-invalid @enderror">
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <br><br>

    <label for="description">Description:</label>
    <input type="text" name="description" value=""> <br><br>

    <label for="ingredients">Ingredients:</label>
    <input type="text" name="ingredients" value=""> <br><br>

    <label for="price">Price:</label>
    <input type="text" name="price" value=""> <br><br>

    <span>Lattosio</span>
    <input type="radio" id="lactose" name="lactose" value="1">
    <label for="lactose">Si</label>
    <input type="radio" id="nolactose" name="lactose" value="0">
    <label for="nolactose">No</label>

    <br><br>

    <span>Glutine</span>
    <input type="radio" id="gluten" name="gluten" value="1">
    <label for="gluten">Si</label>
    <input type="radio" id="nogluten" name="gluten" value="0">
    <label for="nogluten">No</label>

    <br><br>

    <input type="hidden" name="user_id" value="{{Auth::user() -> id}}">

    <input type="hidden" name="available" value="1">

    <input type="hidden" name="deleted" value="0">
    <input type="submit" value="STORE"> <br><br>
  </form>
@endsection
