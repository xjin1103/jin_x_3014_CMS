<?php
	require_once('phpscripts/config.php');
	if(isset($_POST["search"])){
		if(!empty($_POST["id"])){
			$tbl = "tbl_movies";
			$col = "movies_id";
			$id = $_POST["id"];
			echo single_edit($tbl, $col, $id);
		}
	}
	else{
		$tbl = "tbl_movies";
		$col = "movies_id";
		$id = 1;
		echo single_edit($tbl, $col, $id);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Single Movie Edit</title>
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans|Josefin+Sans" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/admin.css"/>
</head>
<body>
	<form class="search_movie" action='editAll.php' method='post'>
		<label>Movie Id</label>
		<input type="number" name="id"/>
		<input type="submit" name="search" value="Find Movie"/>
	</form>
</body>
</html>
