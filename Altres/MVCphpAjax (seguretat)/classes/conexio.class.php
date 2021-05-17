<?php 
//Classe per la connexió al SGBD i BD
class DBManager{
	var $conect;
  	var $BaseDades;
	var $Servidor;
	var $Usuari;
	var $Clau;
	
	
	function DBManager(){
		$this->BaseDades = "empresa1";
		$this->Servidor = "localhost";
		$this->Usuari = "root";
		$this->Clau = "";
	}
//Control de la connexió, possibles errors
	function conectar() {
		if(!($con=@mysql_connect($this->Servidor,$this->Usuari,$this->Clau))){
			//echo"<h1> [:(] Error al conectar al Servidor (seguretat ?)</h1>";	
			exit();
		}
		if (!@mysql_select_db($this->BaseDades,$con)){
			//echo "<h1> [:(] Error al seleccionar la base de dades</h1>";  
			exit();
		}
		//Cap problema, disposem de connexió i selecció de BD
		$this->conect=$con;
		return true;	
	}
}
?>
