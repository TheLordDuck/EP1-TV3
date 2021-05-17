<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Espacio en disco</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Espacio en disco</h1>
  <p>
<?php
// Obtenemos el directorio del archivo actual
$Directorio = dirname(__FILE__);
// y lo mostramos en la página
echo "Directorio actual: <b>$Directorio</b></p>";

// Junto con el espacio total y
echo '<p>Espacio total: <b>'.number_format(
   disk_total_space($Directorio),0,',','.').
   '</b> bytes</p>';
// el espacio libre
echo '<p>Espacio libre: <b>'.number_format(
   disk_free_space($Directorio),0,',','.').
   '</b> bytes</p>';

// Mostramos también el tamaño del archivo
echo '<p>Tamaño del archivo '.basename(__FILE__).
   ': <b>'.filesize(__FILE__).
   '</b> bytes</p>';
?>
</body>
</html>