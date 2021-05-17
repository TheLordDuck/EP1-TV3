<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Tipos de datos</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
</head>
<body>
  <h1>Tipos de datos simples</h1>
  <p><pre>
<?php
// Creamos unas variables con datos de 
// diferentes tipos
$Entero = -846050; // un número entero
$Flotante = 3.85e+5; // uno en punto flotante
$LunaLlena = true; // un booleano
// y una cadena con secuencias de escape
$Texto = "Entero\tFlotante\tBoolean\r\n";

// Enviándolo todo como resultado a la página
echo "$Texto $Entero\t$Flotante\t\t$LunaLlena";
?>
  </pre></p>
</body>
</html>