<?php
header('Content-type: image/png');

// Creamos la imagen
$Imagen = imagecreatetruecolor(400,200);

// Obtenemos los colores que nos interesan
$Azul = imagecolorallocate($Imagen,0,0,255);
$Gris = imagecolorallocate($Imagen,96,96,96);

// Un bucle que recorre el ancho de la imagen
for($X=0; $X<400; $X+=4) {
  // para ir dibujando una serie de líneas
  imageline($Imagen,0,0,$X,199,$Azul);
  // y de rectángulos en sentido opuesto
  imagerectangle($Imagen,
     400,0,400-$X,$X/2,$Gris);
}

// Liberamos los colores
imagecolordeallocate($Imagen,$Azul);
imagecolordeallocate($Imagen,$Gris);

// Enviamos la imagen
imagepng($Imagen, 'Grafico.png');

// y finalmente la destruimos
imagedestroy($Imagen);
?>