<?php

  use Facebook\FacebookSession;
  use Facebook\FacebookRequest;
  use Facebook\FacebookRedirectLoginHelper;
  use Facebook\GraphUser;
  use Facebook\GraphObject;
  use Facebook\FacebookRequestException;
  use Facebook\Facebook;

/*
 * Get Type
 ***********/
$type = $url['1'];

	/*
	 * Define Forms Here
	 ********************/
	$appForms = array();
	$appForms['link']=" 
	    <h3>Update a message</h3>
	    <h5>$url[2]</h5>

	    <h2>You can't update a link</h2>
	";

	$appForms['photo']="
	    <h3>Update an Image</h3>
	    <h5>$url[2]</h5>
		<label for='message'>Message</label>    <input type='text' name='message'><br />
	    <label>&nbsp</label>   				 	<input type='submit' value='Upload'><br />
	                            				<input type='hidden' name='posted' value='yes'>
	";

	$appForms['video']="
	<h3>Update a Video</h3>
	    <h5>$url[2]</h5>
	    <label for='name'>Name</label>    				<input type='text' name='name'><br />
	    <label for='description'>Description</label> 	<input type='text' name='description'><br />
	    <label for='tags'>Tags</label>  				<input type='text' name='tags'><br />
	    <label>&nbsp</label>   							<input type='submit' value='Upload'>
	                          							<input type='hidden' name='posted' value='yes'>
	";

	$appForms['status']="
	<h3>Update a Post</h3>
	    <h5>$url[2]</h5>
	    <label for='message'>Message</label>    		<input type='text' name='message'><br />
	    <label>&nbsp</label>   							<input type='submit' value='Upload'>
	                          							<input type='hidden' name='posted' value='yes'>
	";

	/*
	 * start form & posting code
	 ****************************/
	if(isset($_GET['posted'])){                                 //[ PROCESS AND PUBLISH TO FACEBOOK ]

	//status
	$message 		= isset ($_GET['message']) 	? $_GET['message'] 		: null;

	//photos
	$name 			= isset ($_GET['name']) 	? $_GET['name'] 		: null;
	$tags 			= isset ($_GET['tags']) 	? $_GET['tags'] 		: null;

	//videos
	//name
	//tags
	$description 	= isset ($_GET['	']) 	? $_GET['description'] 	: null;

	//common
	$item_id 		= isset ($url['2']) 		? $url['2'] 			: null;
	$posted 		= isset ($_GET['posted']) 	? $_GET['posted'] 		: null;

	/*
	 * Type Logic
	 *************/

if (isset($session)){

	/************* STATUS *************/
	if ($type == 'status'){  
		echo "<h3>Updating a Status</h3>";
		echo "<h5>".$item_id."</h5>";

	     try {
		    $response = (new FacebookRequest(
			$session, 
			'POST',	'/'.$item_id,											// Exception occured, code: 200 with message: (#200) User does not have permission to edit this object
			    array(
			      'message' => $message
			    )
		    ))->execute()->getGraphObject();

	    echo "Posted with id: " . $response->getProperty('id'). "<br />";
	    echo "<a href='".$baseUrl."posts'>Return to Posts</a><br />";
	    } catch (FacebookRequestException $e) {
	      echo "Exception occured, code: " . $e->getCode();
	      echo " with message: " . $e->getMessage();
	      echo "<br />";
	  } catch (\Exception $e) {
	    // Some other error occurred
	    echo "there was another problem.<br />";
	}

	}
	/************* STATUS *************/


	/************* LINK *************/
	if ($type == 'link'){  
		echo"<h3>You can't update a Link</h3>";
	}
	/************* LINK *************/


	/************* IMAGE *************/
	else if ($type == 'photo'){  
		echo"<h3>Updating a Photo</h3>";
		echo "<h5>".$item_id."</h5>";

	     try {
		    $response = (new FacebookRequest(
		      $session, 
		      'POST',	'/'.$item_id,
		      		array(
		      			//'name' 			=> $name,					//Video title or caption.
		      			//'tags' 			=> $tags					//Users tagged in the video.
		      			'message' => $message,
				        //'message' => $message,					//idk about this
				      )
		    ))->execute()->getGraphObject();

	    echo "Posted with id: " . $response->getProperty('id'). "<br />";
	    echo "<a href='".$baseUrl."posts'>Return to Posts</a><br />";
	    } catch (FacebookRequestException $e) {
	      echo "Exception occured, code: " . $e->getCode();
	      echo " with message: " . $e->getMessage();
	      echo "<br />";
	  } catch (\Exception $e) {
	    // Some other error occurred
	    echo "there was another problem.<br />";
	  } 

	}
	/************* IMAGE *************/


	/************* VIDEO *************/
	else if ($type == 'video'){  
		echo"<h3>Updating a Video</h3>";
		echo "<h5>".$item_id."</h5>";

	     try {
		    $response = (new FacebookRequest(
			$session,
			'POST',	'/'.$item_id,
			    array (
				    'name' 			=> $name,					//Video title or caption.
				    'description' 	=> $message,				//Description of the video.
				    'tags' 			=> $tags					//Users tagged in the video.
			    )
		    ))->execute()->getGraphObject();

	    echo "Posted with id: " . $response->getProperty('id'). "<br />";
	    echo "<a href='".$baseUrl."posts'>Return to Posts</a><br />";
	    } catch (FacebookRequestException $e) {
	      echo "Exception occured, code: " . $e->getCode();
	      echo " with message: " . $e->getMessage();
	      echo "<br />";
	  } catch (\Exception $e) {
	    // Some other error occurred
	    echo "there was another problem.<br />";
	}

	}
	/************* VIDEO *************/

  } //isset --> END

 } else{                                                    //[ SHOW FORM ]
    echo"<form class='formDefault center'>".$appForms[$type]."</form>";
   }

echo "end of page<br />";
