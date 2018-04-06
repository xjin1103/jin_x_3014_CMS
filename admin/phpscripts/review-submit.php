<?php
     include('connect.php');
	if(isset($_POST["submitReview"])){
		if(!empty(trim($_POST["comments"])) && !empty(trim($_POST["auth"]))){
            $currTime =  date("Y-m-d h:i:s");
            $review = $_POST["comments"];
            $auth = $_POST["auth"];
            $movieId = $_POST["movieid"];
            $addReview = "INSERT INTO tbl_comments VALUES (NULL, '{$auth}', '{$review}', '{$currTime}')";
            $result = mysqli_query($link, $addReview);
            if($result){
                $commId = $link->insert_id;
                $addReviewMoive = "INSERT INTO tbl_mov_comm VALUES (NULL, '{$movieId}', '{$commId}')";
                $result2 = mysqli_query($link, $addReviewMoive);
                if($result2){
                    header("Location: ../../details.php?id='$movieId'");
                }
            }
		}
		else{
			header("Location: ../../index.php");
		}
	}
?>
