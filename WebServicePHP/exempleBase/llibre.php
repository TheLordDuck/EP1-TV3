<?php
//la funcionalitat és aquí independent de si es truca vi WSDL o directament (php)

    //Definir la funcionalitat  
    function getProd($categoria) {
        //return "Hola";
		if ($categoria == "llibres") {
            //return join(",", array("El petit Princep","La Colmena","De gran vull ser informàtic"));
			//return join("</li>", array("<li>El petit Princep","<li>La Colmena","<li>De gran vull ser informàtic"));
			return array("El petit Princep","La Colmena","De gran vull ser informàtic");
        }
        else {
                return array("No hi han productes en la categoria [".$categoria."]");
				
        }
    }
	function saluda(){
		return "Benvingut al servei de llibres";
	}
   
?>
