<?php

$type = $url['1'];
//echo $type;
//return false;


/*
 * List all posts
 ******************/
if ($type == "link_image"){

	if (isset($session)){
	    echo"<h3>My Posts</h3>";

	   try {
	   	/*
		$request = new FacebookRequest(
		  $session,
		  'GET',
	      //'/me/feed'                                             // [ ACTUAL ]
	      '/'.$config['profile_id'].'/feed'
			//array( 'fields' => 'photos' )
		);
		*/

		//$response  		= $request->execute();
		//$graphObject 	= $response->getGraphObject();
	    //$feed 	 		= $graphObject->getProperty('data');
		$pagefeed 		= $facebook->api("/" . $config['profile_id'] . "/feed");


		
		// set counter to 0, because we only want to display 10 posts
		$i = 0;
		foreach($pagefeed['data'] as $post) {

			if ($post['type'] == 'status' || $post['type'] == 'link' || $post['type'] == 'photo') {

		        // open up an fb-update div
		        echo "<div class='postItem'>";
		        echo "<div class='fb-update'>";

		            // post the time

		            // check if post type is a status
		            if ($post['type'] == 'status') {
		                echo "<h2>Status updated on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
		                echo "<p>Posted by... " . $post['from']['id'] ." / ". $post['from']['name'] . "</p>";
		                echo "<p>" . $post['message'] . "</p>";
		            }

		            // check if post type is a link
		            if ($post['type'] == 'link') {
		                echo "<h2>Link posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
		                echo "<p>Posted by... " . $post['from']['id'] ." / ". $post['from']['name'] . "</p>";
		                echo "<p>" . $post['name'] . "</p>";
		                echo "<p><a href=\"" . $post['link'] . "\" target=\"_blank\">" . $post['link'] . "</a></p>";
		            }

		            // check if post type is a photo
		            if ($post['type'] == 'photo') {
		                echo "<h2>Photo posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
		                echo "<p>Posted by... " . $post['from']['id'] ." / ". $post['from']['name'] . "</p>";
		                if (empty($post['story']) === false) {
		                    echo "<p>" . $post['story'] . "</p>";
		                } elseif (empty($post['message']) === false) {
		                    echo "<p>" . $post['message'] . "</p>";
		                }
		                echo "<p><a href=\"" . $post['link'] . "\" target=\"_blank\">View photo &rarr;</a></p>";
		    }

	        echo "</div>"; // close fb-update div
	        echo"
		        </div>
				<div class='postAction'>
					<a href='".$baseUrl."delete/".$post['type']."/".$post['id']."'><img src='".$baseUrl."assets/images/actions/delete.gif' /></a>
					<a href='".$baseUrl."update/".$post['type']."/".$post['id']."'><img src='".$baseUrl."assets/images/actions/edit.gif' /></a>
				</div>
			";

		    $i++; // add 1 to the counter

	    }

		    //  break out of the loop if counter has reached 10
		    if ($i == 10) {
		        break;
		    }
		}


	    } catch (FacebookRequestException $e) {
	        echo "Exception occured, code: " . $e->getCode();
	        echo " with message: " . $e->getMessage();
	    } catch (\Exception $e) {
	      // Some other error occurred
	    }

	}

}


/*
 * List all videos
 ******************/
else if ($type == "video"){
	if (isset($session)){
	    echo"<h3>My Posts</h3>";

	   try {
		$pagefeed 		= $facebook->api("/" . $config['profile_id'] . "/videos");
		
		// set counter to 0, because we only want to display 10 posts
		$i = 0;
		foreach($pagefeed['data'] as $post) {

			//print_r($post);
			//return false;

		        // open up an fb-update div
		        echo "<div class='postItem'>";
		        echo "<div class='fb-update'>";

		            // check if post type is a link
		            //if ($post['type'] == 'video') {
		                echo "<h2>Video posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
		                echo "<p>Posted by... " . $post['from']['id'] ." / ". $post['from']['name'] . "</p>";
		                echo "<p>Video ID... " . $post['id'] . "</p>";
		                echo "<p>Video created " . $post['created_time'] . "</p>";
		                echo "<p>Video Description " . $post['description'] . "</p>";
		                echo "<p><a href=\"" . $post['source'] . "\" target=\"_blank\">" . $post['source'] . "</a></p>";
		            //}

	        echo "</div>"; // close fb-update div
	        echo"
		        </div>
				<div class='postAction'>
					<a href='".$baseUrl."delete/video/".$post['id']."'><img src='".$baseUrl."assets/images/actions/delete.gif' /></a>
					<a href='".$baseUrl."update/video/".$post['id']."'><img src='".$baseUrl."assets/images/actions/edit.gif' /></a>
				</div>
			";

		    $i++; // add 1 to the counter

	    }

		    //  break out of the loop if counter has reached 10
		    if ($i == 10) {
		        break;
		    }


	    } catch (FacebookRequestException $e) {
	        echo "Exception occured, code: " . $e->getCode();
	        echo " with message: " . $e->getMessage();
	    } catch (\Exception $e) {
	      // Some other error occurred
	    }

	}

}
