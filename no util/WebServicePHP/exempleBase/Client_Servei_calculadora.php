<?php
   //llibreria per facilitar el consum/generació de serveis Web
	require_once('nusoap-0.9.5/lib/nusoap.php');
   //Referència al servei web
	$client = new nusoap_client('http://exemples.ua.ad/Miki/bloc3/WebServicePHP/exempleBase/servei_calculadora.php');
	
	//Consumir servei
	echo "<p>Valors : x=3 i y=4</p>";
	$resultat = $client->call('calculadora', array('x' => '3', 'y' => 4, 'operacio' => 'saluda'));
    echo "<li>Saluda : ".$resultat."</li>";
	$resultat = $client->call('calculadora', array('x' => '3', 'y' => 4, 'operacio' => 'suma'));
	echo "<li>suma : ".$resultat."</li>";
	$resultat = $client->call('calculadora', array('x' => '3', 'y' => 4, 'operacio' => 'resta'));
    echo "<li>resta : ".$resultat."</li>";
	$resultat = $client->call('calculadora', array('x' => '3', 'y' => 4, 'operacio' => 'multiplica'));
    echo "<li>multiplica : ".$resultat."</li>";
	$resultat = $client->call('calculadora', array('x' => '3', 'y' => 4, 'operacio' => 'divideix'));
    echo "<li>divideix : ".$resultat."</li>";
?>
