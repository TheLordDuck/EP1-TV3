<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Operadores lógicos</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
</head>
<body>
  <h1>Operadores lógicos</h1>
  <p>
<?php
  // Si son más de las 12
  if(date("H")>12)
   echo "Buenas tardes";
  else
   echo "Buenos días";
?>
  </p><p>
<?php
// Según el mes en el que estemos
switch(date("m")) {
  case 12:
  case 1:
  case 2: // indicamos la estación
   echo "Invierno";
   break;
  case 3:
  case 4:
  case 5:
   echo "Primavera";
   break;
  case 6:
  case 7:
  case 8:
   echo "Verano";
   break;
  default: // si no es ninguno de los anteriores
   echo "Otoño";
}
?>
 </p><p>
<?php
 echo date("H")>12 ? "Buenas tardes" : "Buenos días";
?>
 </p>
</body>
</html>