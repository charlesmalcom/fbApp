<?

/********************
 * User Permissions *
 ********************/
echo"<h3> User Permissions 2 </h3>";
echo"<h3> Usage </h3>";
$request = ( new FacebookRequest( $session, 'GET', '/me/permissions' ) )->execute();
$permissions = $request->getGraphObject()->asArray();
 
print_r( $permissions );
echo "<br />";
echo "<hr />";