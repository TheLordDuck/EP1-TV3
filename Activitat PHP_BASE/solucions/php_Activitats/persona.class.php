<?php
//Definició de la classe persona
// al pur estil JAVA
class persona{
    //Atributs
    private $codi;
    private $nom;
    private $cognom;
    private $email;
    private $edat;
	
    //Constructor  
    function persona($Ccodi, $Cnom, $Ccognom, $Cemail, $Cedat){
         $this->codi = $Ccodi;
         $this->nom = $Cnom;
         $this->cognom = $Ccognom;
         $this->email = $Cemail;
         $this->edat = $Cedat;
    }
    
    function setCodi($nouCodi){
         $this->codi = $nouCodi;
    } 
    
    function getCodi(){
         return $this->codi;
    }
    
    function setNom($nouNom){
         $this->nom = $nouNom;
    } 
    
    function getNom(){
         return $this->nom;
    }

     function setCognom($nouCognom){
         $this->cognom = $nouCognom;
    } 
    
    function getCognom(){
         return $this->cognom;
    }

    function setEmail($nouEmail){
         $this->email = $nouEmail;
    } 
    
    function getEmail(){
         return $this->email;
    }

    function setEdat($nouEdat){
         $this->edat = $nouEdat;
    }
    
    function getEdat(){
         return $this->edat;
    }
	
	function toString(){
	     return ("codi: " .$this->getCodi() ."; " . "nom: " .$this->getNom() ."; " . "cognom: " .$this->getCognom() ."; " ."email: " .$this->getEmail() ."; " ."edat: " .$this->getEdat() .".");
	}
           
}
               

?>
