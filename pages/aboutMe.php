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
	  'GET',
      //'/me/picture?type=large&redirect=false'         // [ ACTUAL ]
      //'/'.$config['profile_id']                                             // [ ACTUAL ]
      '/me'
);
	$response = $request->execute();
	$graphObject = $response->getGraphObject();

  // Get response as an array
  //$Post_Link_Video = $request->getGraphObject()->asArray();
  //$picture = $request->getGraphObject()->asArray();
  //print_r($graphObject);
  //echo "<pre>"; print_r($graphObject); echo"</pre>";

  echo "<label class='labelCol1'>Item</label> <label class='labelCol2'>Value</label> <br />";

    foreach ($userDetails as $key => $value) { 

      if($graphObject->getProperty($value) == NULL){ $fbValue = '&nbsp;'; }
      else { $fbValue = $graphObject->getProperty($value); }

      echo "<label class='labelCol1'>$value</label> <label class='labelCol2'>".$fbValue."</label> <br />";
      //echo "Item: $key; Value: $value<br />\n";
    }

  echo "<br />";
  echo "<hr />";    


    } catch (FacebookRequestException $e) {
        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();
    } catch (\Exception $e) {
      // Some other error occurred
    }

}
