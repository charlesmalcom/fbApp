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
    /*
  	$request = new FacebookRequest(
      $session, 'GET', '/me/permissions'
    );
    
  	$response = $request->execute();
    $graphObject = $response->getGraphObject();
    */

  //$pagefeed     = $facebook->api("/" . $config['profile_id'] . "/permissions");
  $pagefeed     = $facebook->api("/me/permissions");


  // set counter to 0, because we only want to display 10 posts
  $i = 0;
  foreach($pagefeed['data'] as $post) {

    // open up an fb-update div
    echo "<div class='postItem'>";
      echo "<div class='fb-update'>";

        echo "<p><label><span id='black'>".$post['permission']."</span></label> ".$post['status']."</p>";

        echo "</div>"; // close fb-update div
      echo"</div>";

  $i++; // add 1 to the counter

  }


    } catch (FacebookRequestException $e) {
        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();
    } catch (\Exception $e) {
      // Some other error occurred
    }

}
