<?php
	session_start();
	require_once('db_connect.php');
	require_once('query.php');

	$email=cleanup($_POST['email'],$con);
	$password=cleanup($_POST['password'],$con);

	if($email!='' && $password!='')
	{
		$verify=fetch_user($email,$password,$con);
		if($verify==-1 || $verify != $password)
		{
			$_SESSION['MESSAGE']='This combination of email and password does not exist.';
			header("location:index.php");
			return;
		}
		else
		{
			unset($_SESSION['MESSAGE']);
			header("location:user_account.php");
			return;
		}
	}	
	else
	{
		$_SESSION['MESSAGE']="ALL FIELDS ARE MANDATORY!";
		header("location:index.php");	

	}



?>