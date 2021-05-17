<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Matrices</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
   * { font: courier; }
   td { border: 1px solid black }
  </style>
</head>
<body>
  <h1>Matrices</h1>
  <p>
<?php
$Dias = array('Lunes', 'Martes', 'Miércoles',
 'Jueves', 'Viernes', 'Sábado', 'Domingo');

// Recorremos los elementos de la matriz
for($Indice=0;$Indice<count($Dias);$Indice++)
  // mostrándolos en forma de lista
  echo "$Dias[$Indice]<br />";

// Una matriz asociativa con los meses
$DiasMes = array(
  'Enero' => 31, 'Febrero' => 28,
  'Marzo' => 31, 'Abril' => 30,
  'Mayo' => 31, 'Junio' => 30,
  'Julio' => 31, 'Agosto' => 31,
  'Septiembre' => 30, 'Octubre' => 31,
  'Noviembre' => 30, 'Diciembre' => 31);

// Mostramos los días que tiene Marzo
echo "Marzo tiene {$DiasMes['Marzo']} días";

?>

<table>
 <tr><th>Variable</th><th>Contenido</th></tr>
<?php
 foreach($_SERVER as $Nombre => $Valor)
   echo "<tr><td>$Nombre</td><td>$Valor</td></tr>";
?>
 </table>
 </p>
 <p><pre>
<?php
// Una matriz con seis enteros
$Enteros = array(30,31,50,30,20);
print_r($Enteros);

// eliminamos uno de los elementos
unset($Enteros[3]);
print_r($Enteros);

// reordenamos la matriz
$Enteros = array_values($Enteros);
print_r($Enteros);
?>
</pre></p>
</body>
</html>