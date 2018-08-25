<?php
	include "include/connect.php";

	$date = date_create(); $timestamp = date_timestamp_get($date);
	$warning = '<div class="ui negative message"><i class="close icon"></i><div class="header">Warning!</div><p>A required field is missing!</p></div>';
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
<?php //Add Bookmarks
	if($_POST['submit'] == 1) {
		if($_POST['name'] == '') {
			echo ''.$warning.'';
			$error = true;
		}
		elseif($_POST['url'] == '') {
			echo ''.$warning.'';
			$error = true;
		}
		if($error != true) {
	// CRC32 hash for URL to create a unique ID
	$query = "INSERT INTO links (id, name, url, parent, date) VALUES ('".crc32($_POST['url'])."', '$_POST[name]', '$_POST[url]', '$_POST[parent]', '$_POST[date]')";
	$result = mysqli_query($dbc, $query);
		}
	}
?>
<?php //Add Folders
	if($_POST['submit'] == 2) {
		if($_POST['name'] == '') {
			echo ''.$warning.'';
			$error = true;
		}
		if($error != true) {
	// CRC32 hash for folder name to create a unique ID
	$query = "INSERT INTO links (id, name, parent, type) VALUES ('".crc32($_POST['name'])."', '$_POST[name]', '$_POST[parent]', '$_POST[type]')";
	$result = mysqli_query($dbc, $query);
		}
	}
?>
</div>
<br>
<br>
<div class="ui text container">
<h1 class="ui dividing header">Add bookmarks
	<div class="sub header">
		Basic interface to <strong>add</strong> bookmarks or folders to the database&nbsp;
		<a href="db_add.php"><i class="sync alternate icon grey"></i></a>
	</div>
</h1>
<!--Add Bookmarks-->
<div class="ui grid">
	<div class="eight wide column">
			<p>Recently added <b>bookmarks</b> :</p>
			<div class="ui list">
				<?php
					$result = mysqli_query($dbc, "SELECT * FROM `links` WHERE type = 1 ORDER BY date DESC LIMIT 5");
						while ($output = mysqli_fetch_assoc($result)) {
							echo '<div class="item"><i class="bookmark outline icon grey"></i><div class="content"><a href="'.$output['url'].'">'.$output['name'].'</a></div></div>'; }
						?>
			</div>
	</div>
	<div class="eight wide column">
		<p>Add new <b>bookmarks</b> :</p>
		<form method="POST" action="db_add.php" class="ui form" id="main">
			<div class="field">
				<input type="text" name="name" value="" placeholder="Bookmark name" autocomplete="off">
			</div>
			<div class="field">
				<input type="text" name="url" value="" placeholder="http:// " autocomplete="off">
			</div>
			<div class="two fields" >
				<div class="field">
					<button class="ui basic button" name="submit" type="submit" value="1"><i class="file outline icon"></i>Add bookmark</button>
				</div>
				<div class="field">
					<select name="Folder" class="ui fluid dropdown" id="select" onchange="run()">
						<option value="">Folder</option>
						<?php
							$result = mysqli_query($dbc, "SELECT * FROM `links` WHERE type = 0");
							while ($output = mysqli_fetch_assoc($result)) {
								echo '<option value="'.$output['id'].'">'.$output['name'].'</option>'; }
							?>
					</select>
				</div>
			</div>
			<input type="hidden" name="parent" value="" id="parent" />
			<input type="hidden" name="date" value="<?php echo ''.$timestamp.''; ?>" />
		</form>
	</div>
</div>
<br>
<br>
<div class="ui divider"></div>
<!--Add Folders-->
<div class="ui grid">
	<div class="eight wide column">
		<p>Recently added <b>folders</b> :</p>
		<div class="ui list">
		<?php
			$result = mysqli_query($dbc, "SELECT * FROM `links` WHERE type = 0");
			while ($output = mysqli_fetch_assoc($result)) {
				echo '<div class="item"><i class="disabled caret right icon"></i><div class="content"><a href="#">'.$output['name'].'</a></div></div>'; }
			?>
		</div>
	</div>
	<div class="eight wide column">
		<p>Add new <b>folders</b> :</p>
		<form method="POST" action="db_add.php" class="ui form" id="main">
			<div class="field">
				<input type="text" name="name" value="" placeholder="Folder name" autocomplete="off">
				<input type="hidden" name="parent" value="0">
				<input type="hidden" name="type" value="0">
			</div>
			<div class="field">
				<button name="submit" type="submit" class="ui right floated basic button" value="2"><i class="folder outline icon"></i>Add folder</button>
			</div>
		</form>
	</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.3.3/dist/semantic.min.js"></script>
<script type="text/javascript">
$('.ui.dropdown').dropdown();
	function run() {
		document.getElementById("parent").value = document.getElementById("select").value;
	}
</script>
<script type="text/javascript">
$('.message .close').on('click', function() {
	$(this).closest('.message').transition('fade');
});
</script>
</body>
</html>