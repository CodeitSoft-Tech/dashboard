<?php

	include("includes/db_conn.php");



	$branch_name    = mysqli_real_escape_string($db, $_POST['branch_name']);
	$branch_region  = mysqli_real_escape_string($db, $_POST['branch_region']);
	$branch_status  = mysqli_real_escape_string($db, $_POST['branch_status']);


	$insert_branch = "INSERT INTO branches(branch_name, branch_region, branch_status)VALUES('$branch_name', '$branch_region', '$branch_status')";
	$run_branch = mysqli_query($db, $insert_branch)or die(mysqli_error($db));


	if($run_branch)
	{
		echo "<script>alert('New branch added successfully')</script>";
		echo "<script>document.location='branches.php'</script>";
	}

?>