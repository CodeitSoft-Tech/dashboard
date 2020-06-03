<?php
	
	include("includes/db_conn.php");

	$company_logo  = mysqli_real_escape_string($db, $_POST['company_logo']);
	$company_name  = mysqli_real_escape_string($db, $_POST['company_name']);
	$region    	   = mysqli_real_escape_string($db, $_POST['company_region']);
	$location      = mysqli_real_escape_string($db, $_POST['company_location']);
	$contact_1     = mysqli_real_escape_string($db, $_POST['contact_1']);
	$contact_2     = mysqli_real_escape_string($db, $_POST['contact_2']);
	$contact_3     = mysqli_real_escape_string($db, $_POST['contact_3']);
	$email_1       = mysqli_real_escape_string($db, $_POST['email_1']);
	$email_2       = mysqli_real_escape_string($db, $_POST['email_2']);
	$status    	   = mysqli_real_escape_string($db, $_POST['company_status']);


	

?>