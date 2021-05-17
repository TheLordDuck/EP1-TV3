<!DOCTYPE html PUBLIC
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Variables</title>
  <meta http-equiv="Content-type"
      content="text/html;charset=ISO-8859-1" />
</head>
<body>
  <p>
  <?php
     $Horas = 24;
     $Minutos = 60;
     $Mensaje = "Minutos que tiene un día: ";

     echo $Mensaje.$Horas*$Minutos;
  ?>
  </p>
</body>
</html>
|