<?php
require('classes/GestorClient.class.php');
$unClient=new Client();
//Recuperar del POST els camps passats com a paràmetre
//Mapejar-los al objecte Client
$unClient->setNoms($_POST['noms']);
$unClient->setCiutat($_POST['ciutat']);
//echo $unClient->getCiutat();
$elGestor=new GestorClient;
$result=$elGestor->inserir($unClient);
?>
