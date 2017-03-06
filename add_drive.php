<?php
session_start();
	require("db_connect.php");
	require("admin_query.php");
	require("query.php");
	$company_id = $_POST['company2'];
	$course_id = $_POST['course2'];
	$backlog = $_POST['backlog'];
	$cgpa = $_POST['cgpa'];
	$perc = $_POST['perc'];
	add_drive($course_id,$company_id,$backlog,$cgpa,$perc,$con);
	$_SESSION['PASSWORD']=fetch_by_id(10001,$con);
	$_SESSION['LOGIN']==2;
	$_SESSION['USER_ID']==10001;
	header("location:admin_panel.php");
?>