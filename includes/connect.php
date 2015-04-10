<?php
	// Replace 'host','username', 'password' and 'database' with the proper values
 	$dbc = @mysqli_connect("host", "username", "pasword", "database");

		if ($dbc->connect_errno) {echo "Failed to connect to MySQL: (" . $dbc->connect_errno . ") " . $dbc->connect_error;}
		echo $mysqli->host_info . "\n";
?>
