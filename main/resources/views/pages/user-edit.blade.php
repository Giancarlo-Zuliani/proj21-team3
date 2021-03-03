@extends('layouts.main-layout')

@section('content')
  <h1>Informazioni consegna</h1>

  <form action="{{route('user-update', $user -> id)}}" method="post" enctype='multipart/form-data'>
    @csrf
    @method('post')

    <label for="start_delivery">start delivery</label>
    {{-- <input type="text" name="start_delivery" value="{{$user -> start_delivery}}" placeholder="inizio"> --}}
    <select name="start_delivery" id="">
        <option value="" disabled>Seleziona un orario</option>
        <option value="10:30">10:30</option>
        <option value="11:00">11:00</option>
        <option value="11:30">11:30</option>
    </select>
    <br>
    <label for="end_delivery">end delivery</label>
    {{-- <input type="text" name="start_delivery" value="{{$user -> start_delivery}}" placeholder="inizio"> --}}
    <select name="end_delivery" id="">
        <option value="" disabled>Seleziona un orario</option>
        <option value="10:30">10:30</option>
        <option value="11:00">11:00</option>
        <option value="11:30">11:30</option>
    </select>
    <br>
    <label for="price_delivery">price delivery</label>
    <input type="number" min="0" max="20" step="0.50" value="{{$user -> price_delivery / 100}}" name="price_delivery" placeholder="price">
    <br>

    <input type="file" name="img" value="" >
    <a href="{{route('clear-user-img')}}"> <button type="button" name="button">Elimina immagine</button> </a>

    {{-- @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-div">
            <div class="">
                <h3>Error</h3>
                <span class="error-msg">{{$error}}</span>
                <br>
                <button class="button-alert"><i class="fas fa-times"></i></button>
            </div>
        </div>
        @endforeach
    @endif  --}}

    <input type="submit" value="Salva dati">

  </form>
@endsection