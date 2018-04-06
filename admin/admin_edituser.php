<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();

	$id = $_SESSION['user_id'];
	$tbl = "tbl_user";
	$col = "user_id";
	$popForm = getSingle($tbl, $col, $id);
	$info = mysqli_fetch_array($popForm);
	//echo $info;

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$result = editUser($id, $fname, $username, $password, $email);
		$message = $result;
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit User</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
	<div class="editUser">
		<h2>Edit User</h2>
		<?php if(!empty($message)){echo "<p class='errorMsg'>" . $message . "</p>";}?>
		<form action="admin_edituser.php" method="post" class="createForm">
			<label>First Name:</label>
			<input type="text" name="fname" value="<?php echo $info['user_fname'];  ?>">
			<label>Username:</label>
			<input type="text" name="username" value="<?php echo $info['user_name'];  ?>">
			<label>Password:</label>
			<input type="text" name="password" value="<?php echo $info['user_pass'];  ?>">
			<label>Email:</label>
			<input type="text" name="email" value="<?php echo $info['user_email'];  ?>"><br><br>
			<input type="submit" name="submit" value="Edit Account">
		</form>
	</div>
</body>
</html>
