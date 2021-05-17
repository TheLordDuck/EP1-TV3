<?php
//Connexió al document WSDL
//Us de SoapClient (sense llibreria nuSoap)
//require_once "nusoap-0.9.5/lib/nusoap.php";
//Pensar en fer CtrlF5 per netejar caché del navegador als canvis

$options = array(
  'cache_wsdl' => WSDL_CACHE_NONE,
);

//Referència al servei
$url = "https://ws.cdyne.com/ip2geo/ip2geo.asmx?wsdl";
$client = new SoapClient($url, $options);
$param=array('ipAddress'=>"194.158.64.7", "licenseKey" => "0");
$result = $client->ResolveIP(array('ipAddress' => '194.158.64.7','licenseKey'=>'0'));
echo("<b> Si falla, recordeu d'anar fent CtrlF5 en aquesta pantalla i anterior (llistat)</b>");
//Presentar valors particulars de l'estructura retornada
$country = $result->ResolveIPResult->Country;
$Latitude = $result->ResolveIPResult->Latitude;
$Longitude = $result->ResolveIPResult->Longitude;
echo("<li>Pais : ".$country."</li><li>Longitud : ".$Longitude."</li><li>Latitude : ".$Latitude."</li>");

?>