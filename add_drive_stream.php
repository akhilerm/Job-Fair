<?php
	require("db_connect.php");
	require("admin_query.php");
	session_create();
	if(session_check()==true)
	{
		if($_SESSION['LoggedINAdmin']==1)
		{
			$company_id = $_POST['company3'];
			$stream_id = $_POST['stream3'];
			add_drive_stream($company_id,$stream_id,$con);
			header("location:admin_panel.php");
		}
		else
			header("location:index.php");
	}
	else
		header("location:index.php");	
?>