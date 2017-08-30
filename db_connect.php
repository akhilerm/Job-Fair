	<?php
	define('DB_HOST', 'localhost'); 
	define('DB_NAME', ''); 
	define('DB_USER',''); 
	define('DB_PASSWORD',''); 
	$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysql_error()); 
	
	function cleanup ($str1,$con)
	{
		$str1=mysqli_real_escape_string($con,$str1);
		$str1=strip_tags($str1);
		$str1=addslashes($str1);
		return $str1;
	}
	function session_create()
	{
		session_start();
	}
	function session_set_user()
	{
		$_SESSION['LoggedINUser']=1;
	}
	function session_set_admin()
	{
		$_SESSION['LoggedINAdmin']=1;
	}
	function session_check()
	{
		if(isset($_SESSION['LoggedINUser']))
		{
			
			if ($_SESSION['LoggedINUser']==1)
			{
				session_regenerate_id();
				return true;
			}	
			return false;
		}
		else if(isset($_SESSION['LoggedINAdmin']))
		{
			if($_SESSION['LoggedINAdmin']==1)
			{
				session_regenerate_id();
				return true;
			}
			return false;
		}	
		else
			return false;
	}
	function sess_destroy()
	{
 		if (isset($_SESSION['LoggedINAdmin']))
 		{
 			unset($_SESSION['LoggedINAdmin']);
 		}
 		if (isset($_SESSION['LoggedINUser']))
 		{
 			unset($_SESSION['LoggedINUser']);
 		}	
 		session_destroy();
	}
	?>
