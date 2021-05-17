<?php
/* Documentació de la API de mercado libre per poder invocar els serveis
https://developers.mercadolibre.com.ar/es_ar/ubicacion-y-monedas
*/
$data = json_decode( file_get_contents('https://api.mercadolibre.com/users/226384143/'), true );
echo $data['nickname'] . "</br>";
echo $data['address']['city'] . "</br>";
var_dump($data);

?>