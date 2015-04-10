<?php include ('includes/connect.php'); ?>
<?php include ('includes/values.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Edit Bookmarks</title>	
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>
<body>
<?php 
	if($_POST['submit'] == 1) {
		if($_POST['name'] == '') {
			echo ''.$warning.'';
			$error = true;
		}
		if($_POST['url'] == '') {
			echo ''.$warning.'';
			$error = true;
		}
		if($error != true) {
	
		$query = "UPDATE links SET name = '$_POST[name]', url = '$_POST[url]', date = '$_POST[date]' WHERE id = '$_POST[id]'";
		$result = mysqli_query($dbc, $query); 
		}
	}
 ?>

<div class="container" id="list">
<div class="page-header">
  <h1>Edit Bookmarks</h1>
  <p class="lead">Basic interface to <strong>update</strong> bookmarks stored in a database  
  <a href="db_edit.php" class="none"><sup><i class="fa fa-refresh"></i></sup></a></p>
</div>

<div class="row">
<div class="col-md-5">
	<p>Display all active <b>links</b> :</p>
		<?php 
			$result = mysqli_query($dbc, "SELECT * FROM links WHERE type = 1 ORDER BY date DESC");
			while ($output = mysqli_fetch_assoc($result)) {
				echo '<a href="?id='.$output['id'].'" class="none">'.$link.'<a href="'.$output['url'].'">'.$output['name'].'</a><br />'; } ?> 
</div>

<div class="col-md-5 col-md-offset-1">
<?php if($_GET['id']) { 
	$query = "SELECT * FROM links WHERE id = '$_GET[id]'";
	$result = mysqli_query($dbc, $query); 	
	$load = mysqli_fetch_assoc($result);
	?> 
		<form method="post" action="db_edit.php?id=<?php echo $load['id'];?>" role="form">
		  <div class="form-group">
			<p> Edit bookmark <b>description</b> :</p>
			<input type="text" name="name" value="<?php echo $load['name'];?>" class="form-control" />
		  </div>
		  <div class="form-group">
			<p> Edit bookmark <b>link</b> :</p>
			<input type="text" name="url" value="<?php echo $load['url'];?>" class="form-control" />
		  </div>
		  <button type="submit" name="submit" class="btn btn-default pull-right" value="1">Update bookmark</button><br />
		  <input type="hidden" name="id" value="<?php echo $load['id'];?>" />
		  <input type="hidden" name="date" value="<?php echo ''.$stamp.''; ?>" />
		</form>	
	<?php 
		} ?>
</div>
</div>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>