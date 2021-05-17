<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Datos gráfico</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Datos del gráfico</h1>
<p><pre>
<?php
$Archivo = 'Grafico.png';

$Datos = getimagesize($Archivo);

print_r($Datos);

echo '<img src="'.$Archivo.'" '.
     $Datos[3].' />';
?>
</pre></p>
</body>
</html>
