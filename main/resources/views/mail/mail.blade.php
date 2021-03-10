<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-mail</title>
</head>
<body>
    
    <h1>Pagamento avvenuto con successo</h1>
    {{-- dati dell'ordine --}}
    <p>Gentile {{$order['buyer_name']}} {{$order['buyer_lastname']}} </p>    
    <p>Il tuo ordine del totale di {{$order['final_price']}}€ sta arrivando a questo indirizzo {{$order['address']}}.</p>
    <h3>Buon appetito dallo staff di Fooduro, speriamo di vederci nel prossimo fooduro.</h3>
        
</body>
</html>