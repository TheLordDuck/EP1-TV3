<?php
    require_once "nusoap-0.9.5/lib/nusoap.php";
    //Funcionalitat del servei
    require_once('llibre.php');  
    
    //Generació del WSDL
	//Cal trucar llibres_WSDL.php?WSDL per crear/actualitzar (llibres.wsdl) i visualitzar i provar el servei
	//Un cop trucat, cal crear manualment el fitxer llibres.WSDL (a partir de copy paste del servei generat)
	//Després ja sempre és vàlid (si no canvia l'estructura de la petició)
    
	//$server = new soap_server();
	$server = new nusoap_server();
    $server->configureWSDL("llibres", "urn:llibres");
    //Definició de les E/S del servei  
	
	$server->register("getProd",
        array("categoria" => "xsd:string"),
        array("return" => "xsd:Array"),
        "urn:llibres",
        "urn:llibres#getProd",
        "rpc",
        "encoded",
        "Retorna un llistat de productes d'aquesta categoria");
	
	$server->register("saluda",
		array(), //Entrades	
		array("return" => "xsd:string"), //Sortides
        "urn:llibres",
        "urn:llibres#saluda",
        "rpc",
        "encoded",
        "Retorna una salutacio cordial");
    
	
      
    //$server->service($HTTP_RAW_POST_DATA);
	//if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
	//$server->service($HTTP_RAW_POST_DATA);
	$server->service(file_get_contents("php://input")); //Així a partir de php 7.0
	
?>
