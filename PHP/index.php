<?php
	define("HOST","localhost");
	define("USER","root");
	define("PORT",3306);
	define("DATABASE","");

	error_reporting(0);
	define('PASSWORD_MAX_LEN',4); // The maximum length of the combination to be tried
	define("TRY_ALL", false);

	// remove according to usage.
	$token = array('a'); // What to be included in the combinations : 
	/*
		'a' : small alphabets
		'A' : capital alphabets
		'1' : numbers
		'*' : all the 256 characters
	*/

	require("combination.php");

	start_crack();

?>