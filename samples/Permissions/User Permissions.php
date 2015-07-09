<?php

/********************
 * User Permissions *
 ********************/
echo"<h3> User Permissions </h3>";
$user_permissions = (new FacebookRequest($session, 'GET', '/me/permissions'))->execute()->getGraphObject(GraphUser::className())->asArray();
var_dump($user_permissions);
echo "<br />";
echo "<hr />";