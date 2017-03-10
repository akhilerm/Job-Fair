<?php
	require_once("db_connect.php");
	require_once("query.php");
    session_create();
    if(session_check()==true)
    {	
		if(isset($_SESSION['LoggedINUser']) && $_SESSION['LoggedINUser']==1)
		{
			if(!empty($_POST['update_id']))
			{
				$update_id=cleanup($_POST['update_id'],$con);
				$query = "UPDATE user set trans_id='".$update_id."' where id=".$_SESSION['USER_ID'];
				$result=$con->query($query);
				if($result)
				{
					header("location:user_account.php");
				}
				else
					header("location:user_account.php");	
			}
			else
			{
				header("location:user_account.php");
			}
		}
		else
		{
			header("location:user_account.php");
		}
	}
	else
	{
		header("location:user_account.php");
	}
	

?>