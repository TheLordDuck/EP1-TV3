<?php
require 'src/facebook.php';
session_start();
//unset($_SESSION['usuari']);  
//session_unset($_SESSION['usuari']);
echo($_SESSION['usuari']);
// Codis donats per Facebook .
$facebook = new Facebook(array(
  'appId'  => '254497688025051',
  'secret' => '532bc77efe3324b3472364f03e504580',
));

$user = $facebook->getUser();
$_SESSION['usuariG']=$user;

$photo_details = array('message' => 'my place');
$file='photos/my.jpg'; //Example image file
$photo_details['image'] = '@' . realpath($file);

if ($user) {
  try {
    // Sessió vàlida, podem usar /me
	
    
	$user_profile = $facebook->api('/me');	
	$upload_photo = $facebook->api('/me/photos', 'post', $photo_details);
	//$_SESSION["usuari"]=$user_profile['name'];
	
  } catch (FacebookApiException $e) {
    error_log($e);
  }
}
// Depenent de l'estat, donem la possibilitat de fer LoginIn o LogOut.
if ($user) {
  // Adreça URL de desconnexió de Facebook
  // Com a paràmetre (next), pàgina de redirecció després del Logout
  session_unset($_SESSION['usuari']);  
  //session_destroy();
  $logoutUrl = $facebook->getLogoutUrl(
    array(
        'next' => 'http://exemples.ua.ad/Miki/B3M5/testOauth1.php'
    )
);
  
} else {
	
// Adreça de Facebook per demanar dades (login i pwd)i obtenir access_token
// Pot ser una pàgina nostra preparada per demanar les dades :-)
  //unset($_SESSION['usuari']);  
  $loginUrl = $facebook->getLoginUrl();
//Redirecció a entrada login PWD de Facebook (Pots crear tu la pantalla)
$loginUrl="http://exemples.ua.ad/"; 
$loginUrl="http://exemples.ua.ad/Miki/B3M5/testOauth1.php";
  header('Location: ' . $loginUrl);
}
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
  <title>Validació vía FaceBook</title>
  </head>
  <body>
	<?php if ($user) { ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php } ?>
	<?php if ($user) { $_SESSION['usuari']=$user_profile['name']; ?>
    
	 <h3>Tu mateix</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

      <h3>El teu user perfil (/me)</h3>
      <pre><?php print_r($user_profile); print_r($_SESSION['usuari']);?></pre>
    <?php } else { ?>
      <strong><em>No estas conectat</em></strong>
    <?php } ?>
	</body>