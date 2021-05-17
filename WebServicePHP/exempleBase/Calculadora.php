<?php
    //Definició de la funcionalitat
	function calculadora($x, $y, $operacio){
        if($operacio == "saluda")
            return "Hola nano !";
        else if($operacio == "suma")
            return $x + $y;
        else if($operacio == "resta")
            return $x - $y;
        else if($operacio == "multiplica")
            return $x * $y;
        else if($operacio == "divideix")
            return $x / $y;
		return 0;
    }
?>
