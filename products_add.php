<?php

	include("includes/db_conn.php");



	$product_name    = mysqli_real_escape_string($db, $_POST['product_name']);
	$product_status  = mysqli_real_escape_string($db, $_POST['product_status']);


	$insert_product = "INSERT INTO products(product_name, product_status)VALUES('$product_name', '$product_status')";
	$run_product = mysqli_query($db, $insert_product)or die(mysqli_error($db));


	if($run_product)
	{
		echo "<script>alert('New product added successfully')</script>";
		echo "<script>document.location='products.php'</script>";
	}

?>