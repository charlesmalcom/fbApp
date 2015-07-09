<?php

/******************************
 * Deleting a Post/Link/Video *
 ******************************/
if (isset($session)){
    echo"<h3> Deleting a Post/Link/Video</h3>";

   try {
      $request = new FacebookRequest(
        $session,
        'DELETE',
        '/{post-id}'                               // [ EXAMPLE ]
        '/{link-id}'                               // [ EXAMPLE ]
        '/{video-id}'                              // [ EXAMPLE ]
        '/{page_id}/{video-id}'                    // [ EXAMPLE ]
        '/'.$post_id                               // [ ACTUAL ] delete link/image/video on page
        '/'.$page_id.'/'.$post_id                  // [ ACTUAL ] delete video on a certain page
         '/10205703141291308_10205792194277577'    // [ ACTUAL ]
      );
      $response = $request->execute();
      $graphObject = $response->getGraphObject();


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

//Permissions for videos
To delete a user video, a user access token with publish_actions is required.
To delete a page video, a page access token with publish_actions is required.
Your app needs an user access token with publish_actions permission to delete a video.
