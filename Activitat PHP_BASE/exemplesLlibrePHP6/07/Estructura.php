<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Información de estructura</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
    <h1>Información de estructura</h1>
<?php
try { // Intentamos la apertura con el API orientada a objetos
 $bddLibros = new SQLiteDatabase('Biblioteca.sqlite');
 // si llegamos aquí es que no se ha producido una excepción
 // y por tanto se ha abierto sin problemas
 echo '<p>Apertura con <b>SQLiteDatabase</b> satisfactoria</p>';
} catch(Exception $e) { // capturar la posible excepción
 echo "<p>Fallo en la apertura con <b>SQLiteDatabase</b> $e</p>";
 exit;
}

// Obtenemos de la tabla de sistema la lista 
// de nombres de tablas existentes en la base 
// de datos
$Tablas = $bddLibros->arrayQuery(
  "SELECT name FROM SQLITE_MASTER WHERE ".
  "type='table'");

// Por cada tabla
foreach($Tablas as $Tabla) {
  // mostramos su nombre
  echo "<h3>Tabla : ${Tabla['name']}</h3>";

  // Recuperamos la matriz con los nombres y 
  // tipos de columnas
  $Tipos = $bddLibros->fetchColumnTypes(
           $Tabla['name']);
  // mostrando esa información
  foreach($Tipos as $Nombre => $Tipo)
    echo "Columna <b>$Nombre</b> es de tipo ".
         "<b>$Tipo</b><br />";
}

?>
</body>
</html>