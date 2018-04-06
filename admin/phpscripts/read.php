<?php

	function getAll($tbl) {
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl}";
		$runAll = mysqli_query($link, $queryAll);
		if($runAll){
			return $runAll;
		}else{
			$error = "There was a problem accessing this information.  Sorry about your luck ;)";
			return $error;
		}
		mysqli_close($link);
	}

	function getSingle($tbl, $col, $id) {
		include('connect.php');
		$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
		$runSingle = mysqli_query($link, $querySingle);
		if($runSingle){
			return $runSingle;
		}else{
			$error = "There was a problem accessing this information.  Sorry about your luck ;)";
			return $error;
		}
		mysqli_close($link);
	}

	function filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter) {
		include('connect.php');

		$filterQuery = "SELECT * FROM {$tbl}, {$tbl2}, {$tbl3} WHERE {$tbl}.{$col} = {$tbl3}.{$col} AND {$tbl2}.{$col2} = {$tbl3}.{$col2} AND {$tbl2}.{$col3}='{$filter}'";
		//echo $filterQuery;
		$runQuery = mysqli_query($link, $filterQuery);
		if($runQuery){
			return $runQuery;
		}else{
			$error = "There was a problem accessing this information.  Sorry about your luck ;)";
			return $error;
		}
		mysqli_close($link);
	}

	function getReview($id){
		include('connect.php');
		$queryReview = "SELECT * FROM tbl_comments, tbl_mov_comm, tbl_movies WHERE tbl_comments.comments_id = tbl_mov_comm.comments_id AND tbl_mov_comm.movies_id = tbl_movies.movies_id AND tbl_movies.movies_id = {$id}";
		$runReview = mysqli_query($link, $queryReview);
		if($runReview){
			return $runReview;
		}
		else{
			$error = "There was a problem accessing this information.  Sorry about your luck ;)";
			return $error;
		}
		mysqli_close($link);
	}
?>
