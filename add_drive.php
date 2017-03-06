<?php
	require("db_connect.php");
	require("admin_query.php");
	require("query.php");
	session_create();
	if(session_check()==true)
	{
		if($_SESSION['LoggedINAdmin']==1)
		{
			$company_id = $_POST['company2'];
			$course_id = $_POST['course2'];
			$backlog = $_POST['backlog'];
			$cgpa = $_POST['cgpa'];
			$perc = $_POST['perc'];
			add_drive($course_id,$company_id,$backlog,$cgpa,$perc,$con);
			header("location:admin_panel.php");
		}
		else
			header("location:index.php");
	}
	else
		header("location:index.php");	
?>