<?php

	include("includes/db_conn.php");

	$error = array();


	if(isset($_POST['register']))
   {

	$firstname  = mysqli_real_escape_string($db, $_POST['firstname']);
	$lastname	= mysqli_real_escape_string($db, $_POST['lastname']);
	$email 		= mysqli_real_escape_string($db, $_POST['email']);
	$contact    = mysqli_real_escape_string($db, $_POST['contact']);
	$role       = mysqli_real_escape_string($db, $_POST['role']);
	$branch     = mysqli_real_escape_string($db, $_POST['branch']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	$user_status = mysqli_real_escape_string($db, $_POST['user_status']);


	if($password_1 != $password_2)
	{
		$error[] = "Passwords do not match";

	}

	else
	{
	$password = md5($password_1);

	$sql = "INSERT INTO users(firstname, lastname, email, contact, role, branch, password, user_status)
	       VALUES('$firstname', '$lastname', '$email', '$contact', '$role', '$branch', '$password','$user_status')";

	$query = mysqli_query($db, $sql)or die(mysqli_error($db));


	if($query)
	{
		echo "<script>alert('Registration done succesfully')</script>";
		echo "<script>document.location='users.php'</script>";  
	}

	}

  }  


?>