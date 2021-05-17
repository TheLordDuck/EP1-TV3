<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>XMLReader</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>XMLReader</h1>
<?php
// Abrimos el archivo XML a procesar
$Analizador = new XMLReader();
$Analizador->open('Biblioteca.xml');

// Vamos leyéndolo poco a poco
while($Analizador->read()) {
  // según el tipo de nodo  switch($Analizador->nodeType) {
    case XMLReader::ELEMENT:
       echo '<li>' . $Analizador->name . '</li>';
       if(!$Analizador->isEmptyElement) echo '<ul>';
       break;
    case XMLReader::TEXT:
       echo '<li>' . $Analizador->value . '</li>';
       break;
    case XMLReader::END_ELEMENT:
       echo '</ul>';
  }
}

// Cerramos el archivo
$Analizador->close();
?>

