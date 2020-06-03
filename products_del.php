<?php

	include("includes/db_conn.php");


	if(isset($_POST['delete']))
	{
		$id = mysqli_real_escape_string($db, $_POST['product_id']);


		$delete_product = "DELETE FROM products WHERE product_id = '$id'";
		$run_product = mysqli_query($db, $delete_product);


		if($run_product)
		{
			echo "<script>alert('Product deleted successfully')</script>";
		    echo "<script>document.location='products.php'</script>";
		}
	}

?>