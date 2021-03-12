<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-mail</title>
</head>
<body>
    <img src="{{asset('storage/assets/logo.svg')}}" alt="">

    <h1>Pagamento avvenuto con successo</h1>
    {{-- dati dell'ordine --}}
    <div id="mail_body">
        <p>Gentile {{$order['buyer_name']}} {{$order['buyer_lastname']}} </p>
        <p>Il tuo ordine del totale di {{$order['final_price']/100}}€ sta arrivando a questo indirizzo {{$order['address']}}.</p>
        <h3>Buon appetito dallo staff di Fooduro, speriamo di vederci nel prossimo fooduro.</h3>
    <div>
</body>
</html>
