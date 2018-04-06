<?php

function deleteMovie($id) {
    include('connect.php');
    $delstring = "DELETE FROM tbl_movies WHERE movies_id = {$id}";
    $delquery = mysqli_query($link, $delstring);
    if($delquery) {
        redirect_to("../deleteMovie.php");
    }else{
        $message = "Sorry, failed to delete the movie.";
        return $message;
    }
    mysqli_close($link);
}


?>
