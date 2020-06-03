<?php


    include("includes/db_conn.php");


   if(isset($_POST['forgot_pass']))
	{
		$email = mysqli_real_escape_string($db, $_POST['email']);

		$sql = "SELECT * FROM users WHERE email ='$email'";
		$query = mysqli_query($db, $sql);

		if(mysqli_num_rows($query) > 0)
		{
			$row = mysqli_fetch_array($query);
			$user_email = $row['email'];
			$user_id  = $row['user_id'];
			 //setting a random token
			$token = uniqid(md5(time()));

			$insert = "INSERT INTO forgot_password(forgotpass_id, email, token)
			           VALUES(NULL, '$email', '$token')";

			$query = mysqli_query($db, $insert);

			if($query)
			{
				$to      = $user_email;
				$subject = "Password reset link";
				$message = "Click <a href='http://localhost:3000/comp_dash/forgot_password.php?token=$token' >here</a to reset your password";

				//headers

				$headers = "MIME-Version: 1.0"."\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				//change it to your email address
				$headers .= 'From: <tawiahfrancis13@gmail.com>' ."\r\n"; 

				mail($to, $subject, $message, $headers);


				$msg ="<div class='alert alert-success'>Password reset link has been sent to the email</div>";
				
			}

		}

		else
		{
			$msg ="<div class='alert alert-danger'>User not found</div>";
		}
	}


 ?>