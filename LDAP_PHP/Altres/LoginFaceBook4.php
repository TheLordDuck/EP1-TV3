<?php
require 'src/facebook.php';


// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '254497688025051',
  'secret' => '532bc77efe3324b3472364f03e504580',
));

$user = $facebook->getUser();

$photo_details = array('message' => 'my place');
$file='photos/my.jpg'; //Example image file
$photo_details['image'] = '@' . realpath($file);

if ($user) {
  try {
    // We have a valid FB session, so we can use 'me'
    $upload_photo = $facebook->api('/me/photos', 'post', $photo_details);
  } catch (FacebookApiException $e) {
    error_log($e);
  }
}


// login or logout url will be needed depending on current user state.
if ($user) {
  //$logoutUrl = $facebook->getLogoutUrl();
} else {
// redirect to Facebook login to get a fresh user access_token
  $loginUrl = $facebook->getLoginUrl();
  $loginUrl="http://exemples.ua.ad/";
  //$loginUrl="http://exemples.ua.ad/Miki/B3M5/testOauth1.php";
  header('Location: ' . $loginUrl);
}
?>