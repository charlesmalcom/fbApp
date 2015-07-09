<?php

use Facebook\FacebookRequest;

/******************************
 * Get User’s Profile Picture *
 ******************************/
if (isset($session)){
    echo"<h3> Get Users Profile Picture </h3>";
    // Get User’s Profile Picture
    $request = ( new FacebookRequest( $session, 'GET', '/'.$config['profile_id'].'/picture?type=large&redirect=false' ) )->execute();
     
    // Get response as an array
    $picture = $request->getGraphObject()->asArray();
     
    print_r( $picture );
    echo "<a href='$picture[url]' target='newWindow'>Picture</a>";
    echo "<br />";
    echo "<hr />";
}