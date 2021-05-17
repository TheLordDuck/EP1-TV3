<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>XML y SAX</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>XML y SAX</h1>
<?php
// Creamos el objeto analizador XML
$Analizador = xml_parser_create('iso-8859-1');

// Establecemos las funciones de retorno para 
// procesar las marcas de apertura y cierre
xml_set_element_handler($Analizador,
    'Apertura', 'Cierre');
// y los datos en forma de cadenas de caracteres
xml_set_character_data_handler(
    $Analizador, 'Dato');

// Recuperamos un archivo XML cualquiera
$Contenido=file_get_contents('Biblioteca.xml');

// y procedemos a analizarlo
xml_parse($Analizador, $Contenido);

// Esta función sería invocada con cada marca de
// apertura que existe, recibiendo como 
// argumento la referencia al analizador, el 
// texto de la marca y sus atributos
function Apertura($Analizador,$Marca,$Atributos)
{
  global $Nivel; // Usamos una variable global
  $Nivel++; // para mantener el nivel
  $sAtributos = '';

  // De haber atributos los extraemos 
  if(count($Atributos)) { // en una cadena
   $sAtributos = ' (';
   // expresados como Atributo="Valor"
   foreach($Atributos as $Nombre => $Valor)
     $sAtributos .= $Nombre.'="'.$Valor.'",';
     // quitamos la última coma y cerramos 
     // el paréntesis
     $sAtributos = substr($sAtributos,0,
         strlen($sAtributos)-1).')';
  }

  // Mostramos la marca
  echo $Marca.$sAtributos.'<br />'.
     str_repeat('&nbsp;', ($Nivel+1)*2);
}

// Esta función sería invocada con cada marca de
// cierre que exista en el documento, recibiendo
// como argumento la referencia al analizador y
// el texto de la marca
function Cierre($Analizador, $Marca)
{
  global $Nivel;

  // Mostramos la marca
  echo '<br />'.str_repeat('&nbsp;', $Nivel*2).
       '/'.$Marca.'<br />'.
       str_repeat('&nbsp;', $Nivel*2);
  $Nivel--; // reducimos el nivel
}

// Esta función recibiría los datos que existen
// en los elementos y que consistan en cadenas 
// de caracteres
function Dato($Analizador, $Dato)
{
  global $Nivel;

  // lo mostramos únicamente si no es una 
  // cadena vacía
  if(trim($Dato) != '')
    echo '<b>'.$Dato.'</b>';
}

?>

</body>
</html>
