<?php
/* please dont change anything here cause it will put the other code to dust */
/* jangan rubah kode didalam ini, karena akan membuat kode lain berantakan */
session_start();
require_once "app/Core/Config.php";
require_once "app/Core/Route.php";

if(LOAD_LIBRARY!=""){
$load_lib=explode(",", LOAD_LIBRARY);
foreach($load_lib as $lib){
	require_once "system/libraries/".$lib.".php";	
}
}

require_once "system/Controller.php";

$controller=DEV_CON;
$function="index";
$class=DEV_CL;

if(isset($_GET["a"])){
	$controller="";
	if(array_key_exists($_GET["a"], $route)){
		$url=explode("/", $route[$_GET["a"]]);
	}
	else{
		$url=explode("/", $_GET["a"]);
	}
	if(count($url)==1){
	$controller=$url[0];
	$class=$url[0];
	}
	else if(count($url)==2){
		if($url[1]!=""){
			$function=$url[1];
		}
	$controller=$url[0];
	$class=$url[0];
	}
	else if(count($url)>=2){
		$controller="";
		if($url[count($url)-1]!=""){
			$function=$url[count($url)-1];
		}
		for($i=0;$i<(count($url)-1);$i++){
			if($i==(count($url)-2)){
				$controller.=$url[$i];
			}
			else{
				$controller.=$url[$i]."/";
			}
		}
	$class=$url[count($url)-2];
	}	
}


$controller_file="app/Controllers/".$controller.".php";
if(file_exists($controller_file)){
	require_once $controller_file;
		$class=new $class();
		$class->$function();
}
else{
	http_response_code(404);
	echo "404 Not found";
}
?>