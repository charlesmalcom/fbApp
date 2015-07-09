<?php 
    //session_start();      //start session, already done in fb.php
    $_SESSION = array();    //clear session array
    session_destroy();      //destroy session
?>

<p>You have successfully logged out!</p>
<p>Return to the <a href="<?php echo $baseUrl; ?>">connect</a> page</p>
