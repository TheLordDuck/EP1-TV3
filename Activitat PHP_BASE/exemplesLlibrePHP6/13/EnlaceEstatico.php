<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Enlace estático en ejecución</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=UTF-8" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Enlace estático en ejecución</h1>
<p>
<?php
/*
class Entidad {   public function procesa() {		$this->dibuja();
   }

   public function dibuja() {   	echo "<p>Entidad genérica</p>";
   }
}

class Cubo extends Entidad {	public function dibuja() {		echo "<p>Se dibuja un cubo</p>";
	}
}

$escena = new Cubo();
$escena->procesa();
*/
class Entidad {
   static public function procesa() {   	    // En un método estático no existe la
   	    // variable $this, self:: es el equivalente
		static::dibuja();
   }

   static public function dibuja() {
   	echo "<p>Entidad genérica</p>";
   }
}

class Cubo extends Entidad {
	static public function dibuja() {
		echo "<p>Se dibuja un cubo</p>";
	}
}

// Invocación directa al método procesa() de Cubo
Cubo::procesa();

?>
</p>
</body>
</html>
