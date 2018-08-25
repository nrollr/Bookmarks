<?php
	// Database parameters, change to reflect your own environment
	$db_host		= 'host_name';
	$db_user		= 'user_name';
	$db_pass		= 'password';
	$db_database	= 'database_name';

	// Open database connection
	$dbc = mysqli_connect($db_host,$db_user,$db_pass,$db_database);
	if($dbc === false){
		die("Error: Could not connect. " . mysqli_connect_error());
	}
?>
