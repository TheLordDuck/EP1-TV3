<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Igualdad</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
</head>
<body>
  <h1>Comprobación de igualdad</h1>
  <p>
<?php
// Dos variables con el mismo valor pero
// distintitos tipos
$Cadena = '5'; // una cadena
$Numero = 5; // y un entero

// Comprobamos si son iguales e idénticos
echo "$Cadena == $Numero ->".
  ($Cadena == $Numero).
  "<br />$Cadena === $Numero ->".
  ($Cadena === $Numero);

?>
</body>
</html>