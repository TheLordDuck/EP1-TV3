<?php
require_once('includes/Oauth.php');
require_once('includes/Facebook.php');

session_start();

$app_id = '254497688025051';
$app_secret = '532bc77efe3324b3472364f03e504580';
$callback = 'http://exemples.ua.ad/B3M5/TestOauth2a.php'; // [DOMAIN]/auth/facebook.php in this example

$facebook = new Facebook($app_id, $app_secret, $callback);
if($facebook->validateAccessToken()){
        $response = $facebook->makeRequest('https://graph.facebook.com/me');
        print_r($response);
}