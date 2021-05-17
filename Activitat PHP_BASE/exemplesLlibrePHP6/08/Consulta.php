<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Consulta</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Consulta</h1>
  <p>
<?php

// y recuperarlas
define("sqlConsulta", 'SELECT * FROM Libros');

// Intentamos la conexion
$hBdd = mysql_connect('localhost',
  'francisco', 'charte')
   or die('Fallo en la conexión');

// y a continuación seleccionamos
// la base de datos
if(!mysql_select_db('GuiaPHP6', $hBdd)) {
   echo '<p>Fallo al conectar</p>';
   exit;
}

// Ejecutamos la sentencia de consulta
$hResultado = mysql_query(sqlConsulta);

// Comprobamos que no haya habido problemas
if(!$hResultado) {
   echo '<p>Fallo al ejecutar la consulta </p>';
   echo mysql_error();
   exit;
}

// Indicamos el número de filas obtenidas
echo '<p>Se han recuperado '.
     mysql_num_rows($hResultado).
     ' filas</p>';

echo '<pre>';
// Recuperamos filas y las mostramos
while($Fila = mysql_fetch_row($hResultado))
   print_r($Fila);
echo '</pre>';


?>
</body>
</html>