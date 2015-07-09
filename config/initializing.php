<?php

/****************
 * Initializing *
 ****************/

// Pass session data over.
//session_start();
 
// Include the required dependencies.
require_once( 'vendor/autoload.php' );

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\GraphUser;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;
use Facebook\Facebook;

FacebookSession::enableAppSecretProof(false);     												// [ very important ]
 
// For apps using Facebook Canvas
// use Facebook\FacebookCanvasLoginHelper;
 
// For apps using the JavaScript SDK
// use Facebook\FacebookJavaScriptLoginHelper;
 
// Initialize the Facebook SDK.
//FacebookSession::setDefaultApplication( 'YOUR_APP_ID', 'YOUR_APP_SECRET' );					//[ EXAMPLE ]
FacebookSession::setDefaultApplication( $appId, $app_secret );

//$helper = new FacebookRedirectLoginHelper('http://your-app-domain/project/');					//[ EXAMPLE ]
$helper = new FacebookRedirectLoginHelper($redirectURL);
