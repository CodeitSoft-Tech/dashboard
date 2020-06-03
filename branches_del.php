<?php

	include("includes/db_conn.php");


	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['branch_id']);


		$delete_branch = "DELETE FROM branches WHERE branch_id = '$id'";
		$run_branch = mysqli_query($db, $delete_branch);


		if($run_branch)
		{
			echo "<script>alert('Branch deleted successfully')</script>";
		    echo "<script>document.location='branches.php'</script>";
		}
	}

?>