@extends('layouts.main-layout')

@section('content')
  <h1>Informazioni consegna</h1>

  <form action="{{route('user-update', $user -> id)}}" method="post">
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
    <input type="number" min="0" max="20" value="{{$user -> price_delivery}}" name="price_delivery" placeholder="price">
    <br>

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
