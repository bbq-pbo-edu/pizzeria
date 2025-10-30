<?php
spl_autoload_register(function ($class) {
    require_once 'class/' . $class . '.php';

});

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://www.manuel.web.bbq/bestellung/42',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

$bestellung = json_decode(curl_exec($curl), true);  // Die Bestellung liegt auf www.manuel.web.bbq/bestellung id 42 hole sie mit curl

$firstName = $bestellung['data']['kunde']['vorname'];
$lastName = $bestellung['data']['kunde']['nachname'];
$address = $bestellung['data']['kunde']['adresse'];

$customer = new Customer($lastName, $firstName, $address); // daten zum Kunden finden sich in der Bestellung

$order = $customer->makeOrder($bestellung['data']['pizza']);
$order->printReceipt();

//Name Manuel Martinez
//123Berlin
//Pizzen 3
// Nr.1 Salami und Oliven -> 12 Euro
// Nr.2 Thunfisch und Zwiebeln -> 12 Euro
// Nr.3 Spinat, Ei und Champignons -> 13 Euro
// Summe 37 Euro