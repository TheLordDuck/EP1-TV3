<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Formulario HTML</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Formulario HTML</h1>
<p><pre>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
  print_r($_POST);
else
  print_r($_GET);
?>
</pre></p>
</body>
</html>