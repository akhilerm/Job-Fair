<?php
	require("db_connect.php");
	require("admin_query.php");
	$company_id = $_POST['company3'];
	$stream_id = $_POST['stream3'];
	add_drive_stream($company_id,$stream_id,$con);
	header("location:admin_panel.php");
?>