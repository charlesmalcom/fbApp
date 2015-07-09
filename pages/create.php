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
	//$appForms = array();
	$appForms['link']=" 
	    <h3>Upload a message</h3>
	    <label for='message'>Link</label>  		<input type='text' name='link'><br />
	    <label for='message'>Message</label>  	<input type='text' name='message'><br />
	    <label>&nbsp</label>   				 	<input type='submit' value='Upload'><br />
	                            				<input type='hidden' name='posted' value='yes'>
	";

	$appForms['photo']="
	    <h3>Upload an Image</h3>
	    <label for='image'>Image</label>    	<input type='file' name='image'><br />
	    <label for='message'>Caption</label>  	<input type='text' name='message'><br />
	    <label>&nbsp</label>   				 	<input type='submit' value='Upload'><br />
	                            				<input type='hidden' name='posted' value='yes'>
	";

	$appForms['video']="
	<h3>Upload a Video</h3>
	    <label for='video'>Video</label>   		<input type='file' name='video'><br />
	    <label for='message'>Caption</label>  	<input type='text' name='message'><br />
	    <label>&nbsp</label>   					<input type='submit' value='Upload'>
	                          					<input type='hidden' name='posted' value='yes'>
	";

	$appForms['status']="
	<h3>Upload a Post</h3>
	    <label for='message'>Message</label>  	<textarea name='message' placeholder='Type your message in here.'></textarea><br />
	    <label>&nbsp</label>   					<input type='submit' value='Upload'>
	                          					<input type='hidden' name='posted' value='yes'>
	";

	/*
	 * start form & posting code
	 ****************************/
	if(isset($_GET['posted'])){                                 //[ PROCESS AND PUBLISH TO FACEBOOK ]

	//status
	$post 			= isset ($_GET['post']) 	? $_GET['post'] 		: null;

	//links
	$link 			= isset ($_GET['link']) 	? $_GET['link'] 		: null;
	$message 		= isset ($_GET['message']) 	? $_GET['message'] 		: null;

	//photos
	$image 			= isset ($_GET['image']) 	? $_GET['image'] 		: null;
	//message
	$name 			= isset ($_GET['name']) 	? $_GET['name'] 		: null;
	$tags 			= isset ($_GET['tags']) 	? $_GET['tags'] 		: null;

	//videos
	$video 			= isset ($_GET['video']) 	? $_GET['video'] 		: null;
	//message
	//name - maybe add in future
	//tags - maybe add in future


	/*
	 * Type Logic
	 *************/

if (isset($session)){

	/************* STATUS *************/
	if ($type == 'status'){  
		echo"<h3>Posting a Post</h3>";

	     try {
		    $response = (new FacebookRequest(
			$session, 
			'POST', '/'.$config['profile_id'].'/feed',
			    array(
			      'message' => $message,
			      'access_token' => $config['access_token']
			    )
		    ))->execute()->getGraphObject();

	    echo "
	    	Posted with id: " . $response->getProperty('id'). "<br />
			Click <a href='http://facebook.com/".$response->getProperty('id')."'>here</a> to see your post <br />
	    	<a href='".$baseUrl."posts'>Return to Posts</a><br />
	    ";
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
		echo"<h3> Posting a Link</h3>";

	     try {
		    $response = (new FacebookRequest(
			$session, 
			'POST', '/'.$config['profile_id'].'/feed',
			    array(
			      'link' => $link,
			      'message' => $message,
			      'access_token' => $config['access_token']
			    )
		    ))->execute()->getGraphObject();

	    echo "
	    	Posted with id: " . $response->getProperty('id'). "<br />
			Click <a href='http://facebook.com/".$response->getProperty('id')."'>here</a> to see your post <br />
	    	<a href='".$baseUrl."posts'>Return to Posts</a><br />
	    ";
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
	/************* LINK *************/


	/************* IMAGE *************/
	else if ($type == 'photo'){  
		echo"<h3> Posting a Photo</h3>";

	     try {
		    $response = (new FacebookRequest(
		      $session, 
		      'POST', '/'.$config['profile_id'].'/photos',
		      		array(
				        'source' => new CURLFile('assets/images/'.$image, 'jpg'),
				        'message' => $message,
			      		'access_token' => $config['access_token']
				      )
		    ))->execute()->getGraphObject();

	    echo "
	    	Posted with id: " . $response->getProperty('id'). "<br />
			Click <a href='http://facebook.com/".$response->getProperty('id')."'>here</a> to see your post <br />
	    	<a href='".$baseUrl."posts'>Return to Posts</a><br />
	    ";
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
		echo"<h3> Posting a Video</h3>";

	     try {
		    $response = (new FacebookRequest(
			$session,
			'POST',	'/'.$config['profile_id'].'/videos',
			    array (
				    'description' => $message,
				    'source' => new CURLFile('assets/videos/'.$video, 'mp4'),
			        'access_token' => $config['access_token']
			    )
		    ))->execute()->getGraphObject();

	    echo "
	    	Posted with id: " . $response->getProperty('id'). "<br />
			Click <a href='http://facebook.com/".$response->getProperty('id')."'>here</a> to see your post <br />
	    	<a href='".$baseUrl."posts'>Return to Posts</a><br />
	    ";
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
