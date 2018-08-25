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
<br>
<br>
<div class="ui text container">
<h1 class="ui dividing header">List bookmarks
	<div class="sub header">
		Basic interface to <strong>list</strong> bookmarks or folders to the database&nbsp;
		<a href="db_list.php"><i class="sync alternate icon grey"></i></a>
	</div>
</h1>
	<?php
	include "include/connect.php";
		$result = mysqli_query($dbc, "SELECT * FROM `links`");
		$relation = array(
			'children' => array(),
			'parents' => array()
		);
		while ($row = mysqli_fetch_assoc($result)) {
			$relation['children'][$row['id']] = $row;
			$relation['parents'][$row['parent']][] = $row['id'];
		}

	function buildCategory($parent, $relation) {
		$html = "";
		if (isset($relation['parents'][$parent])) {
			$html .= "<div class='ui list'>";
			foreach ($relation['parents'][$parent] as $cat_id) {
				//Formatting child item
				if (!isset($relation['parents'][$cat_id])) {
					$html .= "<div class='item'><i class='disabled bookmark outline icon'></i>";
					$html .= "<div class='content'><a href='".$relation['children'][$cat_id]['url']."'>".$relation['children'][$cat_id]['name']."</a></div>";
					$html .= "</div>";
				}
				//Formatting parent item
				if (isset($relation['parents'][$cat_id])) {
					$html .= "<div class='item'>";
					$html .= "<div class='header'><i class='disabled caret right icon'></i>".$relation['children'][$cat_id]['name']."</div>";
					$html .= buildCategory($cat_id, $relation);
					$html .= "</div><br>";
				}
			}
			$html .= "</div>";
		}
		return $html;
	}
	echo buildCategory(0, $relation);
	?>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.3.3/dist/semantic.min.js"></script>

</body>
</html>