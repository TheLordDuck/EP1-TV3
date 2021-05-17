<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Static</title>
</head>
<body>
  <h1>Static</h1>
  <p>
<?php
// Clase de la que sólo puede crearse un objeto
class Singleton
{
  // Esta variable es estática, por lo que
  // pertenece a la clase y no habrá una
  // copia para cada objeto
  private static $Referencia = NULL;

  // En el constructor
  function __construct()
  {
    // comprobamos si se ha creado un objeto
    if(self::$Referencia == NULL)
      // conservando la referencia
      self::$Referencia = $this;
    else // si ya hay un objeto
      // provocamos una excepción
      throw new Exception(
       'No puede crear más de un objeto');
  }

  // Método estático que facilita la
  // recuperación de la referencia
  public static function getReferencia()
  {
    return self::$Referencia;
  }

  // Método corriente que nos permitirá
  // comprobar el acceso al objeto
  function Identificate()
  {
    echo "Objeto <b>Singleton</b>";
  }
}

// Creamos un objeto
$UnObjeto = new Singleton();
echo "Creado el primer objeto<br />";

// Recuperamos la referencia al objeto
$Objeto = Singleton::getReferencia();
// e invocamos al método
$Objeto->Identificate();
echo "<p>";

// Controlamos la excepción
try {
  // e intentamos crear otro
  $OtroObjeto = new Singleton();
  echo "Creado el segundo";
} catch(Exception $e) {
  // mostramos información del error
  echo "Se produce una excepción: ".
   $e->getMessage()." - Trazado: <pre>".
   $e->getTraceAsString()."</pre>";
}
?>

 </p>
</body>
</html>