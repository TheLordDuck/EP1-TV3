<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>C�digos ASCII</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>C�digos ASCII</h1>
  <p>
<?php
// Una variable con una cadena de caracteres
$Cadena = "Hola PHP";
// Accedemos a un car�cter y mostramos su c�digo
echo $Cadena[2]." - ".ord($Cadena[2])."<br />";

// Generamos una lista de caracteres a partir
// de sus c�digos
for($Indice=0; $Indice<=255; $Indice++)
  printf("%-3d: %s\t", $Indice, chr($Indice));
?>
</body>
</html>