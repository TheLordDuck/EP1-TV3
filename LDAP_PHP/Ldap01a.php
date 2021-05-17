<?php
$ds= ldap_connect("ldap.uda.ad",389); // Accedir al servidor LDAP
echo "Resultat de connect(): ".$ds."<p>";
$r=ldap_bind($ds);
echo "Resultat del bind() anonym : ".$r."<p>";
// Si connexió OK
if ($ds) {
// Si connexió OK (usuari no anònim sense servidor protegit)
$r = ldap_bind($ds,"mail=pakotilla@uda.ad","140264");
echo "Resultat del bind(): ".$r."<p>";
// Un usuari autenticat pot començar a fer cerques en el directori LDAP
$sizelimit=5;
$sr= ldap_search($ds,"dc=ua,dc=ad", "objectClass=person");
/* Indicar el nombre d'entrades trobades*/
echo "Nombre d'entrades : ".ldap_count_entries($ds,$sr)."<p>";
$info = ldap_get_entries($ds, $sr);
echo "Valor per : ".$info["count"]." items retornats:<p>";
for ($i=0; $i<$info["count"]; $i++) {
echo "Entrada email: ". $info[$i]["mail"][0] ."<p>";
}
//Tancar connexió al server LDAP
ldap_close($ds);
} else {
echo "<h4>Problemes amb el servidor LDAP</h4>";
} ?>