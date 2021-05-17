<?php
$usuario    = $_REQUEST["usuari"];
$contraseña = $_REQUEST["pwd"];
$cadenaPHP 	= $_REQUEST["cadenaPHP"];
echo "Usuari : ".$usuario."<br>";
echo "PWD : ".$contraseña."<br>";
//echo eval($cadenaPHP);
//print eval(phpinfo());
echo $cadenaPHP;
eval($cadenaPHP);
$consulta = "SELECT * FROM taula
    WHERE usuari='$usuario'
    AND pwd='$contraseña'";

$bd=conectar();
//$resultat=$bd->prepare($consulta);
//$resultat->execute();
$resultat=$bd->query($consulta);
if (!$resultat) {
    print "<p>Error en la consulta.</p>\n";
} else {
	//print "<p>Nombre de usuario y contraseña correctos.</p>\n".$resultat->fetchAll();
	//foreach ($resultat as $valor){
		//print " <p>$valor[usuari] $valor[pwd] </p>\n";
		//print $valor;
		print "<p>Nombre de usuario y contraseña correctos.</p>\n";
	//}
	
}
	//} else ($resultat[0][0] > 0) {
   // print "<p>Nombre de usuario y contraseña correctos.</p>\n";
//}

function conectar()
	{
		$baseDades = "injcodi";
		$servidor = "mysql:host=localhost;dbname=injcodi";
		$usuari = "root";
		$clau = "";
		$taulaClient="taula";
		
		try {
			$tmp = new PDO($servidor, $usuari, $clau);
			//$this->_conect = $tmp;//$this->BaseDades->query($consulta);
			//return true;
			return $tmp;
		}catch(PDOException $e) {
			print "    <p> Error en Connexió : " . $e->getMessage() . "</p>\n";
			exit();
		}
	}
	
function mostrar_Clients(){
		$this->con->conectar();
		$sql="SELECT * FROM ".$this->con->getTaulaClient()." ORDER BY id ASC";
		$bd=$this->con->getConect();
		$consulta=$bd->prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll(); //Retornar Dades al Controlador GUI
		}	

?>