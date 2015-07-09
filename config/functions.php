<?php


/*
 * Public Functions
 ********************/
function pageExist($url){

	$page = $url[0];
	
	if(isset($page)){ 
		$messages = "Loaded requested path <strong>$url[0]</strong><br />";					//echo $messages;
		$fileName = _verifyPageExist($page);
		return $fileName;																	//_callPage($page);

	} else { 
		$messages = "No route defined<br />Default route being loaded <br />";
	}
	
}

/*
 * Private Functions
 *********************/
function _verifyPageExist($page){

	$fileName = 'pages/'.$page.".php";
	if (file_exists($fileName)) { return $fileName; }									//check to see is file exists
	else { return 'pages/badPage.php'; }												//if file does not exist, return badPage
}



/*
 * Can probably delete these
 *****************************/
/*

function redir($page, $errNum){
	header("Location: error/".$errNum);
}

function error($errNum){

	if 		($errNum == "401")	{ $blurb="page not found"; }
	else if ($errNum == "402")	{ $blurb="another error"; }
	else 						{ $blurb="no error specified"; }
	return $blurb;
}

function _callPage($page){
	if (isset($page)){
		include 'pages/'.$page.'.php';
	}

}

*/
