<?php
	/*
	brute force attack combination script
	*/

	// init tokens

	require("database.php");

	$tokens=array();

	if(in_array('*', $token))
		for($i=0;$i<=255;$i++)
			$tokens[]=chr($i);
	else
	{
		if(in_array('a', $token))
			for($i=97;$i<=122;$i++)
				$tokens[]=chr($i);
		if(in_array('A', $token))
			for($i=65;$i<=90;$i++)
				$tokens[]=chr($i);
		if(in_array('1', $token))
			for($i=48;$i<=57;$i++)
				$tokens[]=chr($i);
	}
	

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

	function start_crack()
	{
		$max=PASSWORD_MAX_LEN;
		if(TRY_ALL)
			$max=1;

		for(;$max<=PASSWORD_MAX_LEN;$max++)
		{
			for($i=0;$i<$tokenLength;$i++)
			{
				gen($tokens[$i],1,$max);
			}
		}
	}
?>