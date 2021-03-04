@extends('layouts.main-layout')
<a href="{{route('index')}}">Torna alla home!</a>
{{-- FORM TO EDIT USER INFO --}}
@section('content')
  <h1>Informazioni</h1>

  <form action="{{route('user-update', $user -> id)}}" method="post" enctype='multipart/form-data'>
    @csrf
    @method('post')

    <label for="start_delivery">start delivery</label>
    <select name="start_delivery" id="">
        <option value="" disabled>Seleziona un orario</option>
        <option value="10:30">10:30</option>
        <option value="11:00">11:00</option>
        <option value="11:30">11:30</option>
    </select>
    <br>
    <label for="end_delivery">end delivery</label>
    <select name="end_delivery" id="">
        <option value="" disabled>Seleziona un orario</option>
        <option value="10:30">10:30</option>
        <option value="11:00">11:00</option>
        <option value="11:30">11:30</option>
    </select>
    <br>
    <label for="price_delivery">price delivery</label>
    <input type="number" min="0" max="20" step="0.50"
           value="{{$user -> price_delivery / 100}}" 
           name="price_delivery" placeholder="price">
    <br>

    <input type="file" name="img">
    <a href="{{route('clear-user-img')}}">
        <button class="btn btn-danger" type="button" name="button">  Elimina immagine</button> </a>
        <br>
        <label for="typologies[]"><h4>Scegli una o più tipologie:</h4></label>
        <br>
    @foreach ($typos as $typo)
        
        <input type="checkbox" value="{{$typo -> id}}" name="typologies[]" 
            @if($user -> typologies -> contains($typo -> id))
                checked
            @endif
        >
        <span>{{$typo -> typology}}</span> <br>

    @endforeach

    
    <input class="btn btn-primary" type="submit" value="Salva dati">

  </form>
@endsection
