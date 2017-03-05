<?php
	require("db_connect.php");
	$company_name=$_POST['name'];
	$query = "INSERT INTO company (company_name) VALUES ('$company_name')";
	return 0;
?>