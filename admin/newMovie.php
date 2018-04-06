<?php
    require_once('phpscripts/config.php');
    if(isset($_POST["addMovie"])){
        if(!empty($_POST["title"]) && !empty($_POST["year"]) && !empty($_POST["run"]) && !empty($_POST["story"]) && !empty($_POST["trailer"]) && !empty($_POST["release"])  && !empty($_POST["genre"])){

            $cover = $_FILES["cover"];
            $title = $_POST["title"];
            $year = $_POST["year"];
            $run = $_POST["run"];
            $story = $_POST["story"];
            $trailer = $_POST["trailer"];
            $release = $_POST["release"];
            $genre = $_POST["genre"];

            $message = addMovie($cover, $title, $year, $run, $story, $trailer, $release, $genre);
        }
        else{
            $message = "Please fill in all required fields.";
        }
    }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Add Movie</title>
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans|Josefin+Sans" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/admin.css"/>
</head>
<body>
    <form class='movie_form' action='' method='post' enctype="multipart/form-data">
        <h2>Add Movie</h2><hr>
        <label>Cover</label><br/>
        <input type="file" name="cover" /><br/>
        <label>Title</label><br/>
        <input type="text" name="title" /><br/>
        <label>Year</label><br/>
        <input type="text" name="year" /><br/>
        <label>Run</label><br/>
        <input type="text" name="run" /><br/>
        <label>Story</label><br/>
        <input type="text" name="story" /><br/>
        <label>Trailer</label><br/>
        <input type="text" name="trailer" /><br/>
        <label>Release</label><br/>
        <input type="text" name="release" /><br/>
        <label>Genre</label><br/>
        <input type="text" name="genre" /><br/>
        <input type="submit" name="addMovie" value="Create Movie"/>
        <a href="admin_index.php">Home</a>
        <?php if(isset($message)) echo $message; ?>
    </form>
</body>
</html>
