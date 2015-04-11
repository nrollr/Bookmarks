<?php include ('includes/values.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>List Bookmarks</title>	
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>
<body>

<div class="container">
<div class="page-header">
  <h1>List bookmarks</h1>
  <p class="lead">Basic interface to <strong>list</strong> bookmarks stored in a database
  <a href="db_list.php" class="none"><sup><i class="fa fa-refresh"></i></sup></a></p>
</div>

<div class="row" id="list" >
	<div class="col-md-4">
	<?php 
	// Replace 'host','username' and 'password' with the proper values
	mysql_connect('host','username','password') or die(mysql_error());	

	// Replace 'database' with the proper value
 	mysql_select_db('database') or die(mysql_error());

	  
	class netstedCategories {
		public static function generateMenu($categories,$level){
			echo '<ul class="overview">';
			foreach($categories as $category ){
				echo '<li class="toggle"><i class="fa '.$category->icon.'"></i><a href="'.$category->url.'">'.$category->name.'</a>';
				
				if(isset($category->children) and count($category->children)>0){
					netstedCategories::generateMenu($category->children,$category->id);
				}
				echo '</li>';
			}
			echo '</ul>';
		}
		public static function buildMenu  (){
			$categories=array();
			$query=mysql_query('SELECT * FROM links ORDER BY date ASC') or die(mysql_error());
			while($row=mysql_fetch_object($query)){
				$categories[]=$row;
			}
			$nestedCategories=netstedCategories::getChildren($categories,0);
			netstedCategories::generateMenu($nestedCategories,0); 
		}
		public static function hasChildren($categories,$parent_id){ 
			foreach($categories as $category){
				if($category->parent==$parent_id) return true;
			}
			return false;
		}
	 	public static function getChildren($categories ,$parent_id){
			$temp=array();
			foreach($categories as $category){
				if($category->parent==$parent_id){ 
					if(netstedCategories::hasChildren($categories,$category->id)){
						$category->children=netstedCategories::getChildren($categories,$category->id);
					} 
					$temp[]=$category;
					}
			}
			return $temp;
		}
	}
	netstedCategories::buildMenu();
	?>
	</div>
</div> <!--end of row--> 
</div> <!--end of container-->

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script><script type='text/javascript'>//<![CDATA[ 
	$(window).load(function(){
	$('.overview ul').hide();	
	$('.toggle').click(function() {
	    $(this).find('ul').slideToggle();
	});
});//]]>  
</script>  

</body>
</html>



