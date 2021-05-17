<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Entradas</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=UTF-8" />
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
// y añadimos el patrón de búsqueda
$Patron = $Camino.'/*';

// Mostramos el patrón
echo "Patrón de búsqueda: <b>$Patron</b></p>";

// Obtenemos las entradas existentes
$Entradas = glob($Patron);
// y componemos con ellas una cadena
$Lista = implode('<br />', $Entradas);
// que introducimos en la página
echo '<p>Entradas obtenidas:<br />'.$Lista;

?>
</body>
</html>