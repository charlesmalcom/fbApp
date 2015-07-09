<?php

/*****************
 * Access Tokens *
 *****************/
//https://developers.facebook.com/docs/facebook-login/access-tokens#extending

GET /oauth/access_token?  
    grant_type=fb_exchange_token&           
    client_id={app-id}&
    client_secret={app-secret}&
    fb_exchange_token={short-lived-token} 

    
GET /oauth/access_token?  
    grant_type=fb_exchange_token&           
    client_id=$appId&
    client_secret=$app_secret&
    fb_exchange_token=$access_token