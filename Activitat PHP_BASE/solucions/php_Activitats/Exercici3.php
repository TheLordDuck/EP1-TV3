<?php
session_start();
//Per poder efectura refresca en 
// llistat.php sense duplicar la mateixa dada 
$_SESSION['refresca']=0; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<form action="llistat.php" method="post">

Codi: <input type="text" name="codi"/><br/>
Nom: <input type="text" name="nom"/><br/>
Cognom: <input type="text" name="cognom"/><br/>
Email: <input type="text" name="email"/><br/>
Edat: <input type="text" name="edat"/><br/><br/>
<input type="submit" name="inserir" id="inserir" value="inserir dada"/>
</form>

</body>
</html>