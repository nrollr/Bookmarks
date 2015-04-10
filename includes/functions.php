<?php
	// Replace 'host','username' and 'password' with the proper values
 mysql_connect("host", "username", "password") or die(mysql_error());
	// Replace 'database' with the proper value
 mysql_select_db("database") or die(mysql_error());


function display_menus($parent_id = 0)
	{
	$query = mysql_query("SELECT * FROM links WHERE parent = '.$parent_id.' ORDER BY name") or die(mysql_error());
	if (mysql_num_rows($query) > 0) {	
		echo "<ul>";
		while ($row = mysql_fetch_array($query)) {
			echo "<li> <a href='#'>" .$row['name']. "</a>";
			display_menus($row['id']);
			echo "</li>";
		}
		echo "</ul>";
	}
}
?>
