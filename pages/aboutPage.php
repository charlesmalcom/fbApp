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
    $session, 'GET', '/'.$config['profile_id']
  );

	$response = $request->execute();
	$graphObject = $response->getGraphObject();

    echo "<label class='labelCol1'>Item</label> <label class='labelCol2'>Value</label> <br />";

    foreach ($pageDetails as $key => $value) { 

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
