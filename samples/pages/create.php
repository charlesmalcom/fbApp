<?php

/***************************************
 * Creating a Video, Link, Post, Photo *
 ***************************************/
if (isset($session)){
    echo"<h3> Creating a Video, Link, Post, Photo</h3>";

   try {
      $request = new FacebookRequest(

        // insert content from below goes in here

      );
      $response = $request->execute();
      $graphObject = $response->getGraphObject();

       echo "Posted with id: " . $response->getProperty('id');

      // Get response as an array
      //$Post_Link_Video = $request->getGraphObject()->asArray();
      //$picture = $request->getGraphObject()->asArray();
      //echo "<pre>"; print_r($graphObject); echo"</pre>";

    } catch (FacebookRequestException $e) {
        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();
    } catch (\Exception $e) {
      // Some other error occurred
    }

}

//URLs
https://developers.facebook.com/docs/graph-api/reference/photo
https://developers.facebook.com/docs/graph-api/reference/v2.3/post
https://developers.facebook.com/docs/graph-api/reference/v2.3/link
https://developers.facebook.com/docs/graph-api/reference/video


/* video */
$session,
'POST',

/{user-id}/videos
/{event-id}/videos
/{page-id}/videos
/{group-id}/videos


'/{video-id}'                      // [ EXAMPLE ]
'/'.$post_id,                      // [ ACTUAL ] create video on page

'/{page_id}/{video-id}'            // [ EXAMPLE ]
'/'.$page_id.'/'.$post_id,         // [ ACTUAL ] create video on a certain page
    array (
    'description' => 'This is a test video uploaded via an app.',
    //'source' => new CURLFile('path/to/file/video.wmv', 'video/wmv'),  // [ EXAMPLE ]
    'source' => new CURLFile($video_details, 'mp4'),                    // [ ACTUAL ]
    )


/* link */
$session, 
'POST', 
'/me/feed',                                         // [ EXAMPLE ]
'/{page_id}/feed'                                   // [ EXAMPLE ]
    array(
      'link' => 'http://www.property4u.com/',         // [ EXAMPLE ]
      'message' => 'Looking for property, look here.', // [ EXAMPLE ]
      'from' => ''
    )


/* post */
$session,
'POST',
'/{post-id}',                         // [ EXAMPLE ]
'/{link-id}',                         // [ EXAMPLE ]
'/{video-id}',                        // [ EXAMPLE ]
'/{page_id}/{video-id}',              // [ EXAMPLE ]
    array(
      
      /* MISSING ARRAY HERE */
      
    )


/* photo */
$session,
'POST',
'/me/photos',                         // [ EXAMPLE ]
'/{page_id}/photos',                  // [ EXAMPLE ]
'/{user_id}/photos'
'/{album_id}/photos'
'/{event_id}/photos'
'/{group_id}/photos'
'/'.$page_id.'/photos',               // [ ACTUAL ]
    array(
       //'source' => new CURLFile('path/to/file.name', 'image/png'),     // [ EXAMPLE ]
       'source' => new CURLFile('path/to/file.name/image.png', 'png'),     // [ ACTUAL ]
       'message' => 'User provided message'
    )

// If you're not using PHP 5.5 or later, change the file reference to:
// 'source' => '@/path/to/file.name'


/* OTHER IMPORTAMNT INFORMATION */

// POSTS, LINKS, VIDEOS
You can publish posts, links by using the
/{user-id}/feed 
/{page-id}/feed 
/{event-id}/feed or 
/{group-id}/feed edges

//VIDEOS
You can make a POST request to videos edge from the following paths: 
/{page_id}/videos

// LINKS, IMAGES
/* required*/
use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;




