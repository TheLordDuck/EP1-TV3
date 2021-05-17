<?php

require 'src/facebook.php';
// Codis donats per Facebook .
$facebook = new Facebook(array(
  'appId'  => '254497688025051',
  'secret' => '532bc77efe3324b3472364f03e504580',
));

// Get User ID
$user = $facebook->getUser();

if ($user) {
    try {
        $user_profile = $facebook->api('/me');
    } catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
    }
}

if ($user) {
    $logoutUrl = $facebook->getLogoutUrl();
} else {
    $loginUrl = $facebook->getLoginUrl();
}

$larry = $facebook->api('/me');

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <title>Facebook Login with OAuth 2.0 - SocialBlocks</title>

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
        <h1>SocialBlocks: Facebook Login with OAuth 2.0</h1>
        
        <?php if ($user): ?>
            <a href="<?php echo $logoutUrl; ?>">Logout</a>
        <?php else: ?>
            <div>
                Login using OAuth 2.0 handled by the PHP SDK:
                <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
            </div>
        <?php endif ?>
        
        <h3>PHP Session</h3>
        <pre><?php print_r($_SESSION); ?></pre>
        
        <?php if ($user): ?>
            <h3>You</h3>
            <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">
        
            <h3>Your User Object (/me)</h3>
            <pre><?php print_r($user_profile); ?></pre>
        <?php else: ?>
            <strong><em>You are not Connected.</em></strong>
        <?php endif ?>
        
        <h3>Public profile of Larry</h3>
        <img src="https://graph.facebook.com/larryrubin/picture">
        <?php echo $larry['name']; ?>
    </body>
</html>
