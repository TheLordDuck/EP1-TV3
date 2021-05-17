<html>

<head>
  <title>Variables</title>
</head>

<body>
  <p>
  <?php
     $Fecha = array('Año' => 1967, 'Mes' => 5);
     $Horas = 24;
     $Minutos = 60;
     $Mensaje = " Minutos que tiene un día: ";

     print_r($Fecha);
     echo $Mensaje.$Horas*$Minutos;
  ?>
  </p>

</body>

</html>