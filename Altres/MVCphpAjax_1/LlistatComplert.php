<?php
//Carregar codi de la Classe Client
require('classes/GestorClient.class.php');
//Instància de l'objecte
$objClient=new GestorClient;
//Invocar mètode (Recollir tots els Clients)
$consulta=$objClient->mostrar_clients();
//Enviar capaçalera indicant JSON
header('Content-type: application/json');
//Codificar en JSON i retornar petició en un array entenible per JS
echo json_encode($consulta);
?>