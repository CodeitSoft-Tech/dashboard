<?php
	
	
	include("includes/db_conn.php");


	if(isset($_GET['token']))
	{
		$token = mysqli_real_escape_string($db, $_GET['token']);
		$query = "SELECT * FROM forgot_password WHERE token ='$token'";
		$run = mysqli_query($db, $query);

		if(mysqli_num_rows($run) > 0)
		{
			$row = mysqli_fetch_array($run);
			$token = $row['token'];
			$email = $row['email'];
		}
		else
		{
			header("location:login.php");
		}
	}

	if(isset($_POST['btn_reset']))
	{

		$password = mysqli_real_escape_string($db, $_POST['new_pass']);
		$con_pass = mysqli_real_escape_string($db, $_POST['con_pass']);

		$options = ['cost'=>11];
		$hashed = password_hash($password, PASSWORD_BCRYPT, $options);

		if($password != $con_pass)
		{
			$msg = "<div class='alert alert-danger'>Passwords do not match </div>";
		}

		elseif(strlen($password) < 8)
		{
			$msg = "<div class='alert alert-danger'>Password must be at least 8 characters </div>";
		}
		else
		{
			$query ="UPDATE users SET password = '$hashed' WHERE email='$email'";
			mysqli_query($db, $query);
			$query = "DELETE FROM forgot_password WHERE email = '$email'";
			mysqli_query($db, $query);

			$msg = "<div class='alert alert-success'>Password updated successfully </div>";
		}
	}

?>