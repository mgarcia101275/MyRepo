<?php

function create_menu($dir){

	$content = scandir($dir);
	$prohibidos = array('search','news');

	foreach($content as $item){

		if((is_file($item)) && (!in_array(substr($item,-8),$prohibidos))){

			echo '<li><a href="index.php?p="'.substr($item,-8).'>'.substr($item,-8).'</a></li>';

		}//End of is_file

	}//End of foreach
		
}//End of create_menu function.

function checkEmail($email) { if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$email)) { return true; } return false; }

function checkStrengh($password) {if (preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $password)){ return true;}else{ return false;}}

function checkIp($ip){ return preg_match("/^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])" . "(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/", $ip ); }

//this page define two functions by login/logout process.

/* This function determines an absolute
 URL and redirects the user there.
* The function takes one argument: the
page to be redirected to.
* The argument defaults to index.php. */


function redirect_user ($page = 'index.
php'){

//start defining the url

$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);

$url = rtrim($url,'/\\');

$url .='/'.$page;

//redirecting the user

header("Location: $url");

exit();  //Quick the script.

} //end of the redirect_user() function.

?>