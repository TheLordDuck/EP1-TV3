<!DOCTYPE html PUBLIC 
  "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Referencias</title>
  <meta http-equiv="Content-type" 
      content="text/html;charset=ISO-8859-1" />
</head>
<body>
  <h1>Referencias</h1>
  <p>
<?php
$Numero1 = 10;
$Numero2 = &$Numero1;

echo "Numero1=$Numero1, Numero2=$Numero2<br />";
$Numero2 = 15;
echo "Numero1=$Numero1, Numero2=$Numero2<br />";
$Numero2 = NULL;
echo "Numero1=$Numero1, Numero2=$Numero2<br />";
?>
 </p>
</body>
</html>