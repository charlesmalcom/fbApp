<?php

/************************************
 * Making Requests to the Graph API *
 ************************************/
if (isset($session)){

    try {
        $me = (new FacebookRequest(
            $session, 'GET', '/'.$page_id
        ))->execute()->getGraphObject(GraphUser::className());
     
        // Output user name.
        echo $me->getName()."<br /><hr />";
    } catch (FacebookRequestException $ex) {
     
        // The Graph API returned an error.
        print_r( $ex );
    } catch (\Exception $ex) {
     
        // Some other error occurred.
        print_r( $ex );
    }

}

