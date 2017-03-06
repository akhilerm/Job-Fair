<?php
	session_start();
	require_once("db_connect.php");
	require_once("query.php");
    $_SESSION['APPLY_FLAG']=1;															//delete
    if($_SESSION['APPLY_FLAG']==1 && isset($_SESSION['USER_ID']))
    {
    	$_SESSION['APPLY_FLAG']=0;

    	$query="select * from applied where student_id=".$_SESSION['USER_ID']." and company_id=".$_GET['company'];
    	$result=$con->query($query) ;				
		if($result)
		{
			if($result->num_rows>0)
				echo -2;
			else
			{
				$query= "insert into applied (student_id, company_id) values (".$_SESSION['USER_ID'].",".$_GET['company'].")";
	    		$result=$con->query($query);
				if($result)
					echo 0;
				else
					echo -1;
			}
		}
		else
			echo -3;
    	
    }
    else
    	header("location:user_account.php");

?>