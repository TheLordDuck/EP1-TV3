<?php
/**
 * Test de validaci� d'usuari mitjan�ant FaceBook
 * Cal gestionar-ho des de https://developers.facebook.com
 * AppId : Codi d'applicaci�
 * Secret : Password
 * En la gesti�, cal identificar els dominis v�lidesa per la nostra applicaci�
 */

require 'src/facebook.php';

// Codis donats per Facebook (en Gesti�).
$facebook = new Facebook(array(
  'appId'  => '254497688025051',
  'secret' => '532bc77efe3324b3472364f03e504580',
));

// Anar al User ID per si ja hem entrat
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

//Cas d'haver entrat, 
if ($user) {
  try {
    // Cas d'usuari autenticat i connectat, recollir perfil.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Depenent si hem entrat o no a Facebook, preparar els enlla�os logout o login.
if ($user) {
  //Enlla� per desconnectar
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  //Enlla� per fer login
  $loginUrl = $facebook->getLoginUrl();
}

// Dades p�bliques (sempre hi s�n).
$meu_usuari = $facebook->api('/me');

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Validaci� v�a FaceBook</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <h1>Visualitzar Dades validaci� Facebook</h1>
    <!-- En cas de disposar de user logat, presentar la possibilitat de desconectar -->
    <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
	<!-- En cas de no haver fet login, presentar (enlla�) la possibilitat de fer-ho -->
      <div>
        Login mitjan�ant OAuth 2.0 i recuperat via PHP SDK:
        <a href="<?php echo $loginUrl; ?>">Login amb Facebook</a>
      </div>
    <?php endif ?>

    <h3>PHP Session (Dades actuals de la Sessi�)</h3>
    <pre><?php print_r($_SESSION); ?></pre>
	<!-- En cas de disposar de user logat, presentar les seves dades i informaci� del seu perfil-->
    <?php if ($user): ?>
      <h3>Tu mateix</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

      <h3>El teu user perfil (/me)</h3>
      <pre><?php print_r($user_profile); ?></pre>
    <?php else: ?>
      <strong><em>No estas conectat</em></strong>
    <?php endif ?>

    <h3>Public profile de l'usuari</h3>
    <!--
	<img src="https://graph.facebook.com/miquel.viladrich.3/picture">
    -->
	<img src="https://graph.facebook.com/<?php echo $user; ?>/picture">
	<?php echo $meu_usuari['name']; ?>
  </body>
</html>
