<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Seguir mensajes</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Seguir mensajes</h1>
<p>
<?php

// Función para mostrar los mensajes SOAP
// en el documento
function MuestraMensaje($Texto)
{
  // Vamos a utilizar Tidy
  $Analizador = new tidy;
  // para analizar el mensaje y darle formato
  // a fin de poder visualizarlo correctamente
  $Analizador->parseString($Texto,
    array('input-xml' => true,
          'output-xml' => true,
          'indent' => true));

  // lo enviamos al documento
  echo '<pre>'.htmlspecialchars($Analizador).
       '</pre>';
}

// Pretendemos usar el servicio DNS
$Cliente = new SoapClient(
   'http://www.ecubicle.net/iptocountry.asmx?wsdl',
   array('trace' => 1));

$ip = $_SERVER["REMOTE_ADDR"];
// Llamamos a una función del servicio
echo '<p>Tu IP está localizada en: '.
  $Cliente->FindCountryAsString(array('V4IPAddress' => $ip))->FindCountryAsStringResult.'</p>';

// Recuperamos el mensaje de última
// solicitud
echo '<p>Petición: ';
MuestraMensaje($Cliente->__getLastRequest());
echo '</p>';

// y el mensaje de la última respuesta
echo '<p>Respuesta: ';
MuestraMensaje($Cliente->__getLastResponse());
echo '</p>';
?>
</p>
</body>
</html>
