<?php
	session_start();
	require_once('db_connect.php');
	require_once('query.php');

	$email=cleanup($_POST['email'],$con);
	$password=cleanup($_POST['password'],$con);

	if($email!='' && $password!='')
	{
		$password=sha1($password);
		$verify=fetch_user($email,$password,$con);
		if(($verify == $password) && ($email=='pranavshenoy06@gmail.com'))          //admin panel
		{
			$_SESSION['LOGIN']=2;               //2  for admin
			$_SESSION['PASSWORD']=$password;
			unset($_SESSION['MESSAGE']);
			header("location:admin_panel.php");
			return;
		}
		if($verify==-1 || $verify != $password)
		{
			$_SESSION['MESSAGE']='This combination of email and password does not exist.';
			header("location:index.php");
			return;
		}
		else if($verify == $password)
		{
			$_SESSION['LOGIN']=1;
			unset($_SESSION['MESSAGE']);
			$_SESSION['PASSWORD']=$password;
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