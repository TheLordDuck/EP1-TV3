<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Cliente</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Cliente</h1>
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

// Facilitamos la localización y el URI
$Cliente = new SoapClient(null,
 array('location' =>
 'http://127.0.0.1/GPPHP6/12/ServicioPHP.php',
 'uri' => 'http://127.0.0.1', 'trace' => 1));

// y llamamos a los métodos
echo $Cliente->getHora().' - '.
     $Cliente->getFecha();

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
