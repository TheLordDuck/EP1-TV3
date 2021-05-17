<?php 
//Classe per la connexió al SGBD i BD
class DBManager{
	var $conect;
  	var $BaseDades;
	var $Servidor;
	var $Usuari;
	var $Clau;
	var $TaulaClient;
	
	function DBManager(){
		$this->BaseDades = "empresa1";
		$this->Servidor = "mysql:host=localhost;dbname=empresa1";
		$this->Usuari = "root";
		$this->Clau = "";
		$this->TaulaClient="Client";
	}
	//Control de la connexió, possibles errors
	function conectar()
	{
		try {
			$tmp = new PDO($this->Servidor, $this->Usuari, $this->Clau);
			$this->conect = $tmp;//$this->BaseDades->query($consulta);
			return true;
		}catch(PDOException $e) {
			print "    <p> Error en Connexió : " . $e->getMessage() . "</p>\n";
			exit();
		}
	}		
	function getBaseDades() {
		return $this->$BaseDades;
	}

	public function laTaulaClient(){
		return $this->$TaulaClient;
	}
}
?>
