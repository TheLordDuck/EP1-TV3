<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>SimpleXML</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>SimpleXML</h1>
<?php
// Recuperamos el archivo
$Analizador = 
 simplexml_load_file('Biblioteca.xml');

// Accedemos directamente a uno de los 
// elementos del documento
echo $Analizador->Libro[1]->Titulo.'<p>';

// Enumeramos los elementos de la rama Software
foreach($Analizador->children() as $Libro) 
   echo utf8_decode($Libro->Titulo).' - '.
        utf8_decode($Libro->Autor).'<br />';
?>

