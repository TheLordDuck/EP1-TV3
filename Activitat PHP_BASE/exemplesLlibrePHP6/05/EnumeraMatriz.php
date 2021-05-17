<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Enumera matriz</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Enumera matriz</h1>
  <p>
<?php
// Una cadena con los d�as
$CadenaDias = 
 'Lunes Martes Mi�rcoles Jueves '.
 'Viernes S�bado Domingo';

// Generamos la matriz a partir de la cadena
$MatrizDias = explode(' ', $CadenaDias);

// Intercambiamos claves y valores para que
// el nombre de los d�as sea la clave
$MatrizDias = array_flip($MatrizDias);

// Ahora podemos usar los d�as como �ndices
$MatrizDias['Lunes'] = 25;

// Recorremos la matriz usando las funciones
// current() y next() para asignar valores
reset($MatrizDias);
while(current($MatrizDias)) {
 // aleatorios a los elementos
 $MatrizDias[key($MatrizDias)] = rand();
 next($MatrizDias);
}

// Ahora vamos a recorrer la matriz usando
// la funci�n each() para obtener cada clave
// y valor
reset($MatrizDias);
while(list($Dia, $Medida) = each($MatrizDias))
  echo "$Dia -> $Medida<br />";
?>
</p><p>
<?php

// Funci�n con el proceso que deseemos aplicar
// a cada elemento de la matriz. Recibe como
// argumentos el valor y la clave
function Procesa($Elemento, $Clave)
{
  // Nos limitamos a mostrarlos
  echo "Recibido $Elemento con clave $Clave<br/>";
}

// Recorremos la matriz aplicando la funci�n
array_walk($MatrizDias,'Procesa');

// Creamos una matriz con 12 elementos
$Temperaturas = array_fill(0,12,'Temperatura');

// y aplicamos la misma funci�n
array_walk($Temperaturas, 'Procesa');
?>
</p>
</body>
</html>