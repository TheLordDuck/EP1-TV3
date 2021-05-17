<?php
require('classes/GestorClient.class.php');
//Recuperar paràmetre
//Amb un Id serà suficient (no cal crear un objecte Client)
$client_id=$_POST['id']; 
$elGestor=new GestorClient;
$result=$elGestor->eliminar($client_id); 
//$result=$elGestor->test();
?>
