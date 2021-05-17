<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>DOM - Búsqueda</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>DOM - Búsqueda</h1>
<?php
// Creamos el objeto DOMDocument
$Arbol = new DOMDocument();
// y lo usamos para recuperar un archivo XML
$Arbol->load('http://php.net/news.rss');

foreach($Arbol->getElementsByTagName('title')
    as $Elemento)
  echo $Elemento->nodeValue.'<br />';
?>

</body>
</html>
