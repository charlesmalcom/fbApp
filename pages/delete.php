<?php

use Facebook\FacebookRequest;

//get id
$type = $url[0];
$post_id = $url[2];                 //pass to line 16

if ($type='link'){}
else if ($type='photo'){}
else if ($type='video'){}


if (isset($session)){
    echo"<h3> Delete a Post </h3>";

    try {
        $request = new FacebookRequest(
          $session,
          'DELETE',
        '/'.$post_id
    );
    
    $response = $request->execute();
    $graphObject = $response->getGraphObject();

    echo "Deleted id: " . $post_id."<br />";
    echo "<a href='".$baseUrl."posts'>Return to Posts</a>";

    } catch (FacebookRequestException $e) {
        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();
    } catch (\Exception $e) {
      // Some other error occurred
    }

}