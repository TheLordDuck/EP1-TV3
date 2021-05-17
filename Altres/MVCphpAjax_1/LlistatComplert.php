<?php
//Carregar codi de la Classe Client
require('classes/GestorClient.class.php');
//Inst�ncia de l'objecte
$objClient=new GestorClient;
//Invocar m�tode (Recollir tots els Clients)
$consulta=$objClient->mostrar_clients();
//Enviar capa�alera indicant JSON
header('Content-type: application/json');
//Codificar en JSON i retornar petici� en un array entenible per JS
echo json_encode($consulta);
?>