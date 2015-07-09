<?php

//show errors
ini_set('display_errors',1); 
error_reporting(E_ALL);


/* VARIABLES */
$baseUrl		= 'http://test.arcmls.com/';
$localPath		= '/home/test/public_html/';


/* URL VARIABLES */
if (isset($_GET['url'])){
		$url = $_GET['url'];
		$url = rtrim('/', $url);
		$url = explode('/', $_GET['url']);

	}else{ $url = null; }
