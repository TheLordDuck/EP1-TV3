<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Explorar servicio</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=UTF-8" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Explorar servicio</h1>
<p><pre>
<?php

  // Pretendemos usar el servicio de cambio de moneda
  $Cliente = new SoapClient(
     'http://ws.eoddata.com/EndOfDay.asmx?wsdl',
//   'http://www.webservicex.net/RealTimeMarketData.asmx?wsdl',
     array('trace' => 1));

  // Enumeramos los tipos de datos con que cuenta
  echo '<h3>Lista de tipos</h3>';

  foreach($Cliente->__getTypes() as $Tipo)
    echo "$Tipo<br />";

  // y los métodos que expone
  echo '<h3>Lista de métodos</h3>';

  foreach($Cliente->__getFunctions() as $Metodo)
    echo "$Metodo<br />";
?>
</pre></p>
</body>
</html>
