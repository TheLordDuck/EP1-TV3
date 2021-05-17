<?php
require('classes/GestorClient.class.php');

$client_id=$_GET['id'];
$elGestor=new GestorClient;
if( $elGestor->eliminar($client_id) == true){
	//Exemple s'ha decidit que després d'eliminar, actualitzar dades
	//Redirigim la petició AJAX a la pàgina inicial que recarrega el llistat complert
	header('Location: index.html');

}else{
	//echo "Error";
	header('Location: error.php?codi='+$client_id);
}
?>
