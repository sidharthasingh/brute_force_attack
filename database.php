<?php
	function connection($password)
	{
		$hostname = HOST;
		$username = USER;
		$database = DATABASE;
		$port = PORT;
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
?>