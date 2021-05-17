<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Fecha y hora</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=utf-8" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Fecha y hora</h1>
  <p>
<?php
// Establecemos la configuración regional
// setlocale(LC_ALL,'es');
date_default_timezone_set('Europe/Paris');

// Una función para mostrar fecha y hora
function FechaHora($Referencia)
{
 // Mostramos la fecha
 echo strftime("%A, %d de %B de %Y",$Referencia);
 // y la hora
 echo strftime(" - %H:%M.%S",$Referencia);
}

// Obtenemos la fecha y hora actual
$Ahora = time();

// Mostramos el contenido de Ahora
echo '$Ahora=<b>'.$Ahora.'</b><br />';
// Mostramos la fecha y hora
echo 'Fecha y hora actual: <b>';
FechaHora($Ahora);
echo '</b><br />';

// Mostramos la fecha de modificación
echo 'Este archivo se modificó en <b>';
FechaHora(getlastmod());
echo '</b>';

?>
</p>
</body>
</html>