<?php //Classe per la connexió al SGBD i BD
class ConnectorBD{
	private $_conect;
  	private $_baseDades;
	private $_servidor;
	private $_usuari;
	private $_clau;
	private $_taulaClient;
	
	public function __construct(){
		$this->_baseDades = "empresa1";
		$this->_servidor = "mysql:host=localhost;dbname=empresa1";
		$this->_usuari = "root";
		$this->_clau = "";
		$this->_taulaClient="Client";
	}
	//Control de la connexió, possibles errors
	public function conectar()
	{
		try {
			$tmp = new PDO($this->_servidor, $this->_usuari, $this->_clau);
			$this->_conect = $tmp;//$this->BaseDades->query($consulta);
			//print_r($tmp); //Debugging
			return true;
		}catch(PDOException $e) {
			print "    <p> Error en Connexió : " . $e->getMessage() . "</p>\n";
			exit();
		}
	}		
	public function getBaseDades() {
		return $this->_baseDades;
	}
	public function getTaulaClient(){
		return $this->_taulaClient;
	}
	public function getConect(){
		return $this->_conect;
	}
}
?>
