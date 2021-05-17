<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Registro visitas</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=UTF-8" />
  <style type="text/css">
    * { font-family: monospace }
    td { border-bottom: 1px solid;
         border-right: 1px solid }
  </style>
</head>
<body>
  <h1>Registro de visitas</h1>
  <p>
<?php
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set("Europe/Paris");

if($_REQUEST['Registro']) {
 echo '<table><tr><th>Fecha y hora</th>'.
      '<th>Navegador/Sistema</th>'.
      '<th>Dirección IP</th></tr>';

 $Datos = file_get_contents('Registro.dat');
 foreach(explode("\n",$Datos) as $Linea) {
   list($Fecha,$Navegador,$Direccion) =
    explode('|', $Linea);
   echo '<tr><td>'.date('d/m/y H:i',intval($Fecha)).
      "</td><td><small>$Navegador</small></td>".
      "<td>$Direccion</td></tr>";
 }
 echo '</table>';
} else {
 $Datos = implode('|',
   array(time(),$_SERVER['HTTP_USER_AGENT'],
   $_SERVER['REMOTE_ADDR']));

 $Datos .= "\n";

 file_put_contents('Registro.dat', $Datos, FILE_APPEND);

 echo "<p>Visita registrada como $Datos</p>";
 echo "<p><a href='?Registro=true'>Mostrar registro</a>";
}
?>
</body>
</html>