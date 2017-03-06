<?php
	require("db_connect.php");
	require("admin_query.php");
	$company_id = $_POST['company2'];
	$course_id = $_POST['course2'];
	$backlog = $_POST['backlog'];
	$cgpa = $_POST['cgpa'];
	$perc = $_POST['perc'];
	add_drive($course_id,$company_id,$backlog,$cgpa,$perc,$con);
	header("location:index.php/admin_view.php");
?>