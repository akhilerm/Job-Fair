<?php
	require_once('db_connect.php');
	require_once('query.php');
	session_create();
	if (session_check()==true)
	{	
		if (isset($_SESSION['LoggedINAdmin']))
		{	
			header("location:admin_view.php");	
		}	
	}	
?>