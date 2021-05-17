<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Códigos ASCII</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=utf-8" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Códigos UTF-8</h1>
  <p>
<?php
// Generamos una lista de caracteres a partir
// de sus códigos
for($Indice=12500; $Indice<=12755; $Indice++)
  printf("%-3d: %s\t", $Indice, chr($Indice));
?>
</body>
</html>