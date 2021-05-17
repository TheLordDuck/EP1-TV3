<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Static</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=ISO-8859-1" />
</head>
<body>
  <h1>Static</h1>
  <p>
<?php
// Clase de la que s�lo puede crearse un objeto
class Singleton
{
  // Esta variable es est�tica, por lo que
  // pertenece a la clase y no habr� una
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
      // provocamos una excepci�n
      throw new Exception(
       'No puede crear m�s de un objeto');
  }

  // M�todo est�tico que facilita la
  // recuperaci�n de la referencia
  public static function getReferencia()
  {
    return self::$Referencia;
  }

  // M�todo corriente que nos permitir�
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
// e invocamos al m�todo
$Objeto->Identificate();
echo "<p>";

// Controlamos la excepci�n
try {
  // e intentamos crear otro
  $OtroObjeto = new Singleton();
  echo "Creado el segundo";
} catch(Exception $e) {
  // mostramos informaci�n del error
  echo "Se produce una excepci�n: ".
   $e->getMessage()." - Trazado: <pre>".
   $e->getTraceAsString()."</pre>";
}
?>

 </p>
</body>
</html>