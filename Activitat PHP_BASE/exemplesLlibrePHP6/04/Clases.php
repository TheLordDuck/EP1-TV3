<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Clases</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=ISO-8859-1" />
</head>
<body>
  <h1>Clases</h1>
  <p>
<?php
// Una clase sencilla
class Punto
{
  // Con dos propiedades públicas
  private $pX, $pY;

  // Constructor que acepta dos parámetros
  function __construct($XInicial, $YInicial)
  {
    // para inicializar el objeto
    $this->pX = $XInicial;
    $this->pY = $YInicial;
  }

  // Método de lectura de propiedades
  function __get($propiedad)
  {
     // Según el nombre de la propiedad
     switch($propiedad) {
       // devolvemos un miembro u otro
       case 'X': return $this->pX;
                 break;
       case 'Y': return $this->pY;
                 break;
       default:  return NULL;
     }
  }

  // Método de escritura de propiedades
  function __set($propiedad,$valor)
  {
     switch($propiedad) {
       case 'X': $this->pX=$valor;
                 break;
       case 'Y': $this->pY=$valor;
                 break;
     }
  }

  // y un método
  function Imprime()
  {
    echo 'X='.$this->pX.', Y='.$this->pY;
  }
}

// Clase derivada de Punto
class Circulo extends Punto
{
  // Cuenta con un campo privado
  private $pRadio;

  // El constructor recibe tres argumentos
  function __construct(
    $XInicial,$YInicial,$RInicial)
  {
    // dos los facilitamos al constructor base
    parent::__construct($XInicial,$YInicial);
    // y el tercero lo guardamos en la variable
    $this->pRadio = $YInicial;
  }

  // Método de lectura de propiedades
  function __get($propiedad)
  {
    // Si la propiedad es Radio
    if($propiedad == 'Radio')
      // la devolvemos
      return $this->pRadio;
    else // en caso contrario redirigimos
      // al método de acceso heredado
      return parent::__get($propiedad);

  }

  // Método de asignación de propiedades
  function __set($propiedad,$valor)
  {
    // Si la propiedad es Radio
    if($propiedad == 'Radio')
      // guardamos el nuevo valor
      $this->pRadio = $valor;
    else // de lo contrario dejamos que sea
      // la clase base quien actúe
      parent::__set($propiedad,$valor);
  }

  // Método Imprime
  function Imprime()
  {
    parent::Imprime();
    echo ', Radio='.$this->pRadio;
  }
}

?>
<p>
<?php
function Identifica(Punto $objeto)
{
  if($objeto instanceof Punto)
   echo 'El objeto es de clase <b>Punto</b>';
  else
   echo 'El objeto es de otra clase';

  echo '<br />';
}

Identifica(new Punto(10,10));
Identifica(new Circulo(10,10,50));

// Creamos un objeto con unos valores iniciales
$UnCirculo = new Circulo(10,10,50);
// e invocamos a su método Imprime()
$UnCirculo->Imprime();
echo '<br />';
// Alteramos las propiedades X e Y
$UnCirculo->X = 15;
$UnCirculo->Y = 20;
$UnCirculo->Radio = 120;
// y repetimos
$UnCirculo->Imprime();

?>
</body>
</html>