<?php
require 'src/facebook.php';
$fb = new Facebook(array(
  'appId'  => '254497688025051',
  'secret' => '532bc77efe3324b3472364f03e504580',
  'default_graph_version' => 'v2.2',
));

//$helper = $fb->getRedirectLoginHelper();
$helper=$fb->getUser();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>