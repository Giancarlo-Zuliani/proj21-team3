@extends('layouts.main-layout')

@section('content')
    <h1>Pagamento avvenuto con successo, informazioni nell'e-mail xD</h1>    
        <a id="backhome" href="{{route('index')}}" ></a>
@endsection

<script>
    setTimeout(function(){
        var autoBack = document.getElementById('backhome');
        autoBack.click();
    },4000);
</script>