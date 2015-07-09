<?php

/****************
 * Initializing *
 ****************/

// Pass session data over.
session_start();
 
// Include the required dependencies.
require_once( 'vendor/autoload.php' );

//use Facebook\facebook;
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\GraphUser;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;

FacebookSession::enableAppSecretProof(false);     												// [ very important ]
 
// For apps using Facebook Canvas
// use Facebook\FacebookCanvasLoginHelper;
 
// For apps using the JavaScript SDK
// use Facebook\FacebookJavaScriptLoginHelper;
 
// Initialize the Facebook SDK.
//FacebookSession::setDefaultApplication( 'YOUR_APP_ID', 'YOUR_APP_SECRET' );					//[ EXAMPLE ]
FacebookSession::setDefaultApplication( $config['app_id'], $config['app_secret'] );

//$helper = new FacebookRedirectLoginHelper('http://your-app-domain/project/');					//[ EXAMPLE ]
$helper = new FacebookRedirectLoginHelper($redirectURL);


/**********************************
 * Authentication & Authorization *
 **********************************/

try {
    if ( isset( $_SESSION['access_token'] ) ) {
        // Check if an access token has already been set.
        $session = new FacebookSession( $_SESSION['access_token'] );
        
        //current access token
        //$access_token    = $_SESSION['access_token'];

        //optional
        //$session = new FacebookSession( &#x27;access token here&#x27; );                              //[ EXAMPLE ]
        //$session = new FacebookSession( $access_token );                                              // enable this to use the extended token
        //$session = new FacebookSession( $config['extended_token'] );                                    // enable this to use the extended token

    } else {
        // Get access token from the code parameter in the URL.
        $session = $helper->getSessionFromRedirect();
    }
} catch( FacebookRequestException $ex ) {
 
    // When Facebook returns an error.
    print_r( $ex );
} catch( \Exception $ex ) {
 
    // When validation fails or other local issues.
    print_r( $ex );
}
if ( isset( $session ) ) {
 
    // Retrieve & store the access token in a session.
    $_SESSION['access_token'] = $session->getToken();
    // Logged in
    //echo 'Successfully logged in!'."<br />";                          // if you are signed in, you'll know it
} else {
 
    // Generate the login URL for Facebook authentication.
    $loginUrl = $helper->getLoginUrl($params);
    //echo '<a href="' . $loginUrl . '">Login</a><br />';               // [ this is showed in the nav bar ]
}


// connect to app
$fb_config = array();
$fb_config['appId'] = $config['app_id'];
$fb_config['secret'] = $config['app_secret'];
$fb_config['fileUpload'] = false; // optional


// instantiate
$facebook = new Facebook($fb_config);
//$facebook = new Facebook(array('appId' => $facebook_appid,'secret' => $facebook_app_secret,));
