<?php
	require("db_connect.php");
	$company_name=$_GET['name'];
	$query = "INSERT INTO company (company_name) VALUES ('$company_name')";
	return 0;
?>