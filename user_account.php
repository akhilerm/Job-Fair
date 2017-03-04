<?php
	session_start();
	require_once('db_connect.php');
	$verify=fetch_by_id($_SESSION['USER_ID']),$con);

	if($_SESSION['LOGIN']==1  && $_SESSION['PASSWORD']==$verify)	
	{
		//user's page

	}





?>