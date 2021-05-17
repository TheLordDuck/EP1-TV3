<?php
/* Documentació de la API de mercado libre per poder invocar els serveis
https://developers.mercadolibre.com.ar/es_ar/ubicacion-y-monedas
*/
$data = json_decode( file_get_contents('https://api.mercadolibre.com/sites'), true );
echo "==============Paisos=============" ."</br>";
foreach($data as $value){
    //Print the element out.
    echo $value['name'] . '<br>';
}	
$data = json_decode( file_get_contents('https://api.mercadolibre.com/sites/MLA/categories'), true );
echo "==============Categories=============" ."</br>";
foreach($data as $value){
    //Print the element out.
    echo $value['id'] .":". $value['name'].'<br>';
}	


?>