<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Excepciones</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
</head>
<body>
  <h1>Excepciones</h1>
  <p>
<?php
$Dividendo = 20;
$Divisor = 0;

try {
  $Contenido = @file_get_contents("archivo");
} catch(Exception $e) {
  echo "Error en la división: <b>$e</b>";
}

?>
</body>
</html>