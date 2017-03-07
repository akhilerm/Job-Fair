<?php
	require_once('db_connect.php');
	require_once('query.php');
	session_create();
	if (session_check()==true  && isset($_SESSION['LoggedINAdmin']))
	{	
		if ($_SESSION['LoggedINAdmin']==1)
		{	
			header("location:admin_view.php");	
		}
		else
		{
			header("location:index.php");	
		}	
	}	
	else
	{
		header("location:index.php");
	}
?>