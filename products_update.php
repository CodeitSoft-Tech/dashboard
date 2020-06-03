<?php

	include("includes/db_conn.php");

	$product_id 	 = mysqli_real_escape_string($db, $_POST['product_id']);
	$product_name  	 = mysqli_real_escape_string($db, $_POST['product_name']);
	$product_status  = mysqli_real_escape_string($db, $_POST['product_status']);


	$update_product = "UPDATE products SET product_name = '$product_name', product_status = '$product_status' WHERE product_id = '$product_id'";

	$run_product = mysqli_query($db, $update_product);


	if($run_product)
	{
		echo "<script>alert('Product details updated successfully')</script>";
		echo "<script>document.location='products.php'</script>";
	}



?>