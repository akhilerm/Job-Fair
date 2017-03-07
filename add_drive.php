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
			if(!empty($_POST['backlog']))   $backlog = $_POST['backlog'];
			else $backlog = 0;
			if(!empty($_POST['cgpa']))  $cgpa = $_POST['cgpa'];
			else  $cgpa =0;
			if(!empty($_POST['perc']))   $perc = $_POST['perc'];
			else  $perc = 0;
			add_drive($course_id,$company_id,$backlog,$cgpa,$perc,$con);
			header("location:admin_panel.php");
		}
		else
			header("location:index.php");
	}
	else
		header("location:index.php");	
?>