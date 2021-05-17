<?PHP session_start(); ?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>php-sdk 3.0.0</title>
        <style typ="text/css">
            html, body { width: 520px;}
        </style>    
  </head>
  <body>
    <h1>php-sdk</h1>

    <h3>PHP Session</h3>

      <?php 
			//$texte=$_SESSION('usuari');
			echo "<p>Usuari : " .$_SESSION['usuari']. "</p>";
			foreach($_SESSION as $key=>$value){
          echo '<strong>' . $key . '</strong> => ' . $value . '<br />';
      }
      ?>
      <h3>Tu</h3>
      <img src="https://graph.facebook.com/<?php echo $_SESSION['usuariG']; ?>/picture">

      <h3>Tus datos (/me)</h3>
      <?php foreach($_SESSION['up'] as $key=>$value){
          echo '<strong>' . $key . '</strong> => ' . $value . '<br />';
      }
      ?>
  </body>
</html>