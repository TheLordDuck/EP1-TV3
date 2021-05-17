<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Funciones</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
   * { font: courier; }
   td { border: 1px solid black }
  </style>
</head>
<body>
  <h1>Funciones</h1>
  <p>

<?php
// Función que genera una tabla de colores
// de acorde a los parámetros de entrada
function TablaColores($Inicio,$Fin,$Incremento)
{
 // Iniciamos la tabla
 echo '<table><tr><th>Índice</th><th>
       Tono</th></tr>';

 // Preparamos un contador
 $Contador = 0;

 // Introducimos las celdas de color
 for($Indice=$Inicio; $Indice<=$Fin; 
     $Indice+=$Incremento) {
   // mostramos el valor en hexadecimal
   echo "<tr><td>".dechex($Indice)."</td>";
   // y lo usamos como color de fondo de la celda
   echo "<td style='background-color: #";
   echo dechex($Indice);
   echo "; color: red'> *** </td></tr>";

   // Incrementamos el contador a cada ciclo
   $Contador++;
 }
 // y cerramos la tabla
 echo '</table>';

 // Devolvemos el contador
 return $Contador;
}

// Generamos una tabla de grises
echo TablaColores(0x111111,0xFFFFFF,0x111111).
     ' filas';
// y una de tonos de rojo
echo TablaColores(0xFF0000,0xFFFFFF,0x001010).
     ' filas';
?>
  </p>
</body>
</html>