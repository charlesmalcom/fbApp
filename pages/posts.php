<?php

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\GraphUser;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;
use Facebook\Facebook;

use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookAuthorizationException;

//include 'pageNav.php';
?>

<ul>
	<li><a href='<?php echo $baseUrl; ?>create/photo'>Create Image</a></li>
	<li><a href='<?php echo $baseUrl; ?>create/link'>Create Link</a></li>
	<li><a href='<?php echo $baseUrl; ?>create/video'>Create Video</a></li>
	<li><a href='<?php echo $baseUrl; ?>create/status'>Create Status</a></li>

	<li><a href='<?php echo $baseUrl; ?>read/link_image'>Read Link & Images</a></li>
	<li><a href='<?php echo $baseUrl; ?>read/video'>Read Videos</a></li>
</ul>


