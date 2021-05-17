<?php
session_start();
//Cas de desconnexió
if (isset($_POST['borrar'])) {
    unset($_SESSION['login']);
	echo("Desconectat");
	exit;
} 
//Recollir dades del formulari
$nomUsuariActual = $_POST['login'];
$passwordActual = $_POST['password'];
define("Usuari", "miki");
define("Password", "12345");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
<title>Exercici 2</title>
</head>

<body>

<?php
//Verificació de Login PWD (Cas OK)
if(($nomUsuariActual == Usuari) && ($passwordActual == Password)){
    echo("<p> Has entrat correctament les dades </p>");
    $_SESSION['login'] = $nomUsuariActual;  
	echo("<h3> Benvingut usuari " .$_SESSION['login'] .".</h3>");	
	?>
	<form action="verificar.php" method="post">
	<input type="submit" name="borrar" id="borrar" value="Desconectar Sessio"/>
	</form>
<?php    
}else{ //Cas incorrecte, proposar de tornar a provar
    if (!isset($_SESSION['login'])) {
		echo("<p> Has entrat incorrectament el login o password. </p>");
	}?>
		<form action="exercici2.php" method="post">
		<input type="submit" name="tornar" id="tornar" value="Tornar-ho a provar"/>
		</form>
<?php	
}
?>
</body>

</html>
