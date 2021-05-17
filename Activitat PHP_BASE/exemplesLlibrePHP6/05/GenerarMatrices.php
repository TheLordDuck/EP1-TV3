<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Generar matrices</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
    div { float: left; margin-right: 1em; padding-right: 1em; border-right: 1px solid }
  </style>
</head>
<body>
  <h1>Generar matrices</h1>
  <p><pre>
<?php
// Creamos una matriz con 12 elementos
$Temperaturas = array_fill(0,12,'Temperatura');
MuestraMatriz($Temperaturas);

// Le añadimos elementos hasta llegar a 15
$Temperaturas = 
  array_pad($Temperaturas,15,'Max-Min-Med');
MuestraMatriz($Temperaturas);

// Insertamos un elemento al final
array_push($Temperaturas,"Medida 1");
MuestraMatriz($Temperaturas);

// Insertamos un elemento al inicio
array_unshift($Temperaturas,"Medida 2");
MuestraMatriz($Temperaturas);

// Función que muestra la matriz
function MuestraMatriz($Matriz)
{
 echo '<div>';
 print_r($Matriz);
 echo '</div>';
}
?>
</pre></p>
</body>
</html>