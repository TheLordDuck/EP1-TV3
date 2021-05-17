<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Entradas</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Entradas de directorio</h1>
  <p>
<?php
// Obtenemos el camino que corresponde al
// directorio superior al actual
$Camino = realpath('..');
// y a�adimos el patr�n de b�squeda
$Patron = $Camino.'/*';

// Mostramos el patr�n
echo "Patr�n de b�squeda: <b>$Patron</b></p>";

// Obtenemos las entradas existentes
$Entradas = glob($Patron);
// y componemos con ellas una cadena
$Lista = implode('<br />', $Entradas);
// que introducimos en la p�gina
echo '<p>Entradas obtenidas:<br />'.$Lista;

?>
</body>
</html>