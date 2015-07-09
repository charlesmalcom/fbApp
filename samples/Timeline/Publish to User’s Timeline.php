<?php

/******************************
 * Publish to User’s Timeline *
 ******************************/
// Publish to User’s Timeline
$request = ( new FacebookRequest( $session, 'POST', '/me/feed', array(
  'message' => 'I love articles on benmarshall.me!'
) ) )->execute();
  
// Get response as an array, returns ID of post
$response = $request->getGraphObject()->asArray();
//echo $response[id];																			//echo ID of this post
 
print_r( $response );
echo "<br />";
echo "<hr />";
 
// Graph API to publish to timeline with additional parameters
$request = ( new FacebookRequest( $session, 'POST', '/me/feed', array(
    'name' => 'Facebook SDK PHP v4 — a complete guide!',
    'caption' => 'Learn how to easily use the Facebook SDK PHP v4 library.',
    'link' => 'http://www.benmarshall.me/facebook-sdk-php-v4',
    'message' => 'Check out how to integrate Facebook with your website.'
) ) )->execute();
 
// Get response as an array, returns ID of post
$response = $request->getGraphObject()->asArray();
 
print_r( $response );
echo "<br />";
echo "<hr />";