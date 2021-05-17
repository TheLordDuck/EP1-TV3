<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Entidades</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=UTF-8" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Entidades</h1>
  <p>
<?php
// Una variable con una cadena de caracteres
$Cadena = '<p>"Párrafo de texto" & símbolos</p>';

echo $Cadena.'<br />';
echo htmlentities($Cadena);
?>
<p><pre>
<?php
print_r(get_html_translation_table(HTML_ENTITIES));
?>
</body>
</html>