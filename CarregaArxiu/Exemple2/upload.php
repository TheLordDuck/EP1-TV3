<?php
if (!isset($_FILES["file"]) or count($_FILES["file"])==0) { //Cas de cap arxiu
    return "";
}

$directori="upload/";

$source = $_FILES["file"]["tmp_name"];
$fileName = $_FILES["file"]["name"];
//$uid=$_SESSION["uid"];

//Test per breakPoint en AJAX
//echo json_encode(["result"=>1, "time"=>$_POST["time"], "CadeSQL"=>$sql, "error"=>""]);
//return;

$destination = $directori.$fileName;

// Verifica si ya existeix el arxiu.
// Podem comentar aquestes línies si volem sobre-escriure els arxius
if (file_exists($destination)) {
    echo json_encode(["result"=>0, "time"=>$_POST["time"], "fileName"=>$fileName, "error"=>"Arxiu ja existent"]);
    return;
}

// Per motius de seguretat no deixem penjar arxius .php
$extProhibides = ["php", "php3", "php4", "php4"];
$ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
if (in_array($ext, $extProhibides)) {
    echo json_encode(["result"=>0, "time"=>$_POST["time"], "fileName"=>$fileName, "error"=>"Extensió no permesa"]);
    return;
}

// còpia l'arxiu
if (move_uploaded_file($source, $destination)) { //Còpia correcta obtenim true
//Preparar resposta per petició AJAX (upload.js)
    echo json_encode(["result"=>1, "time"=>$_POST["time"], "fileName"=>$fileName, "error"=>""]); //Ok
} else { //obtenim False en if
    echo json_encode(["result"=>0, "time"=>$_POST["time"], "fileName"=>$fileName, "error"=>"No s'ha pogut moure l'arxiu"]);
}
?>
