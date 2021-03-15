@extends('layouts.main-layout')

@section('content')
  <div class="container success-container">
    <div class="row text-center">
      <div class="col-md-12">
        <h1>Il pagamento è andato a buon fine.</h1>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-12 text-center">
      <img height="320px" width="320px" src="{{asset('storage/assets/pagamento.svg')}}" >
      </div>
    </div>
    <div class="row text-center">
      <div class="col-md-12">
        <h2>Grazie del tuo ordine! Ti abbiamo inviato un'e-mail con le tue informazioni.</h2>
      </div>
    </div>
  </div>
        <a id="backhome" href="{{route('index')}}" ></a>
@endsection

<script>
    setTimeout(function(){
        var autoBack = document.getElementById('backhome');
        autoBack.click();
    },7000);
</script>
