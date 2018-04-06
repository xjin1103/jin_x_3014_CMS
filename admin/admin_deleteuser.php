<?php
	require_once('phpscripts/config.php');
	$tbl = "tbl_user";
	$users = getAll($tbl);
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Delete User</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
	<div class="adminPanel">
		<h2>Delete Users</h2>
		<p>FULL NAME:</p>
		<?php
			while($row = mysqli_fetch_array($users)){
				echo "<p class='delete-line'>{$row['user_fname']}<a class='deleteBtn' href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\">Fired</a></p>";
			}
		?>
		<p><a class='backBtn' href="admin_index.php">BACK</a></p>
	</div>
</body>
</html>
