<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>DOM - Enumeración</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>DOM - Enumeración</h1>
<?php
// Creamos el objeto DOMDocument
$Arbol = new DOMDocument();
// y lo usamos para recuperar un archivo XML
$Arbol->load('http://php.net/news.rss');

// Vamos a recorrer todos los nodos del raíz
foreach($Arbol->documentElement->childNodes 
            as $Nodo) {
  // mostrando su nombre y valor
  echo '<b>'.$Nodo->nodeName.'</b> - '.
       $Nodo->nodeValue.'<br />';
}
?>