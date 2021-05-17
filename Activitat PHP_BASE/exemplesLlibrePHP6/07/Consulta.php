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
// Intentamos la apertura con el API
try { // orientada a objetos
  $bddLibros = new
    SQLiteDatabase('Biblioteca.sqlite');
  // si llegamos aquí es que no se ha producido
  // una excepción y por tanto se ha abierto
  // sin problemas
  echo '<p>Apertura con <b>SQLiteDatabase</b>'.
       ' satisfactoria</p>';
  // capturar la posible excepción
} catch(Exception $e) {
  echo "<p>Fallo en la apertura con ".
       "<b>SQLiteDatabase</b> $e</p>";
  exit;
}

/*
// Vamos a ejecutar una consulta
// obteniendo datos
$bddResultado = $bddLibros->query(
  'SELECT * FROM Libros');
*/

// Cabecera de la tabla
echo '<table><tr><th>Identificador</th>'.
     '<th>ISBN</th><th>Título</th>'.
     '<th>Autor</th><th>Editorial</th></tr>';

// Ejecutamos la consulta sin buffer
$bddResultado = $bddLibros->unbufferedQuery(
    'SELECT * FROM Libros');

// Recorremos los resultados
foreach($bddResultado as $Fila) {
  // Obteniendo las columnas de cada fila
  list($Id, $ISBN, $Titulo,
       $Autor, $Editorial) = $Fila;
/*
// Vamos recuperando los datos de cada fila
while(list($Id,$ISBN,$Titulo,$Autor,$Editorial)=
      $bddResultado->fetch())

*/
  // mostrando los valores de las columnas
  echo "<tr><td>$Id</td><td>$ISBN</td>".
       "<td>$Titulo</td><td>$Autor</td>".
       "<td>$Editorial</td><tr>";
}
// Fin de la tabla
echo '</table>';
/*
// Recorremos los resultados
while($Fila = $bddResultado->fetch())
 // enviándolos a la página
 print_r($Fila);

// Vamos a insertar filas en la tabla Libros
if($bddLibros->query(
 "INSERT INTO Libros(ISBN, Titulo, Autor, ".
 "Editorial) VALUES ('84-415-1145', ".
 "'Introducción a la programación',".
 " 'Francisco Charte', 1) ; ".
 "INSERT INTO Libros VALUES (NULL, ".
 "'84-415-1568', 'Windows Server 2003', ".
 "'Francisco Charte', 1)"))
    echo 'Inserción de dos filas correcta';
else
 echo 'Fallo en la inserción de las dos filas';


   // Vamos a ejecutar de nuevo la consulta
   $bddResultado = $bddLibros->query('SELECT * FROM Libros');

   // Recorremos los resultados
   while(list($Id, $ISBN, $Titulo, $Autor, $Editorial) =
         $bddResultado->fetch())
      echo "Identificador: <b>$Id</b>, ISBN: <b>$ISBN</b>, ".
           "T&iacute;tulo: <b>$Titulo</b>, Autor: <b>$Autor</b>".
           ", Editorial: <b>$Editorial</b><br />";

*/
?>
</pre></p>
</body>
</html>