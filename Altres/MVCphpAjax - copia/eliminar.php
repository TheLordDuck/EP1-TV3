<?php
require('classes/GestorClient.class.php');
$client_id=$_GET['id']; 
$elGestor=new GestorClient;
$elGestor->eliminar($client_id); 
?>
