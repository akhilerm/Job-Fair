<?php
	require("db_connect.php");
	require("admin_query.php");
	require("query.php");
	session_create();
	if(session_check()==true)
	{
		if($_SESSION['LoggedINAdmin']==1)
		{
			$company_name=$_POST['full_name'];
			$result=add_company($con);
			$_SESSION['PASSWORD']=fetch_by_id(10001,$con);
			$_SESSION['LOGIN']==2;
			$_SESSION['USER_ID']==10001;
			header("location:admin_panel.php");
		}
		else
			header("location:index.php");
	}
	else
		header("location:index.php");
?>