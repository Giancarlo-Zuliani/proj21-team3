@extends('layouts.main-layout')

@section('content')
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-12">
        <h1>Il tuo pagamento è andato a buon fine.</h1>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <img height="300px" width="300px" src="{{asset('storage/assets/pagamento.svg')}}" >
    </div>
    <div class="row text-center">
      <div class="col-lg-12" style="margin-bottom: 100px;">
        <h2>Grazie del tuo ordine! Ti abbiamo inviato un'e-mail con le tue informazioni</h2>
      </div>
    </div>
  </div>
        <a id="backhome" href="{{route('index')}}" ></a>
@endsection

<script>
    setTimeout(function(){
        var autoBack = document.getElementById('backhome');
        autoBack.click();
    },4000);
</script>
