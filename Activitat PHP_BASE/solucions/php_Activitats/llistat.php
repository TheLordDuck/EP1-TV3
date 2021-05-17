<?php
require('persona.class.php');
session_start();
$t1=$_SESSION['taula']; //Treballem localment amb una taula auxiliar
echo ("Sessió :".$_SESSION['refresca']);
?>
<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Consulta</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
    th { background: black; color: white }
    td { border-bottom: 1px solid black; border-right: 1px solid black}
  </style>
</head>
<body>
  <h1>Consulta</h1>
  <p><pre>
<?php
//En cas de que l'usuari faci refrescar al navegador, evitar
//una segona entrada en la taula
if(!$_SESSION['refresca']){
$_SESSION['refresca']=1; //Entrada de dades el posa a 0
//Crear Objecte a partir de les dades recollides del formulari
$personaActual = new persona($_POST['codi'], $_POST['nom'], $_POST['cognom'], $_POST['email'], $_POST['edat']);
//Mostrar dades de l'objecte carregat
echo("<p> Dades Persona actual: " .$personaActual->toString().".</p>");
//Afegir a la taula
$t1[]=$personaActual;
//Actualitzar variable de sessió
$_SESSION['taula']=$t1;
}
//Presentació de dades
echo("<p> Nombre elements en Taula: " .count($t1)."</p>");
echo("<p> ===============================</p>");
foreach($t1 as $x){	
	 echo("<h3> Dades de la persona: </h3>");
	 echo("<p> Nom: " .$x->getNom().".</p>");
	 echo("<p> CogNom: " .$x->getCognom().".</p>");
	 $cadena="<a href="."editar.php?codi=";
	 echo("<p>".$cadena.$x->getCodi().">Editar registre </a>"."</p>");
	 echo("<p> ===============================</p>");
}  
?>
</body>
</html>