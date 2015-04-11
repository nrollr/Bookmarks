<?php include ('includes/connect.php'); ?> 
<?php include ('includes/values.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Add Bookmarks</title>	
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>
<body>
<?php 
	if($_POST['submit'] == 1) { 	//Add Bookmarks
		if($_POST['name'] == '') {
			echo ''.$warning.'';
			$error = true;
		}
		if($_POST['url'] == '') {
			echo ''.$warning.'';
			$error = true;
		}
		if($error != true) {
	
	$query = "INSERT INTO links (id, name, url, parent, date, icon) VALUES ('$_POST[id]', '$_POST[name]', '$_POST[url]', $_POST[parent], $_POST[date], '$_POST[icon]')";
	$result = mysqli_query($dbc, $query); 
		}
	}
?>
<?php 
	if($_POST['submit'] == 2) { 	//Add Folders
		if($_POST['name'] == '') {
			echo ''.$warning.'';
			$error = true;
		}
		if($error != true) {
	
	$query = "INSERT INTO links (id, name, parent, type, icon) VALUES ('$_POST[id]', '$_POST[name]', $_POST[parent], $_POST[type], '$_POST[icon]')";
	$result = mysqli_query($dbc, $query); 
		}
	}
?>

<div class="container"> 
<div class="page-header">
  <h1>Add bookmarks</h1>
  <p class="lead">Basic interface to <strong>add</strong> bookmarks or folders to the database
  <a href="db_add.php" class="none"><sup><i class="fa fa-refresh"></i></sup></a></p>
</div>  

<!--Add Bookmarks-->
<div class="row" id="list" >
	<div class="col-md-4">
	<p>Recently added <b>bookmarks</b> :</p>
		<?php 
			$result = mysqli_query($dbc, "SELECT * FROM links WHERE type = 1 ORDER BY date DESC LIMIT 5");
			while ($output = mysqli_fetch_assoc($result)) {
				echo ''.$link.'<a href="'.$output['url'].'">'.$output['name'].'</a><br />'; } 
			?> 		
	</div>
	<div class="col-md-4 col-md-offset-1">
		<p>Add new <b>bookmarks</b> :</p>
		<form method="post" action="db_add.php" role="form" id="main">
		  <input type="hidden" name="id" value="<?php echo ''.$key.'' ?>" />
		  <div class="form-group"><input type="text" name="name" value="" class="form-control" placeholder="Bookmark name"/></div>
		  <div class="form-group"><input type="text" name="url" value="" class="form-control" placeholder="http:// "/></div>
		  
		<div id="_filter" class="btn-group pull-right">
		    <button name="submit" type="submit" class="btn btn-default " value="1"><i class="fa fa-file-o"></i>Add bookmark </button>
		    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Folder <span class="caret"></span></button>
		    <ul class="dropdown-menu" role="menu">
		    	<li role="presentation"><a role="menuitem" tabindex="-1" href="#0">Unsorted Bookmarks</a></li>
		   	    <li role="presentation" class="divider"></li>
		    	<?php 
		    		$result = mysqli_query($dbc, "SELECT * FROM links WHERE type = 0");
		    		while ($output = mysqli_fetch_assoc($result)) {
		    			echo '<li role="presentation"><a href="#'.$output['id'].'" role="menuitem" tabindex="-1">'.$output['name'].'</a></li>'; } 
		    		?> 				    
		    </ul>	
		  </div>
		  <input type="hidden" name="parent" value="<?php echo ''.$output['parent'].'' ?>" />
		  <input type="hidden" name="date" value="<?php echo ''.$stamp.''; ?>" />
		  <input type="hidden" name="icon" value="fa-file-o" />
		</form>
	</div>
</div> <br />

<!--Add Folders-->
<div class="row" id="list" >
	<div class="col-md-4 ">	
		<p>Recently added <b>folders</b> :</p>
		<?php 
			$result = mysqli_query($dbc, "SELECT * FROM links WHERE type = 0");
			while ($output = mysqli_fetch_assoc($result)) {
				echo ''.$folder.'<a href="#">'.$output['name'].'</a><br />'; } 
			?> 		
	</div>
  	<div class="col-md-4 col-md-offset-1">
  		<p>Add new <b>folders</b> :</p>
		<form method="post" action="db_add.php" role="form">
		  <input type="hidden" name="id" value="<?php echo ''.$key.'' ?>" />
		  <div class="form-group"><input type="text" name="name" value="" class="form-control" placeholder="Folder name"/></div>
		  <input type="hidden" name="parent" value="0" />
  		  <input type="hidden" name="type" value="0" />	
  		  <input type="hidden" name="icon" value="fa-folder-o" />	
		  <button name="submit" type="submit" class="btn btn-default pull-right" value="2"><i class="fa fa-folder-o"></i>Add folder</button><br />
		</form> 	
  	</div>
</div>  
</div> 

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script type="text/javascript" src="assets/javascript/jquery.tbs_dd.js" ></script>
<script type="text/javascript">
$(document).ready(function () {
	console.log("ready");
	$('.dropdown-toggle').dropdown();
	$("#_filter").dd_select({
  		formID: "main",
  		hiddenFieldName:"parent",
  		submitOnChange: false,
  		ajaxCall:{}
	});
});
</script>
</body>
</html>