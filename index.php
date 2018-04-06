<?php
	require_once('admin/phpscripts/config.php');

	if(isset($_GET['filter'])){
		$tbl = "tbl_movies";
		$tbl2 = "tbl_genre";
		$tbl3 = "tbl_mov_genre";
		$col = "movies_id";
		$col2 = "genre_id";
		$col3 = "genre_name";
		$filter = $_GET['filter'];
		$getMovies = filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter);
	}else{
		$tbl = "tbl_movies";
		$getMovies = getAll($tbl);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to the Finest Selection of Blu-rays on the internets!</title>
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans|Josefin+Sans" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
<?php
	include('includes/nav.html');
	if(!is_string($getMovies)){
		echo "<div class='movie_panel'>" ;
		while($row = mysqli_fetch_array($getMovies)){
			echo "<div class='movie_thumbnails'>" . "<img src=\"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
				<h3>{$row['movies_title']}</h3>
				<p>{$row['movies_year']}</p>
				<p><a href=\"details.php?id={$row['movies_id']}\">More Details...</a></p></div>
			";
		}
		echo "</div>";
	}else{
		echo "<p class=\"error\">{$getMovies}</p>";
	}

	include('includes/footer.html');
?>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
