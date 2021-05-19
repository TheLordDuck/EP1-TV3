<?php
include "config.php";
include "utils.php";


$dbConn =  connect($db);

/*
  Accés via GET, llistat complert o per id
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id']))
    {
      //Mostrar per id
      $sql = $dbConn->prepare("SELECT * FROM client where id=:id");
      $sql->bindValue(':id', $_GET['id']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
      exit();
	  }
    else {
      //Llistat complert
      $sql = $dbConn->prepare("SELECT * FROM client");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode( $sql->fetchAll()  );
      exit();
	}
}

// Amb POST es crea un nou registre 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $input = $_POST;
    $sql = "INSERT INTO client
          (noms, ciutat, sexe, telefon)
          VALUES
          (:noms, :ciutat, :sexe, :telefon)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();
    if($postId)
    {
      $input['id'] = $postId;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      exit();
	 }
}

//Borrar
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
	$id = $_GET['id'];
  $statement = $dbConn->prepare("DELETE FROM client where id=:id");
  $statement->bindValue(':id', $id);
  $statement->execute();
	header("HTTP/1.1 200 OK");
	exit();
}

//Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    
	$input = $_GET;
	//$dades=fopen("php://input", "r");
	//parse_str(file_get_contents("php://input"),$post_vars);
    //echo $post_vars[0]." is the fruit\n";
    //echo "I want ".$post_vars[1]." of them\n\n";
	
	
    $postId = $input['id'];
	$fields = getParams($input);
	var_dump($fields); //Verificar parametres
	

    $sql = "
          UPDATE client
          SET $fields
          WHERE id='$postId'
           ";
		   
	print_r("valor ".$sql); //Verificar Cadena sql
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);

    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}


//Cas de petició errònia (fora de GET i GET id,POST,PUT o DELETE)
header("HTTP/1.1 400 Bad Request");

?>