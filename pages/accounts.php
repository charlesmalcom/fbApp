<?php

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\GraphUser;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;
use Facebook\Facebook;


if (isset($session)){
    echo"<h3>My Information</h3>";

   try {
	$request = new FacebookRequest(
	  $session,
	  //'GET', '/me/accounts',
    //'GET', '/'.$config['profile_id'].'/accounts',
    'GET', '/1638438745/accounts',
      array(
        'access_token' => $config['access_token']
        )
);
	$response = $request->execute();
	$graphObject = $response->getGraphObject();

  echo "<pre>";
  print_r($graphObject);
  echo "</pre><br /><hr />";

    } catch (FacebookRequestException $e) {
        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();
    } catch (\Exception $e) {
      // Some other error occurred
    }

}
