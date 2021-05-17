<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
<title>Exercici 1</title>
</head>

<body>

<?php
//Recuperar valors de formulari
$any = $_POST["any"];
$mes = $_POST["mes"];
//Data actual
$anyActual = date("Y");
$mesActual =date("m");
$jubilacio = 65;
//Calculs
$Redat = $anyActual - $any;
$Rjubilacio = $any + $jubilacio;
//Presentació de dades
if($mes < $mesActual){
   echo("<p> El teu aniversari ja ha passat. Ja tens els : " .$Redat ." anys</p>"); 
}else{
   echo("<p> El teu aniversari encara no ha passat. Encara tens  " .($Redat-1) ." anys</p>"); 
}
echo("<p>La teva jubilacio sera a l'any:" .$Rjubilacio .".</p>" );
?>
</body>

</html>
