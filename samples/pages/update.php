<?php

/******************************
 * Updating a Post/Link/Video *
 ******************************/
if (isset($session)){
    echo"<h3> Updating a Post/Link/Video</h3>";

   try {
	$request = new FacebookRequest(

        // insert content from below goes in here
  );
	$response = $request->execute();
	$graphObject = $response->getGraphObject();

       echo "Updated with id: " . $response->getProperty('id');

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


/* post */
$session,
'GET',
  '/{post-id}',                    // [ EXAMPLE ]
  '/'.$post_id,                    // [ ACTUAL ]
    array (
      'message' => 'This is a test message',
    )


/* link */
You can not update a link using the Graph API


/* video */
$session,
'GET',
  '/{video-id}',                    // [ EXAMPLE ]
  '/'.$video_id,                    // [ ACTUAL ]
    array (
    'description' => 'This is a test video uploaded via an app. And this is added via my app.',
    //'source' => new CURLFile('path/to/file/video.wmv', 'video/wmv'),
    'source' => new CURLFile($video_details, 'mp4'),
    )


/* image */
$session,
'GET',
  '/{photo-id}',                    // [ EXAMPLE ]
  '/'.$photo_id,                    // [ ACTUAL ]
    array (
    'description' => 'This is a test video uploaded via an app. And this is added via my app.',   //<-- idk
    //'source' => new CURLFile('path/to/file/video.wmv', 'video/wmv'),                            //<-- idk
    'source' => new CURLFile($video_details, 'mp4'),                                              //<-- idk
    )


