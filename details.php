<?php
	require_once('admin/phpscripts/config.php');
	if(isset($_GET['id'])) {
		//get the movie
		$tbl = "tbl_movies";
		$col = "movies_id";
		$id = $_GET['id'];
		$getMovie = getSingle($tbl, $col, $id);

		$getReview = getReview($id);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Details</title>
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans|Josefin+Sans" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>

	<?php
		if(!is_string($getMovie)){
			$row=mysqli_fetch_array($getMovie);
			echo "<div class='movie_panel'><div class='movie_img'><img src=\"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\"></div>
			<div class='movie_details'><h2>{$row['movies_title']}</h2>
			<p>{$row['movies_year']}</p>
			<p>{$row['movies_storyline']}</p>
			<p>{$row['movies_runtime']}</p>
			<p>{$row['movies_release']}</p><hr>
			<form action='admin/phpscripts/review-submit.php' method='post'><p>Author:</p>
			<input type='hidden' name='movieid' value='$row[movies_id]'/>
			<input type='text' name='auth'/><br/>
			<p>Review:</p>
			<textarea name='comments' class='inputarea' rows='5'></textarea>
			<input type='submit' name='submitReview' value='Submit'/><a href=\"index.php\">Back</a></form></div><h2>Reviews</h2></div>";

			if(isset($message)){
				echo "<p style='color: red; text-align: center;'>" . $message . "</p>";
			}
			if($getReview){
				while($reviews = $getReview->fetch_assoc()){
					echo "<div class='reviews'><p>{$reviews['comments_copy']}</p>
										<p class='right'>Author: {$reviews['comments_auth']}</p>
										<p class='right'>Date & Time: {$reviews['comments_date']}</p>";
				}
			}
		}
	?>

</body>
</html>
