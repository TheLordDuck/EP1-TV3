<?php
 // Activamos el almacenamiento de resultados
 ob_start();
 // e iniciamos una sesi�n
 session_start();
?>

<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Suscripci�n</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=ISO-8859-1" />
  <style type="text/css">
    * { font-family: monospace }
  </style>
</head>
<body>
  <h1>Suscripci�n</h1>

<?php
if(isset($_COOKIE['SuscripcionAnaya']))
 echo '<p style="color: red">Ya tiene activa '.
  'una suscripci�n con la direcci�n <b>'.
  $_COOKIE['SuscripcionAnaya'].'</b>.</p>';

// Si hemos recibido el formulario
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Tomamos los valores de $_POST
  $Valores = $_POST;

  // De no haber seleccionado ning�n elemento
  // de la lista el control no existir�
  if(!isset($Valores['categorias']))
    // por lo que creamos el valor vac�o
    $Valores['categorias'] = array();

  // si se quiere publicidad
  if($Valores['publicidad'] == 's�' &&
     // pero no se ha marcado ning�n tema
     count($Valores['categorias']) == 0)
    echo // lo comunicamos
     '<p style="color: red">Debe seleccionar '.
     'al menos un tema de inter�s<p>';
  else {
    // Guardamos los datos en la sesi�n
    $_SESSION['Valores'] = $Valores;
    // y redirigimos a la p�gina de confirmaci�n
    header('Location: Confirmacion.php');
  }
}
else // en caso contrario
  // preparamos una matriz con valores
  // por defecto
  $Valores = array_combine(
   array('correo','comentario','publicidad',
         'formato', 'categorias'),
   array('cuenta@dominio.com','Comentarios',
         's�', 'HTML', array()));

// A continuaci�n componemos el formulario con
// los valores que correspondan

ob_end_flush();
?>

<p>
<form action="Suscripcion.php"
      method="post">
<div style="float: left; padding-right: 0.5em;
     margin-right: 0.5em; border-right:
     1px dotted black">
 <p>Correo electr�nico: <input size="20"
    title="Introduzca su direcci�n de
    correo electr�nico"
    maxlength="50"  value=
    <?php echo "'{$Valores['correo']}'" ?>
    name="correo" id="correo" />
 </p>
 <p>
  <textarea cols="40" rows="10"
    id="comentario" name="comentario">
<?php echo $Valores['comentario']; ?>
  </textarea>
 </p>
</div>
<p>
 <input type="checkbox"
   id="publicidad" name="publicidad"
   <?php
     // Si estaba marcada
     if($Valores['publicidad'] == 's�')
      // que aparezca marcada
      echo 'checked="checked"';
   ?>
   value="s�"
   title="Desmarque esta opci�n si no
          quiere publicidad" />
   Recibir informaci�n publicitaria de Anaya
</p>

<p>
 Recibir la publicidad en formato<br />
 <input type="radio" name="formato"
  <?php
    // Marcar el bot�n de radio apropiado
    if($Valores['formato'] == 'HTML')
     // seg�n el elemento formato
     echo 'checked="checked"';
  ?>
  id="html" value="HTML" />
 HTML
 <input type="radio" name="formato"
  <?php
    // Marcar el bot�n de radio apropiado
    if($Valores['formato'] == 'texto')
     // seg�n el elemento formato
     echo 'checked="checked"';
  ?>
  id="texto" value="texto" />
 S�lo texto
 <input type="radio" name="formato"
  <?php
    // Marcar el bot�n de radio apropiado
    if($Valores['formato'] == 'pdf')
     // seg�n el elemento formato
     echo 'checked="checked"';
  ?>
  id="pdf" value="pdf" />
 PDF
</p>

<p>
Elija los temas que le interesan<br />
<select id="categorias" name="categorias[]"
 multiple="multiple" size="5">
 <option value="DisWeb"
  <?php
  if(in_array('DisWeb',$Valores['categorias']))
   echo 'selected="selected"';
  ?> >Dise�o web</option>
 <option value="Ofimatica"
  <?php
  if(in_array('Ofimatica',
       $Valores['categorias']))
   echo 'selected="selected"';
  ?> >Ofim�tica</option>
 <option value="Prog"
  <?php
  if(in_array('Prog',$Valores['categorias']))
   echo 'selected="selected"';
 ?> >Programaci�n</option>
 <option value="Grafico"
  <?php
  if(in_array('Grafico',$Valores['categorias']))
   echo 'selected="selected"';
 ?> >Dise�o gr�fico</option>
</select>
</p>

<p style="clear: left">
<button type="submit">Suscribirse</button>
<button type="reset">Reiniciar</button>
</p>
</form>

</body>
</html>