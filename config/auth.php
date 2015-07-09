<?php

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
        $session = new FacebookSession( $access_token );                                                // enable this to use the extended token

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
    echo 'Successfully logged in!'."<br />";
} else {
 
    // Generate the login URL for Facebook authentication.
    $loginUrl = $helper->getLoginUrl();
    echo '<a href="' . $loginUrl . '">Login</a><br />';
}
