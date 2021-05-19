<?php // Es tracte d'un element POJO (objecte 'Pur' amb els seues attributs i mètodes set i get)
class Client{
 //Attrinuts	
 	private $_id;
	private $_noms;
	private $_ciutat;
	// sexe, telefon, data_neix
	//Constructor
	function __construct(){ // Entre parèntesis els attributs id, noms, etc....
 		//$this->_id=;
		//$this->_noms=;
 	}
	function getCiutat() {
		return $this->_ciutat;
	}
	function setCiutat($ciutat) {
		$this->_ciutat=$ciutat;
	}
	function getNoms() {
		return $this->_noms;
	}
	function setNoms($noms) {
		$this->_noms=$noms;
	}
	//Altres sets i gets......
}	
?>
