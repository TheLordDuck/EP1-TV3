<?php
    //Aquest client invoca el servei de forma directa (sense WSDL)
	
	require_once "nusoap-0.9.5/lib/nusoap.php";
    //Accés directe sense WSDL
	$client = new nusoap_client("http://exemples.ua.ad/Miki/bloc3/WebServicePHP/exempleBase/Servei_llibres.php");
   
    $result = $client->call("saluda");
    echo("<h2> Resposta a Saluda : ".$result."</h2>");
   
    $error = $client->getError();
    if ($error) {
        echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
    }
    //Invocar mètode i recollir resultats  
    $result = $client->call("getProd", array("categoria" => "llibres"));
   		
    if ($client->fault) {
        echo "<h2>Fault</h2><pre>";
        print_r($result);
        echo "</pre>";
    }
    else {
        $error = $client->getError();
        if ($error) {
            echo "<h2>Error en client</h2><pre>" . $error . "</pre>";
        }
        else {
            echo "<h2>Llibres</h2><pre>";
            //echo $result;
            foreach ($result as $llibre){
				echo("<li>".$llibre."</li>");
			}
			echo "</pre>";
        }
    }
	
?>
