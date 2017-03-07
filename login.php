<?php
	require_once('db_connect.php');
	require_once('query.php');
	session_create();
	if (session_check()==false)
	{	
		$email=cleanup($_POST['email'],$con);
		$password=cleanup($_POST['password'],$con);

		if($email!='' && $password!='')
		{
			$password=sha1($password);
			$verify=fetch_user($email,$password,$con);
			if(($verify == $password) && ($email=='rahulrajan113@gmail.com'))          //admin panel
			{
				session_set_admin();
				header("location:admin_panel.php");
				return;
			}
			if($verify==-1 || $verify != $password)
			{
				$_SESSION['MESSAGE']='This Combination Of Email and Password Does Not Exist.';
				header("location:index.php");
				return;
			}
			else if($verify == $password)
			{
				session_set_user();
				header("location:user_account.php");
				return;
			}
		}	
		else
		{
			$_SESSION['MESSAGE']="All Fields Are Mandatory";
			header("location:index.php");	
		}
	}
	else
	{
		if(isset($_SESSION['LoggedINAdmin']))
		{
			header("location:admin_panel.php");
		}
		else
		{	
			if (isset($_SESSION['LoggedINUser']))
			{
				header("location:user_account.php");
			}	
		}	
	}	
?>