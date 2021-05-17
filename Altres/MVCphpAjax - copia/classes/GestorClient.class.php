<?php 
include_once("conexio.class.php");
include_once("client.class.php");

class GestorClient{
 //constructor	
 	var $con;
	var $unClient;
 	function GestorClient(){
 		$this->con=new DBManager;
		$this->unClient=new Client;
 	}

	function mostrar_Clients(){
		$this->con->conectar();
		//print "Taula ".$this->con->getTaulaClient();
		//var_dump($this->con);
		//print_r("Taula ".$this->con->taulaClient);
		$sql="SELECT * FROM ".$this->con->TaulaClient." ORDER BY id DESC";
		//$sql="SELECT * FROM Client ORDER BY id DESC";
		$bd=$this->con->conect;
		$consulta=$bd->prepare($sql);
		$consulta->execute();
		//$consulta=$bd->query($sql); // En cas de no voler-ho fer amb prepare
		return $consulta->fetchAll();
		}

	function eliminar($id){
		//Maping si cal de $camps cap a unClient
		//$this->unClient.id=.$id etc.....
		//echo "Client :".$id;
		$this->con->conectar();
		$sql="DELETE FROM Client WHERE id=".$id;
		$bd=$this->con->conect;
		$consulta=$bd->prepare($sql);
		$consulta->execute();
		return true;
	}
//Aquestes funcions caldrà adaptar-les per seguir el model PDO com les 2 funcions anteriors
	function inserir($camps){
		//Maping si cal de $camps cap a unClient
		//$this->unClient.noms=.$camps[0] etc.....
		if($this->con->conectar()==true){
			//print_r($camps);
			//echo "INSERT INTO Client (noms, ciutat, sexe, telefon, data_neix) VALUES ('".$camps[0]."', '".$camps[1]."','".$camps[2]."','".$camps[3]."','".$camps[4]."')";
			return mysql_query("INSERT INTO Client (noms, ciutat, sexe, telefon, data_neix) VALUES ('".$camps[0]."', '".$camps[1]."','".$camps[2]."','".$camps[3]."','".$camps[4]."')");
		}
	}
	
	function actualizar($camps,$id){
		//Maping si cal de $camps cap a unClient
		//$this->unClient.noms=.$camps[0] etc.....
		if($this->con->conectar()==true){
			//print_r($camps);
			return mysql_query("UPDATE Client SET noms = '".$camps[0]."', ciutat = '".$camps[1]."', sexe = '".$camps[2]."', telefon = '".$camps[3]."', data_neix = '".$camps[4]."' WHERE id = ".$id);
		}
	}
	
	function mostrar_Client($id){
		//Maping si cal de $camps cap a unClient
		//$this->unClient.id=.$id etc.....
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM Client WHERE id=".$id);
		}
	}

	
}
?>