<?php
	require_once("db_connect.php");
	require_once("admin_query.php");
	session_create();
  	if (session_check()==true)
  	{ 
    	if (isset($_SESSION['LoggedINAdmin']))
    	{
			$result = get_all_company($con);
			$string="<option value='' disabled selected>Select Course</option>";
			
			while($row=$result->fetch_assoc()){
				$string=$string."<option value='".$row['id']."'>".$row['company_name']."</option>";
			}
			echo $string;
		}
		else
			header("location:index.php");
	}
	else
		header("location:index.php");	
?>