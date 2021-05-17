<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Operadores aritméticos</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
   td { border: 1px solid black }
  </style>
</head>
<body>
  <h1>Operaciones aritméticas</h1>
<p><table style="border: 1px solid gray">
 <tr>
  <th>Operando 1</th>
  <th>Operando 2</th>
  <th>Suma</th>
  <th>Resta</th>
  <th>Multiplicación</th>
  <th>División</th>
  <th>Resto</th> 
 </tr><tr>
 <?php
 // Asignamos los operados a sendas variables
 $Operando1 = 54;
 $Operando2 = 3;

 // y los introducimos como elementos de la tabla
 echo '<td>'.$Operando1.
   '</td><td>'.$Operando2.
   '</td><td>'.($Operando1 + $Operando2).
   '</td><td>'.($Operando1 - $Operando2).
   '</td><td>'.($Operando1 * $Operando2).
   '</td><td>'.($Operando1 / $Operando2).
   '</td><td>'.($Operando1 % $Operando2).
   '</td>';
 ?>
 </tr></table></p>
</body>
</html>