<?php

use Facebook\FacebookRequest;

/*********
 * Usage *
 *********/
if (isset($session)){

    echo"<h3> Usage </h3>";
    // Retrieve User’s Profile Information
    $request = ( new FacebookRequest( $session, 'GET', '/'.$config['profile_id'] ) )->execute();
     
    // Get response as an array
    $user = $request->getGraphObject()->asArray();
    echo $user['id']."<br />";
     
    print_r( $user );
    echo "<br />";
    echo "<hr />";

}