<?php
header('Content-type: image/png');

// Creamos la imagen
$Imagen = imagecreatetruecolor(410,410);

// Obtenemos los colores que nos interesan
$Blanco = imagecolorallocate(
   $Imagen,255,255,255);

// Obtenemos colores adicionales
$Verde = imagecolorallocate(
   $Imagen,0,255,0);
$Negro = imagecolorallocate(
   $Imagen,0,0,0);

// Preparamos los diferentes estilos
// Punteado
$Punteado = array($Blanco,$Blanco,$Negro);

// a trazos
$Guionado =
  array($Blanco,$Blanco,$Blanco,$Blanco,$Blanco,
  $Blanco,$Blanco,$Blanco,$Blanco,$Blanco,
  IMG_COLOR_TRANSPARENT,IMG_COLOR_TRANSPARENT,
  IMG_COLOR_TRANSPARENT,IMG_COLOR_TRANSPARENT,
  IMG_COLOR_TRANSPARENT,IMG_COLOR_TRANSPARENT);

// a trazos de diferente color
$Guionado2 = array();
// y preparados para un grosor de 3 píxeles
foreach(array($Blanco,IMG_COLOR_TRANSPARENT,
     $Verde,IMG_COLOR_TRANSPARENT) as $Color)
  for($Indice=0;$Indice<15;$Indice++)
    $Guionado2[] = $Color;

// Establecemos el estilo para las elipses
imagesetstyle($Imagen,$Punteado);

// Dibujamos dos elipses con el centro en el
// mismo punto pero distintos anchos y altos
imageellipse($Imagen,100,100,180,40,
  IMG_COLOR_STYLED);
imageellipse($Imagen,100,100,40,180,
  IMG_COLOR_STYLED);


// Fijamos el estilo para los arcos
imagesetstyle($Imagen,$Guionado);

// Ahora vamos a dibujar dos arcos de una misma
// circunferencia
imagearc($Imagen,300,100,180,180,0,90,
   IMG_COLOR_STYLED);
imagearc($Imagen,300,100,180,180,180,270,
   IMG_COLOR_STYLED);


// Finalmente añadimos una nube de 100 píxeles
for($Indice=0;$Indice<100;$Indice++)
  // en posiciones aleatorias
  imagesetpixel($Imagen,rand(200,400),
                rand(200,400),$Blanco);

// Rellenamos la elipse más ancha con color
// verde sólido y opaco
imagefilledellipse($Imagen,
  100,100,178,38,$Verde);
// preparamos un azul intermedio y
// semitransparente
$AzulSemi = imagecolorallocatealpha($Imagen,
   127,127,255,64);
// para rellenar la elipse más alta dejando
// ver la otra debajo
imagefilledellipse($Imagen,
  100,100,38,178,$AzulSemi);

// Recuperamos el logo que hemos preparado
$Logo = imagecreatefrompng('php.png');
// y lo establecemos como patrón de relleno
imagesettile($Imagen,$Logo);
// para el área delimitada por los arcos
imagefilledellipse($Imagen,300,100,178,178,
   IMG_COLOR_TILED);

// Fijamos el estilo para el rombo
imagesetstyle($Imagen,$Guionado2);
// y su grosor
imagesetthickness($Imagen,3);

// y lo rellenamos con ese patrón
imagefilledpolygon($Imagen,
 array(20,300,100,200,180,300,100,400),
 4,IMG_COLOR_STYLED);

imagestring($Imagen,5,10,1,"Guía práctica PHP 6", $Verde);
imagestringup($Imagen,4,390,380,"Guía práctica PHP 6", $Blanco);

// Liberamos el color
imagecolordeallocate($Imagen,$Blanco);

// Enviamos la imagen
imagepng($Imagen);

// y finalmente la destruimos
imagedestroy($Imagen);
?>