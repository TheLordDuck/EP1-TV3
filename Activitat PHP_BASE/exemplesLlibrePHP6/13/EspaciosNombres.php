<?php
namespace Anaya\GuiaPHP6 {	// Clase definida dentro del espacio de nombres Anaya\GuiaPHP6
	class Libro {		public function set($clave, $valor) {			$this->$clave = $valor;
	    }

	    public function get($clave) {	    	return $this->$clave;
	    }
	}
} // Fin del espacio de nombres Anaya\GuiaPHP6
namespace { ?>
<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Espacios de nombres</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=UTF-8" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Espacios de nombres</h1>
<p>
<?php
use Anaya\GuiaPHP6\Libro as LibroPHP;

$unLibro = new LibroPHP();
$unLibro->titulo = "Guía práctica PHP 6";
echo $unLibro->titulo;
?>
</p>
</body>
</html>
<?php } ?>