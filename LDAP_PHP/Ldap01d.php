<?php
$ds= ldap_connect("ldap.uda.ad",389) or die("No hi ha manera de trobar LDAP"); // servidor LDAP

if ($ds) {

$r=ldap_bind($ds,"mail=pakotilla@uda.ad","140264");

	if ($r) {
		echo "He fet un bind() a usuaris amb Nom=Miquel (givenname) : <p>";
		$sr= ldap_search($ds,"dc=ua,dc=ad", "givenname=miquel");
		echo "Nombre d'entrades : ".ldap_count_entries($ds,$sr)."<p>";
		$info = ldap_get_entries($ds, $sr);
		echo "Valor per : ".$info["count"]." items retornats:<p>";
		//echo "Entrada cn Nom Complert : ". $info[0]["cn"][0] ."<p>";
		//echo "Entrada Email : ". $info[0]["mail"][0] ."<p>";
		for ($i=0; $i<$info["count"]; $i++) {
			
			echo "Entrada : ". $info[$i]["cn"][0]. "<p>";
			
		}

//Tancar connexi� al server LDAP
		ldap_close($ds);
	} else {
		echo "Falla el bind() a usuari : ".$r. " Motiu<p>";
}
}
?>