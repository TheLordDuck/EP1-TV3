<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Ordenar matriz</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
    div { float: left; margin-right: 1em; padding-right: 1em; border-right: 1px solid }
  </style>
</head>
<body>
  <h1>Ordenar matriz</h1>
  <p>
<?php
// Una cadena con los días
$CadenaDias = 
 'Lunes Martes Miércoles Jueves '.
 'Viernes Sábado Domingo';

// Generamos la matriz a partir de la cadena
$MatrizDias = explode(' ', $CadenaDias);

// Intercambiamos claves y valores para que
// el nombre de los días sea la clave
$MatrizDias = array_flip($MatrizDias);

// Ahora podemos usar los días como índices
$MatrizDias['Lunes'] = 25;

// Recorremos la matriz usando las funciones
// current() y next() para asignar valores
reset($MatrizDias);
while(current($MatrizDias)) {
 // aleatorios a los elementos
 $MatrizDias[key($MatrizDias)] = rand();
 next($MatrizDias);
}

// Mostramos la matriz en su estado original
echo '<div><h2>Matriz original</h2><pre>';
print_r($MatrizDias);
echo '</pre></div>';

// Ordenamos por valor
asort($MatrizDias);
echo '<div><h2>Ordenada por valor</h2><pre>';
print_r($MatrizDias);
echo '</pre></div>';

// Ordenamos por clave
ksort($MatrizDias);
echo '<div><h2>Ordenada por clave</h2><pre>';
print_r($MatrizDias);
echo '</pre></div>';

// Desordenamos
shuffle($MatrizDias);
echo '<div><h2>Matriz desordenada</h2><pre>';
print_r($MatrizDias);
echo '</pre></div>';

?>
</p>
</body>
</html>