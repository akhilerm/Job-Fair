<?php
	require_once("db_connect.php");
	require_once("query.php");
    session_create();
  	if(session_check()==true)
  	{
	    if($_SESSION['LoggedINUser']==1)
	    {
	    	$user_id=$_SESSION['USER_ID'];
	    	$company=$_POST['C_ID'];
	    	$query="select * from applied where student_id=".$user_id." and company_id=".$company;
	    	$result=$con->query($query) ;				
			if($result)
			{
				if($result->num_rows>0)
				{
					echo "You Have Already Registered.";
				}
				else
				{
					$query1="select count(*) as count from applied where student_id=".$user_id;
			    	$result1=$con->query($query1);
			    	if($result1)
			    	{
			    		$row1=$result1->fetch_assoc();
			    		if($row1['count']<4)
			    		{
					    	$query= "insert into applied (student_id, company_id) values (".$user_id.",".$company.")";
				    		$result=$con->query($query);
							if($result)
							{
								echo "Successfully Applied" ;	
							}
							else
							{
								echo "Something Went Wrong.Please Try Again.";	
							}
						}
						else
						{
							
							echo "Maximum of 4 companies applied.";
							
						}
					}
					else
					{
						header("location:user_account.php");	
					}
				}
			}
			else
			{
				echo "Something Went Wrong.Please Try Again.";
			}
		}
		else
	    	header("location:user_account.php");

    }
    else
    	header("location:user_account.php");
?>