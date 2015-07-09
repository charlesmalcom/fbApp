<?php
/* PHP SDK v4.0.0 */
/* make the API call */
$request = new FacebookRequest(
  $session,
  'GET',
  '/{page-id}',
  	array(
  		'field')
);
$response = $request->execute();
$graphObject = $response->getGraphObject();
/* handle the result */
