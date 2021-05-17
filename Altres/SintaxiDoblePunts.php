<?php
class MyClass {
    const CONST_VALUE = "Un valor constant \n";
	public static $MEVA_ESTATICA = "variable estatica \n";

    public static function doubleColon() {
        echo "Soc el mètode doubleColon() ".self::$MEVA_ESTATICA . "\n";
    }
}

$classname = 'MyClass';
//Sintaxis dobles Punts (únicament per Constants i mètodes estàtics de la classe)
//Dues formes de presentar valors (accés a Constant)
echo $classname::CONST_VALUE; // A partir de PHP 5.3.0
echo "<br>";
echo MyClass::CONST_VALUE;

//Dues formes de presentar valors (Accés a mètode estàtic)
echo "<br>";
$classname::doubleColon(); // A partir de PHP 5.3.0
echo "<br>";
MyClass::doubleColon();
//Mostrar variable estàtica
echo "<br>";
echo MyClass::$MEVA_ESTATICA;


?>