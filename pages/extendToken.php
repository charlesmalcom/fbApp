<?php

use Facebook\FacebookRedirectLoginHelper;

    if (isset($session)){
    $accessToken = $session->getAccessToken();
    $longLivedAccessToken = $accessToken->extend();
    //$longLivedAccessToken = $config['access_token']->extend();
    echo "Replace the access_token with this..<br />";
    echo (string) $longLivedAccessToken;

    /*
    $longLivedAccessToken = new AccessToken('{long-lived-access-token}');
    $code = AccessToken::getCodeFromAccessToken($longLivedAccessToken);
    $newLongLivedAccessToken = AccessToken::getAccessTokenFromCode($config['access_token']);
    */
    //print_r($newLongLivedAccessToken);


}
//http://stackoverflow.com/questions/25322424/facebook-php-sdk-4-0-getting-long-term-access-token
