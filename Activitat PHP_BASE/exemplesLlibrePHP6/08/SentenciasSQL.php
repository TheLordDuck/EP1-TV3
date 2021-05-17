<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Sentencias SQL</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Sentencias SQL</h1>
  <p>
<?php

// Preparamos las sentencias SQL para crear
// la tabla Libros
define("sqlCreaTabla",
 'CREATE TABLE Libros (IdLibro INTEGER '.
   'PRIMARY KEY NOT NULL AUTO_INCREMENT, '.
   'ISBN VARCHAR(13), Titulo VARCHAR(50), '.
   'Autor VARCHAR(30), Editorial INTEGER)');

// Insertar en ella unas filas
define("sqlInsercion",
 'INSERT INTO Libros(ISBN, Titulo, Autor) '.
 'VALUES ("84-415-1544", '.
 '"Programación en GNU/Linux", '.
 '"Francisco Charte"), '.
 '("84-415-1482","Programación en ensamblador"'.
 ', "Francisco Charte")');

// y recuperarlas
define("sqlConsulta", 'SELECT * FROM Libros');

// Intentamos la conexion
$hBdd = mysql_connect('localhost',
  'francisco', 'charte')
   or die('Fallo en la conexión');

// y a continuación seleccionamos
// la base de datos
if(!mysql_select_db('GuiaPHP6', $hBdd)) {
   echo '<p>Fallo al conectar</p>';
   exit;
}

// Vamos a crear la tabla LibroVisitas
if(!mysql_query(sqlCreaTabla)) {
  echo '<p>Fallo al crear la tabla</p>';
  echo mysql_error();
  exit;
}

// La tabla ha sido creada, por lo que
// podemos insertar datos
if(mysql_query(sqlInsercion)) // si TRUE
   // se han insertado las filas indicadas
   // por mysql_affected_rows()
   echo '<p>'.mysql_affected_rows().
      ' filas insertadas</p>';
else { // en caso de FALSE ha habido un fallo
   echo '<p>Fallo al insertar las filas</p>';
   echo mysql_error();
}

// Ejecutamos la sentencia de consulta
$hResultado = mysql_query(sqlConsulta);

// Comprobamos que no haya habido problemas
if(!$hResultado) {
   echo '<p>Fallo al ejecutar la consulta </p>';
   echo mysql_error();
   exit;
}

// Indicamos el número de filas obtenidas
echo '<p>Se han recuperado '.
     mysql_num_rows($hResultado).
     ' filas</p>';
?>
</body>
</html>