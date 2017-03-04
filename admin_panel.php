<?php
	session_start();
	require_once('db_connect.php');
	require_once('query.php');
	
	$verify=fetch_by_id(($_SESSION['USER_ID']),$con);

	if($_SESSION['LOGIN']==2 && $_SESSION['PASSWORD']==$verify  && $_SESSION['USER_ID']==10001) //manually enter userid value values
	{
		include("admin_panel_view.php");
		unset($_SESSION['LOGIN']);
		unset($_SESSION['PASSWORD']);
		unset($_SESSION['USER_ID']);
		return;
	}
	else
	{
		$_SESSION['MESSAGE']="LOGIN FAILED".$_SESSION['LOGIN']." ".$_SESSION['PASSWORD']." ".$_SESSION['USER_ID'];
		header("location:index.php");
	}	

?>