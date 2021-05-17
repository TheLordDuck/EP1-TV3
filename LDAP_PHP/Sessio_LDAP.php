<?php
//Test previ amb :
//http://exemples.ua.ad/Miki/Bloc3/B3M5/Sessio_LDAP.php?email=mviladrich@uda.ad
// Retorna ["Miquel Viladrich Gimenez","miquel"]
session_start();
$entrada=$_REQUEST["email"]; //Recollir email a validar en LDAP

$ds= ldap_connect("ldap.uda.ad",389) or die("No hi ha manera de trobar LDAP"); // servidor LDAP

if ($ds) {
	//Un usuari autoritzat a fer consultes
	$r=ldap_bind($ds,"mail=pakotilla@uda.ad","140264");
	if ($r) {
		//Cerca per email
		$sr= ldap_search($ds,"dc=ua,dc=ad", "mail=".$entrada."");
		//Lectura de les entrades
		$info = ldap_get_entries($ds, $sr);
		$uid = $info[0]["uid"][0];
		$_SESSION["Nom Usuari"]=$info[0]["cn"][0];
		$nc=$info[0]["cn"][0];
		$_SESSION["uid"]=$uid;
	} else {
		echo "Falla el bind() a usuari : ".$r. " Motiu<p>";
	}
	//Tancar connexió al server LDAP
	ldap_close($ds);
	//Retornar paràmetres uid i Email validats
	header('Content-type: application/json');
	$consulta=array();
	array_push($consulta,$nc,$uid);
	echo json_encode($consulta);	 //Format : ["Nom Complert", "uid"]	
}
?>