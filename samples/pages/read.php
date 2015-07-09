<?php

/*****************************
 * Reading a Post/Link/Video *
 *****************************/
if (isset($session)){
    echo"<h3> Reading a Post/Link/Video</h3>";

   try {
	$request = new FacebookRequest(
	  $session,
	  'GET',
  		'/{link-id}'					                          // [ EXAMPLE ]
  		'/{post-id}'					                 	        // [ EXAMPLE ]
  		'/{video-id}'					                	        // [ EXAMPLE ]
      '/me'                                           // [ ACTUAL ]
      '/me/picture?type=large&redirect=false'         // [ ACTUAL ]
      '/{page_id}/picture?type=large&redirect=false'  // [ ACTUAL ]
      '/'.$post_id                                    // [ ACTUAL ]
);
	$response = $request->execute();
	$graphObject = $response->getGraphObject();

  // Get response as an array
  $Post_Link_Video = $request->getGraphObject()->asArray();
  $picture = $request->getGraphObject()->asArray();

  print_r( $Post_Link_Video );
  print_r( $picture );
  echo "<a href='$picture[url]' target='newWindow'>Picture</a>";    // [ EXAMPLE ]
  echo "<br />";
  echo "<hr />";    


    } catch (FacebookRequestException $e) {
        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();
    } catch (\Exception $e) {
      // Some other error occurred
    }

}

//URLs
https://developers.facebook.com/docs/graph-api/reference/v2.3/post  
https://developers.facebook.com/docs/graph-api/reference/v2.3/link
https://developers.facebook.com/docs/graph-api/reference/video
