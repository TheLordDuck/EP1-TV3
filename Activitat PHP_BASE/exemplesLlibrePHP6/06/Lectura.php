<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Lectura</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
</head>
<body>
  <h1>Lectura</h1>
  <p>
<?php
echo 'Contenido del archivo '.__FILE__.'
     </p><pre>';

// Abrimos el archivo
$Manejador = fopen(__FILE__,'r');
// Comprobamos que no haya habido problema
if(!$Manejador) { // si los hay
  // no continuamos
  echo 'No se ha podido abrir el archivo';
  exit;
}

// Procedemos a la lectura del contenido
while(!feof($Manejador))
  echo htmlentities(fgets($Manejador));

// Cerramos el archivo
fclose($Manejador);
?>
</body>
</html>