# FooDuro - Il FooDuro delle consegne a domicilio.

## Descrizione

FooDuro e' una piattaforma che si ispira ai grandi siti di food delivery, essa prevede la registrazione di ristoratori che possono mettere in vendita i loro prodotti, che a loro volte  possono essere ordinati comodamente da casa dai visitatori. Gli utenti, attraverso una ricerca per tipologie, possono visionare tutti i vari ristoratori e i loro menù ed eventualmente ordinare il piatto desiderato.

## Tecnologie principali

### Front-end

- Sass
- Vue.js
- Bootstrap 4
- JavaScript
- Chart.js
- Kursor.js

### Back-end

- PHP
- Laravel
- MySQL
- Braintree SDK

### Requisiti per l'installazione

* PHP >= 7.2.*
* Composer
* Node.js 
* NPM
* MySQL

#### Installazione

* Clonare la repository da GitHub con il seguente comando da terminale.

```sh
$ git clone https://github.com/Giancarlo-Zuliani/proj21-team3.git
```

* Navigare all'interno della cartella.

```sh
$ cd main
```

* Copiare il file ".env.example" in uno nuovo chiamato ".env".

```sh
$ cp .env.example .env
```

* Compilare i seguenti campi del file ".env" in modo da farli combaciare con il proprio ambiente di lavoro locale. 

* Scaricare il database che si trova nella cartella 'database' e importarlo all'interno di MySQL. Infine, compilare il file .env per il collegamento.

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fooduro
DB_USERNAME=root
DB_PASSWORD= 
```

* Le chiavi per abilitare Braintree sono reperibili registrandosi [qui](https://developers.braintreepayments.com/). 

```sh
BRAINTREE_ENV=sandbox
BRAINTREE_MERCHANT_ID=
BRAINTREE_PUBLIC_KEY=
BRAINTREE_PRIVATE_KEY=
```
* Per usufruire del servizio di invio e-mail inserire i dati della propria mail box. Ad esempio:

```sh
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"
```

* Ora digitare tutti i seguenti comandi da terminale, uno dopo l'altro.

```sh
$ composer install

$ php artisan key:generate

$ npm install && npm run watch

$ php artisan serve
```

* FooDuro sara' ora accessibile in locale dal seguente indirizzo: "[127.0.0.1:8000](http://127.0.0.1:8000)".

## Team di sviluppo

- [Natália Veras](https://github.com/nataliavrs).
- [Giancarlo Zuliani](https://github.com/Giancarlo-Zuliani).
- [Dario Alessio](https://github.com/DarioAlessio).
- [Angelo Cinà](https://github.com/AngeloCinaWD).
- [Andrea Sansica](https://github.com/andreasansica).