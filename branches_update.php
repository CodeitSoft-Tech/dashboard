<?php

	include("includes/db_conn.php");

	$branch_id 		= mysqli_real_escape_string($db, $_POST['branch_id']);
	$branch_name  	= mysqli_real_escape_string($db, $_POST['branch_name']);
	$branch_region  = mysqli_real_escape_string($db, $_POST['branch_region']);
	$branch_status  = mysqli_real_escape_string($db, $_POST['branch_status']);


	$update_branch = "UPDATE branches SET branch_name = '$branch_name', branch_region = '$branch_region', branch_status = '$branch_status' WHERE branch_id = '$branch_id'";

	$run_branch = mysqli_query($db, $update_branch);


	if($run_branch)
	{
		echo "<script>alert('Branch details updated successfully')</script>";
		echo "<script>document.location='branches.php'</script>";
	}



?>