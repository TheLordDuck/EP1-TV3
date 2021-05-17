<?php
   //
   // Clase Contador
   //
   // Una clase que facilita la introducci�n de contadores
   // en las p�ginas.
   //

class Contador {
  // Variables privadas para conservar el n�mero
  // de visitas y el nombre del contador
  private $nVisitas, $sNombreContador;

  // El constructor necesita como argumento el 
  // nombre del contador
  public function __construct($NombreContador)
  {
     // lo guardamos y lo usamos
     $this->sNombreContador = $NombreContador;
     // para componer el nombre del archivo
     $sArchivo = './'.$NombreContador.'.contador';

     // Comprobamos si el archivo existe
     if(file_exists($sArchivo)) {
       // Abri�ndolo para lectura
       $hArchivo = fopen($sArchivo, 'rb'); 
       // y recuperamos su contenido
       $this->nVisitas = fgets($hArchivo, 10);
       // cerr�ndolo a continuaci�n
       fclose($hArchivo);
     }
     else // en caso contrario
       // no hay visitas previas
       $this->nVisitas = 0;

     // incrementamos el contador
     $this->nVisitas++; 

     // Abrimos el archivo eliminando el contenido
     $hArchivo = fopen($sArchivo, 'wb');
     // y escribimos el contador
     fwrite($hArchivo, $this->nVisitas); 
     // cerr�ndolo para terminar
     fclose($hArchivo); // cerramos el archivo
  }

  // M�todo de acceso al valor del contador
  function __get($propiedad)
  {
    // Devolvemos el valor del contador
    // indistintamente de la propiedad
    return $this->nVisitas;
  }
}
?>
