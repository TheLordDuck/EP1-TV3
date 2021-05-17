<?php
//Connexió al document WSDL
//Us de SoapClient (sense llibreria nuSoap)

//Referència al servei
//$client = new SoapClient('http://ws.cdyne.com/ip2geo/ip2geo.asmx?WSDL');
$client = new soapclient('https://ws.cdyne.com/ip2geo/ip2geo.asmx?WSDL');
//Invocar Servei
$result = $client->ResolveIP(array('ipAddress' => '194.158.64.7','licenseKey'=>'0'));
//El resultat és una estructura descrita en el WSDL

//Presentar valors particulars de l'estructura retornada
$country = $result->ResolveIPResult->Country;
$Latitude = $result->ResolveIPResult->Latitude;
$Longitude = $result->ResolveIPResult->Longitude;
print_r("\nPais : ".$country."\nLongitud : ".$Longitude."\nLatitude : ".$Latitude);

?>