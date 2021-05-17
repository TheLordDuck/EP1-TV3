<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Conexi�n MySQL</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Conexi�n con MySQL</h1>
  <p>
<?php
// Intentamos la conexion utilizando la funci�n
// mysql_connect(), correspondiente a la
// extensi�n cl�sica
$hBdd =
 mysql_connect('Imac', 'usuariophp', 'clavephp')
 // en caso de fallo interrumpimos el gui�n
 or die('Fallo en la conexi�n');

// Confirmamos la apertura
echo '<p>Conexi�n con MySQL en Imac usando '.
     '<b>mysql_connect()</b> satisfactoria</p>';

// Conectamos usando la funci�n mysqli_connect()
// de la extensi�n mysqli
$hBdd = mysqli_connect('localhost', 'francisco',
  'charte', 'GuiaPHP6')
  // en caso de fallo interrumpimos
  or die('Fallo en la conexi�n');

// Confirmamos la apertura
echo '<p>Conexi�n con MySQL en localhost con '.
   '<b>mysqli_connect()</b> satisfactoria</p>';

try { // Ahora abirmos con el API OO
  // Creamos un objeto mysqli
  $Bdd = new mysqli('servidor.fcharte.com',
         'francisco', 'charte');

  echo '<p>Conexi�n con MySQL con interfaz OO '.
       ' satisfactoria</p>';
} catch(Exception $e) {
  // si se produce un error
  echo $e; // lo mostramos
}

?>
</body>
</html>