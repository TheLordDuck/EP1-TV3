<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Cadenas</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=UTF-8" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Cadenas</h1>
  <p>
<?php
// Vamos a inspeccionar la cadena de
// identificación del navegador
$Cadena = $_SERVER['HTTP_USER_AGENT'];
// buscando la palabra "windows"
$PosWin = stripos($Cadena, 'windows');

// Si no se encuentra
if($PosWin === false)
 // lo indicamos
 echo 'El sistema operativo no es Windows';
else {
 // en caso contrario obtenemos la posición del
 // punto y coma que hay detrás
 $PosPuntoComa = strpos($Cadena,';',$PosWin);

 // y recuperamos exclusivamente el dato
 // de versión del sistema
 echo 'Windows versión <b>'.
   substr($Cadena,$PosWin+8,
   $PosPuntoComa-($PosWin+8)).'</b>';
}
?>
</body>
</html>