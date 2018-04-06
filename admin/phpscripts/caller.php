<?php
	//This file is not called through config.php
	require_once('config.php');

	if(isset($_GET['caller_id'])){
		$dir = $_GET['caller_id'];
		if($dir == "logout"){
			logged_out();
		}else if($dir == "delete") {
			$id = $_GET['id'];
			deleteUser($id);
		}else if($dir == "deleteMovie"){
			$id = $_GET['id'];
			deleteMovie($id);
		}
		else{
			echo "Caller id was passed incorrectly.";
		}
	}



?>
