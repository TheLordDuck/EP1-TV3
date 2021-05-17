<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Página con contador</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Página con contador</h1>
  <p>
<?php
include('Contador.php');

$MiContador = new Contador('Ejemplo');
echo "Ésta es la visita ".$MiContador->Cuenta;
?>
</body>
</html>