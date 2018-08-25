<?php
	include "include/connect.php";

	$date = date_create(); $timestamp = date_timestamp_get($date);
	$warning = '<div class="ui negative message" id="alert"><i class="close icon"></i><div class="header">Warning!</div><p>A required field is missing!</p></div>';
	$success = '<div class="ui positive message" id="alert"><i class="close icon"></i><div class="header">Success!</div><p>Details of the bookmark have been updated!</p></div>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.3.3/dist/semantic.min.css" />
	<link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
<br>
<br>
<div class="ui text container">
<?php
	if($_POST['submit'] == 1) {
		$query = "UPDATE `links` SET name = '$_POST[name]', url = '$_POST[url]', date = '$_POST[date]' WHERE id = '$_POST[id]'";
		if (mysqli_query($dbc, $query)) {
			echo $success;
		}
	}
 ?>
</div>
<br>
<br>
<div class="ui text container">
<h1 class="ui dividing header">Edit bookmarks
	<div class="sub header">
		Basic interface to <strong>update</strong> bookmarks or folders to the database&nbsp;
		<a href="db_edit.php"><i class="sync alternate icon grey"></i></a>
	</div>
</h1>
<br>
	<div class="ui grid">
		<div class="eight wide column">
			<p>Display all active <b>links</b> : <i>click the link to edit...</i></p>
			<div class="ui list">
				<?php
					$result = mysqli_query($dbc, "SELECT * FROM `links` WHERE type = 1 ORDER BY date DESC");
						while ($output = mysqli_fetch_assoc($result)) {
							echo '<div class="item"><i class="bookmark outline icon grey"></i><div class="content"><a href="?id='.$output['id'].'">'.$output['name'].'</a></div></div>'; }
						?>
			</div>
		</div>
		<div class="eight wide column">
			<?php if($_GET['id']) {
				$query = "SELECT * FROM `links` WHERE id = '$_GET[id]'";
					$result = mysqli_query($dbc, $query);
					$load = mysqli_fetch_assoc($result);
				?>
					<form method="POST" action="db_edit.php?id=<?php echo $load['id'];?>" class="ui form">
						<div class="field">
							<p>Edit bookmark <b>description</b> :</p>
							<input type="text" name="name" value="<?php echo $load['name'];?>">
						</div>
						<div class="field">
							<p>Edit bookmark <b>link</b> :</p>
							<input type="text" name="url" value="<?php echo $load['url'];?>">
						</div>
						<button type="submit" name="submit" class="ui basic right floated button" value="1">Update bookmark</button><br />
						<input type="hidden" name="id" value="<?php echo $load['id'];?>" />
						<input type="hidden" name="date" value="<?php echo ''.$timestamp.''; ?>" />
					</form>
				<?php } ?>
		</div>
	</div>
<br>
<br>
<div class="ui divider"></div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.3.3/dist/semantic.min.js"></script>
<!-- Auto dismiss notification messages -->
<script type="text/javascript">
	window.setTimeout(function() {
		$("#alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove();
		});
	}, 2000);
</script>
</body>
</html>