<?php

/***********************
 * Extending the token *
 ***********************/
echo"<h3> Extending the token </h3>";

$extend_url = "https://graph.facebook.com/oauth/access_token?client_id=".$appId."&client_secret=".$app_secret."&grant_type=fb_exchange_token&fb_exchange_token=".$access_token;
$resp = file_get_contents($extend_url);
parse_str($resp,$output);
$extended_token = $output['access_token'];
//echo $extended_token;

// put $extended_token into db
echo $extended_token[access_token];
echo $extended_token[expires]; 
echo "<br />";
echo "<hr />";



