<?php
    //El Client_Servei_llibres.php invocarà la línia de codi següent
	//per accedir al servei sense passar per WSDL
	 //$client = new nusoap_client("http://exemples.ua.ad/Miki/WebServicePHP/exempleBase/Servei_llibres.php");
	
	//Referència a la llibreria que facilita la creació/consum de serveis Web
	require_once "nusoap-0.9.5/lib/nusoap.php";
    //Funcionalitat del servei
    require_once('llibre.php');
	
    //Preparar servidor i registrar mètode (getProd implementat en llibre.php)	
    //$server = new soap_server();
	$server = new nusoap_server();
	//$client->soap_defencoding = 'utf-8'; 

    $server->register("getProd");
	$server->register("saluda");
    //$server->service($HTTP_RAW_POST_DATA);
	
	//Activar el servei en el servidor per fer-lo accessible des de fora 
	//Deprecated en versió 7.0
    //$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
    //$server->service($HTTP_RAW_POST_DATA); 
	$server->service(file_get_contents("php://input")); //Així a partir de php 7.0
?>
