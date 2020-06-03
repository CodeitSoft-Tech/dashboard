<?php 

	include("includes/db_conn.php");

	$user_id	= mysqli_real_escape_string($db, $_POST['user_id']);
	$firstname  = mysqli_real_escape_string($db, $_POST['firstname']);
	$lastname	= mysqli_real_escape_string($db, $_POST['lastname']);
	$email 		= mysqli_real_escape_string($db, $_POST['email']);
	$contact    = mysqli_real_escape_string($db, $_POST['contact']);
	$role       = mysqli_real_escape_string($db, $_POST['role']);
	$branch     = mysqli_real_escape_string($db, $_POST['branch']);
	$user_status = mysqli_real_escape_string($db, $_POST['user_status']);
	


	$update = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$email', contact = '$contact', role = '$role', branch = '$branch', user_status = '$user_status' WHERE user_id = '$user_id'";
	$run_update = mysqli_query($db, $update) or die(mysqli_error($db));
	

	if($run_update)
	{
		echo "<script>alert('Update done succesfully!')</script>";
		echo "<script>document.location='users.php' </script>";
	}



?>