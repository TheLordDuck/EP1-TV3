<?php
session_start();

// Incluimos el PHP SDK v.3.0.0 de Facebook    
require 'src/facebook.php';

// Creamos un nuevo objeto con los datos de nuestra aplicación (cambia los datos por los de tu App ID y tu App Secret).
$facebook = new Facebook(array(
  'appId'  => '254497688025051',
  'secret' => '532bc77efe3324b3472364f03e504580',
));
echo "Desde Facebook : ".$facebook;
// Obtener el ID del Usuario
$user = $facebook->getUser();
$_SESSION['usuari']=$user;
echo "Usuari : ".$user;

// Podemos obtener o no este dato dependiendo de si el usuario se ha identificado en Facebook o no
//

if ($user) {
  try {
    // Procedemos a saber si tenemos a un usuario que se ha identificado en Facebook que está autentificado.
    // Si hay algún error se guarda en un archivo de texto (error_log)
    $user_profile = $facebook->api('/me');
	$_SESSION['up']=$user_profile;
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}
// La url de Login o Logout dependerá del estado actual del usuario, si está autentificado o no en nuestra aplicación
// Aquí obtenemos los permisos del usuario. Por defecto obtenemos una serie de permisos básicos
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
  echo "LogoutURL :".$logoutUrl;
} else {
  $loginUrl = $facebook->getLoginUrl();
}
if (!$user) {
        echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
        exit;
    }
	
	    // Sustituid esto por la que sea la Canvas Page de vuestra aplicación
    //$appBaseUrl =   "http://apps.facebook.com/demo-nueva-version/";
	$appBaseUrl =   "http://exemples.ua.ad/B3M5/TestOauth2.php";
  /* 
     * Facebook dirige al usuario a la Canvas URL  tras autentificarlo
     * Comprobamos si nos ha devuelto un $_GET['code']
     * para redirigirlo en su lugar a la Canvas Page
     */
    if (isset($_GET['code'])){
        header("Location: " . $appBaseUrl);
        exit;
    }
?>	