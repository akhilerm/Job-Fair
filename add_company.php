<?php
	require("db_connect.php");
	require("admin_query.php");
	$company_name=$_POST['full_name'];
	$result=add_company($con);
	header("location:index.php/admin_view.php");
?>