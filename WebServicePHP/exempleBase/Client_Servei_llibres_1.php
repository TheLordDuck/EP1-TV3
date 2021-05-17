<?php
    require_once "nusoap-0.9.5/lib/nusoap.php";
    //Accés amb WSDL
	//penseu en crear l'arxiu WSDL prèviament :
    //Cal trucar llibres_WSDL.php?WSDL per crear,actualitzar (llibres.wsdl) i visualitzar i provar el servei
	//Un cop trucat, cal crear manualment el fitxer llibres.WSDL (a partir de copy paste del servei generat)
	//Després ja sempre és vàlid (si no canvia l'estructura de la petició)
		
	$client = new nusoap_client('llibres.wsdl','wsdl');  
    $error = $client->getError();
    if ($error) {
        echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
    }
    //Consumir els serveis 
	$result = $client->call("saluda");
    echo("<h2> Resposta a Saluda : ".$result."</h2>");
   
    $error = $client->getError();
    if ($error) {
        echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
    }
    //Invocar mètode i recollir resultats  
    $result = $client->call("getProd", array("categoria" => "llibres"));
   	//echo($result); 
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
