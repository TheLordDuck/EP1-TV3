<?php
    //Llibreries per simplificar el procés del servei Web
	require_once('nusoap-0.9.5/lib/nusoap.php');
	//Funcionalitat del servei
    require_once('calculadora.php');
 
	//Preparar servidor
    $server = new nusoap_server();
    //Registrar el servei
	$server->register('calculadora');
	//Activar el servei en el servidor per fer-lo accessible des de fora 
	//Deprecated en versió 7.0
    //$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
    //$server->service($HTTP_RAW_POST_DATA); 
	$server->service(file_get_contents("php://input")); //Així a partir de php 7.0
?>
