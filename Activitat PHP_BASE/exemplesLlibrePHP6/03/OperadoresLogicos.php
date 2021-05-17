<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Operadores lógicos</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
</head>
<body>
  <h1>Operadores lógicos</h1>
  <p>
<?php
// Comprobamos el resultado de las distintas
// combinaciones posibles
echo 
  'true && true = '.(true && true).'<br />'.
  'true && false = '.(true && false).'<br />'.
  'false && true = '.(false && true).'<br />'.
  'false && false = '.(false && false).'</p><p>'.
  'true || true = '.(true || true).'<br />'.
  'true || false = '.(true || false).'<br />'.
  'false || true = '.(false || true).'<br />'.
  'false || false = '.(false || false).'</p><p>'.
  '! true = '.(! true).'<br />'.
  '! false = '.(! false);
?>
  </p>
</body>
</html>