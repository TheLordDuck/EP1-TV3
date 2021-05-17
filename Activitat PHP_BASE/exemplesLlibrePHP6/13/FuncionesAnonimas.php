<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Funciones anónimas</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=UTF-8" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Funciones anónimas</h1>
<p>
<?php
// Vector con la información a procesar
$titulos = array("GP PHP 6", "GP SQL", "MA EXCEL 2007", "MI WORD 2007");

/*
// Función que sustituye los prefijos por nombres de colección
function sustituye($titulo) {	  switch(substr($titulo, 0, 2)) {
	  	 case 'GP': return 'Guía práctica ' . substr($titulo, 3);
	  	 case 'MA': return 'Manual avanzado ' . substr($titulo, 3);
	  	 case 'MI': return 'Manual imprescindible ' . substr($titulo, 3);
	  	}
}
*/

/*
// Creamos la función anónima asignándola a $f
$f = create_function('$titulo', '
	  switch(substr($titulo, 0, 2)) {
	  	 case "GP": return "Guía práctica " . substr($titulo, 3);
	  	 case "MA": return "Manual avanzado " . substr($titulo, 3);
	  	 case "MI": return "Manual imprescindible " . substr($titulo, 3);
	  	}');

echo "<p>Nombre de la función: $f</p>";

// Procesamos el array
foreach(array_map($f, $titulos) as $t)
  print $t . '<br />';
*/

/*
$f = function($titulo) { // función lambda que procesa cada elemento
	  switch(substr($titulo, 0, 2)) {
	  	 case 'GP': return 'Guía práctica ' . substr($titulo, 3);
	  	 case 'MA': return 'Manual avanzado ' . substr($titulo, 3);
	  	 case 'MI': return 'Manual imprescindible ' . substr($titulo, 3);
	  	}
	};

echo "<p>Nombre de la función: $f</p>";
*/
// Se va a recorrer el vector tal y como lo devuelve array_map
$editorial = 'Anaya';

foreach(array_map(
    function($titulo) use ($editorial) { // función lambda que procesa cada elemento
      echo $editorial;
	  switch(substr($titulo, 0, 2)) {
	  	 case 'GP': return 'Guía práctica ' . substr($titulo, 3);
	  	 case 'MA': return 'Manual avanzado ' . substr($titulo, 3);
	  	 case 'MI': return 'Manual imprescindible ' . substr($titulo, 3);
	  }
	}, $titulos) as $t) {
  print $t . '<br />';
}
?>
</p>
</body>
</html>
