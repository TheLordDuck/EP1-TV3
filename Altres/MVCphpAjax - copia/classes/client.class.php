<?php 

// Es tracte d'un element POJO (objecte 'Pur' amb els seues attributs i mètodes set i get)
class Client{
 //Attrinuts	
 	var $id;
	var $nom;
	//....
	//....
	//Constructor
	// 
 	function Client(){ // Entre parèntesis els attributs id, nom, etc....
 		//$this->$id=;
		//$this->$nom=;
 	}
	
	function getId() {
		return $this->$id;
	}
	
	//Altres sets i gets......
}	
?>