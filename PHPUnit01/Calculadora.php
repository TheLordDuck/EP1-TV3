<?php
Class Calculadora {
	public function __construct(){
		echo "Calculadora Instanciada";
	}
   //Definici� de la funcionalitat
	public function suma($x, $y){
            return $x + $y;
	}
	public function resta($x, $y){
		return $x - $y;
	}        
}
?>
