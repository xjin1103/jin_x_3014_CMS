<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require($_SERVER["DOCUMENT_ROOT"] . '/jin_x_3014_CMS/vendor/autoload.php');

  function createUser($fname, $username, $password, $email, $lvllist){
    include('connect.php');
    $hashedPWD = password_hash($password, PASSWORD_BCRYPT);
    $datetime =new DateTime("now");
    $datetime = $datetime->modify('+1 minutes');
    $expiredTime = $datetime->format('Y-m-d H:i:s');
    $userstring = "INSERT INTO tbl_user (user_fname, user_name, user_pass, user_email, user_date, user_ip, user_level, expire_time) VALUES('{$fname}','{$username}','{$hashedPWD}','{$email}', NULL, 'no','{$lvllist}','{$expiredTime}')";//order is important, it has to matchup with the database
    //echo $userstring;
    $userquery = mysqli_query($link, $userstring);
    if($userquery){
      $userMsg = "<p>Hello " . $fname . ", you become a new user now. Please check your account info below:" . "</p><br/><li>User Name: " . $username . "</li>" . "<li>Password: " . $password . "</li><br/><p>Plese click <a href='http://localhost:8888/jin_x_3014_CMS/admin/admin_login.php'>HERE</a> to login.</p>";
      //send email
      $mailToUser = new PHPMailer(true);
          try {
              $mailToUser->isSMTP();
              //$mailToUser->SMTPDebug = 2;
              $mailToUser->SMTPSecure = 'ssl';// Enable verbose debug output
              $mailToUser->Host = 'smtp.163.com';
              $mailToUser->SMTPAuth = true;
              $mailToUser->Username = 'wesley618@163.com';
              $mailToUser->Password = '68760273a';
              $mailToUser->Port = 465;
              $mailToUser->setFrom('wesley618@163.com', 'Admin');
              $mailToUser->addAddress($email);
              $mailToUser->isHTML(true);
              $mailToUser->Subject = 'New User';
              $mailToUser->addReplyTo('wesley618@163.com', 'Admin');
              $mailToUser->Body = "<h2>New User</h2>" . $userMsg;
              $mailToUser->AltBody = "<h2>New User</h2>" . $userMsg;
              $mailToUser->send();
              $mailSuccessMsgUser = "Email has been sent.";
              $message = "You have created a new user.";
              return $message;
              }
            catch (Exception $e) {
              $mailSuccessMsgUser = 'Message could not be sent. ' . 'Mailer Error: ' . $mailToUser->ErrorInfo;
              return $mailSuccessMsgUser;
              }
      redirect_to('admin_createuser.php');
    }else {
      $message = "Sorry, failed to create new user.";
      return $message;
    }
      mysqli_close($link);
  }


  function editUser($id, $fname, $username, $password, $email) {
		include('connect.php');
		$hashedPWD = password_hash($password, PASSWORD_BCRYPT);
		$updatestring = "UPDATE tbl_user SET user_fname='{$fname}', user_name='{$username}', user_pass='{$hashedPWD}', user_email='{$email}' WHERE user_id={$id}";
		$updatequery = mysqli_query($link, $updatestring);

		if($updatequery) {
			redirect_to("admin_index.php");
		}else{
			$message = "Sorry, failed to update user.";
			return $message;
		}

		mysqli_close($link);
  }


	function deleteUser($id) {
		include('connect.php');
		$delstring = "DELETE FROM tbl_user WHERE user_id = {$id}";
		$delquery = mysqli_query($link, $delstring);
		if($delquery) {
			redirect_to("../admin_deleteuser.php");
		}else{
			$message = "Sorry, failed to delete this user.";
			return $message;
		}
		mysqli_close($link);
	}

?>
