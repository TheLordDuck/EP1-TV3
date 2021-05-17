<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Bucles</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
   * { font: courier; }
   td { border: 1px solid black }
  </style>
</head>
<body>
  <h1>Bucles</h1>
  <p>
<table>
 <tr><th>Índice</th><th>Tono gris</th></tr>
<?php
 // Bucle por contador para recorrer los valores
 // hexadecimales 111111, 222222, 333333, etc.
 for($Indice=0x111111; $Indice<=0xFFFFFF; 
     $Indice+=0x111111) {
   // mostramos el valor en hexadecimal
   echo "<tr><td>".dechex($Indice)."</td>";
   // y lo usamos como color de fondo de la celda
   echo "<td style='background-color: #";
   echo dechex($Indice);
   echo "; color: red'> *** </td></tr>";
 }
?>
</table>
  </p>
</body>
</html>