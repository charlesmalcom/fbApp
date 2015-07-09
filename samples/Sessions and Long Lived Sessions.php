<?php

/************************************
 * Sessions and Long Lived Sessions *
 ************************************/
// User logged in, get the AccessToken entity.
//$access_token = $session->getAccessToken();
//echo 'accessToken... '.$access_token.'<br />';

// Exchange the short-lived token for a long-lived token.
//$longLivedAccessToken = $access_token->extend();
//echo 'longLivedAccessToken... '.$longLivedAccessToken.'<br />';

// Now store the long-lived token in the database
// . . . $db->store($longLivedAccessToken);

// Make calls to Graph with the long-lived token.
// . . . 
//$session = new FacebookSession( $longLivedAccessToken );