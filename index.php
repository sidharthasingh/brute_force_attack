<?php
	define("HOST","localhost");
	define("USER","root");
	define("PORT",3306);
	define("DATABASE","");

	error_reporting(0);
	define('PASSWORD_MAX_LEN',11); // The maximum length of the combination to be tried

	$token = array('a','A','1','*'); // What to be included in the combinations : 
	/*
		'a' : small alphabets
		'A' : capital alphabets
		'1' : numbers
		'*' : all the 256 characters
	*/

	require("database.php");
	require("combination.php");

	
?>