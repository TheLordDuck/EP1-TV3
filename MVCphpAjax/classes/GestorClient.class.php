<?php 
include_once("Client.class.php");
include_once("ConnectorBD.class.php");

class GestorClient{
 	var $con;
	var $unClient;
	 //constructor
	function __construct(){
 		$this->con=new ConnectorBD;
		$this->unClient=new Client;
 	}
	//Mostrar Clients ordenats per ID Descendent
	//Usem PDO amb Consultes preparades
	function mostrar_Clients(){
		$this->con->conectar();
		$sql="SELECT * FROM ".$this->con->getTaulaClient()." ORDER BY id ASC";
		$bd=$this->con->getConect();
		$consulta=$bd->prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll(PDO::FETCH_ASSOC); //Retornar Dades al Controlador GUI
		//return $consulta->fetchAll(); //Retornar Dades al Controlador GUI
		}
	//Rebre un paràmetre directament
	function eliminar($id){
		$this->con->conectar();
		$sql="DELETE FROM ".$this->con->getTaulaClient()." WHERE id=:ident";
		$bd=$this->con->getConect();
		$consulta=$bd->prepare($sql);
		$consulta->execute([":ident"=>$id]); //Taula amb paràmetres de consulta
		return true;
	}
	//Rebre un objecte de la classe Client
	function inserir($unClient){
		$this->con->conectar();
		$sql="INSERT INTO ".$this->con->getTaulaClient()." (noms, ciutat) VALUES (:noms, :ciutat)";
		$bd=$this->con->getConect();
		$consulta=$bd->prepare($sql);
		$consulta->bindParam(':noms', $unClient->getNoms());
        $consulta->bindParam(':ciutat', $unClient->getCiutat());
		$consulta->execute();
		return true;
	}
//Aquestes funcions caldrà adaptar-les per seguir el model PDO com les 2 funcions anteriors
	function actualizar($unClient){ // Client amb ID i els camps a modificar
		//$sql="UPDATE Client SET noms = :noms, ciutat = :ciutat WHERE id = :id";
	}
	function mostrar_Client($id){
		
	}
	function test(){
		return true;
	}
}
?>