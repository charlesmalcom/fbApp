<?php

include 'pageNav.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\GraphUser;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;
use Facebook\Facebook;


/*
 * List all videos
 ******************/
if (isset($session)){
    echo"<h3>My Videos</h3>";

   try {
	$request = new FacebookRequest(
	  $session,
	  'GET',
      //'/me/picture?type=large&redirect=false'         // [ ACTUAL ]
      '/me/videos'                                             // [ ACTUAL ]
		//array( 'fields' => 'videos' )

);
	$response = $request->execute();
	$graphObject = $response->getGraphObject();

    $data_array = $response->getGraphObject()->asArray();

    $counter = array_map("count", $data_array);
    $count = count($counter);
    echo "Attending: $count<BR>";


    for ($x = 0; $x <= $count; $x++)
        {
        //$names[$x] = $data_array['data'][$x]->name;
        //$ids[$x] = $data_array['data'][$x]->id;
        	//echo $data_array['id']."<br />";
        	//echo $data_array['created_time']."<br />";
        	
        }

   echo "<hr />";
   echo "<PRE>";
   print_r($data_array);
   echo "</PRE>";

	


  // Get response as an array
  //$Post_Link_Video = $request->getGraphObject()->asArray();
  //$picture = $request->getGraphObject()->asArray();
  //print_r($graphObject);
  //echo "<pre>"; print_r($graphObject); echo"</pre>";

/*
  echo "<label class='labelCol1'>Item</label> <label class='labelCol2'>Value</label> <br />";

    foreach ($videoDetails as $key => $value) { 
    	

      if($graphObject->getProperty($value) == NULL){ $fbValue = '&nbsp;'; }
      else { $fbValue = $graphObject->getProperty($value); }

      echo "<label class='labelCol1'>$value</label> <label class='labelCol2'>".$fbValue."</label> <br />";
      //echo "Item: $key; Value: $value<br />\n";
    }

  echo "<br />";
  echo "<hr />";    

*/
    } catch (FacebookRequestException $e) {
        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();
    } catch (\Exception $e) {
      // Some other error occurred
    }

}

