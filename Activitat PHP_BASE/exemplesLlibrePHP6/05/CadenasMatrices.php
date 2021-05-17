<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Cadenas-Matrices</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Cadenas-Matrices</h1>
  <p><pre>
<?php
// Una cadena con los días
$CadenaDias = 
 'Lunes Martes Miércoles Jueves '.
 'Viernes Sábado Domingo';

// Generamos la matriz a partir de la cadena
$MatrizDias = explode(' ', $CadenaDias);

// y la mostramos
print_r($MatrizDias);

// Generamos una nueva cadena
$CadenaDias = implode(', ',$MatrizDias);

echo $CadenaDias;
?>
</body>
</html>