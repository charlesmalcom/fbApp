<?php 
//http://metah.ch/blog/2014/05/facebook-sdk-4-0-0-for-php-a-working-sample-to-manage-sessions/


session_start();
 
require_once( 'Facebook/FacebookSession.php' );
require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'Facebook/FacebookRequest.php' );
require_once( 'Facebook/FacebookResponse.php' );
require_once( 'Facebook/FacebookSDKException.php' );
require_once( 'Facebook/FacebookRequestException.php' );
require_once( 'Facebook/FacebookAuthorizationException.php' );
require_once( 'Facebook/GraphObject.php' );
require_once( 'Facebook/GraphSessionInfo.php' );
 
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;
 
$appid = ''; // your AppID
$secret = ''; // your secret
 
// Initialize app with app id (APPID) and secret (SECRET)
FacebookSession::setDefaultApplication($appid ,$secret);
 
// login helper with redirect_uri
$helper = new FacebookRedirectLoginHelper( 'http://www.metah.ch/' );
 
 
try
{
  // In case it comes from a redirect login helper
  $session = $helper->getSessionFromRedirect();
} 
catch( FacebookRequestException $ex ) 
{
  // When Facebook returns an error
  echo $ex;
} 
catch( Exception $ex ) 
{
  // When validation fails or other local issues
  echo $ex;
}
 
// see if we have a session in $_Session[]
if( isset($_SESSION['token']))
{
    // We have a token, is it valid? 
    $session = new FacebookSession($_SESSION['token']); 
    try
    {
        $session->Validate($appid ,$secret);
    }
    catch( FacebookAuthorizationException $ex)
    {
        // Session is not valid any more, get a new one.
        $session ='';
    }
}
 

// see if we have a session
if ( isset( $session ) ) 
{   
    // set the PHP Session 'token' to the current session token
    $_SESSION['token'] = $session->getToken();
    // SessionInfo 
    $info = $session->getSessionInfo();  
    // getAppId
    echo "Appid: " . $info->getAppId() . "<br />"; 
    // session expire data
    $expireDate = $info->getExpiresAt()->format('Y-m-d H:i:s');
    echo 'Session expire time: ' . $expireDate . "<br />"; 
    // session token
    echo 'Session Token: ' . $session->getToken() . "<br />"; 
} 
else
{
  // show login url
  echo '<a href="' . $helper->getLoginUrl() . '">Login</a>';
}
?>