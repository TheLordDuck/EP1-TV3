<?php 
// Reiniciamos la sesi�n
session_start(); 

// Comprobamos que exista la variable Valores
if(!$_SESSION['Valores']) 
 // en caso contrario volver al formulario
 header('Location: Suscripcion.php');

// Recuperamos los valores
$Valores = $_SESSION['Valores'];

// Guardamos en una cookie la direcci�n
setcookie('SuscripcionAnaya',
  $Valores['correo'],time()+60*60*24*265);
?>

<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Confirmar suscripci�n</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Confirmar suscripci�n</h1>
<p>
<?php
 // Confirmamos la suscripci�n
 echo 'Desea suscribirse con la direcci�n <b>'.
  $Valores['correo'].'</b>.';

 // y destruimos la sesi�n
 session_destroy(); 
?>
</body>
</html>