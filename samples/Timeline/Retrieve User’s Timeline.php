<?php

/****************************
 * Retrieve User’s Timeline *
 ****************************/
// Retrieve User’s Timeline
$request = ( new FacebookRequest( $session, 'POST', '/me/feed' ) )->execute();
  
// Get response as an array
$response = $request->getGraphObject()->asArray();
 
print_r( $response );
echo "<br />";
echo "<hr />";