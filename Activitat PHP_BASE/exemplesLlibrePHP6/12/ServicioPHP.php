<?php

// Definimos dos funciones independientes
function Fecha()
{
  return date('d/m/y');
}

function Hora()
{
  return date('H:i');
}

// y una clase
class Informacion {
 // con su constructor
 function __construct() { }

 // y dos m�todos con la misma finalidad
 // que las dos funciones previas
 function getFecha()
 {
   return date('d/m/y');
 }

 function getHora()
 {
   return date('H:i');
 }
}

// Creamos el objeto que har� las veces de
// servidor sin usar descripci�n WSDL
$Servidor = new SoapServer(null,
  array('uri' => 'http://localhost'));

// A�adimos las dos funciones
$Servidor->addFunction(
  array('Fecha', 'Hora'));

// y mostramos la matriz devuelta por
// getFunctions()
if($_SERVER['REQUEST_METHOD'] == 'GET') {
  echo '<pre>';
  print_r($Servidor->getFunctions());
  echo '</pre>';
}

// Ahora asociamos la clase con el servicio
$Servidor->setClass('Informacion');

// y repetimos la operaci�n
if($_SERVER['REQUEST_METHOD'] == 'GET') {
  echo '<pre>';
  print_r($Servidor->getFunctions());
  echo '</pre>';
} else
 $Servidor->handle();

?>

