<?php
	function fetch_user($email,$password,$con)
	{
		$query="select id,password from user where email='$email' and password='$password'";
		$result=$con->query($query);
		if($result)
		{
			if($result->num_rows>0)
			{
				$row=$result->fetch_assoc();
				$_SESSION['USER_ID']=$row['id'];
				return $row['password'];
			}
			else
				return -1;
		}
		else
			return -1;
	}

	function fetch_by_id($user_id,$con)
	{
		$query="select * from user where id=$user_id";
		$result=$con->query($query);
		if($result)
		{
			if($result->num_rows>0)
			{
				$row=$result->fetch_assoc();
				return $row['password'];
			}
			else
				return -1;
		}
		else
			return -1;
	}

	function get_user_id($email,$con)
	{
		$query= "select id from user where email='$email'";
		$result=$con->query($query);
		if($result)
		{
			if($result->num_rows>0)
			{
				$row= $result->fetch_assoc();
				return $row['id'];
			}
			else
				return -1;
		}
		else
			return -1;
	}


	function  insert_user($name,$password,$course,$stream,$yop,$current_sem,$email,$college,$phone,$dob,$backlog,$cgpa,$percent,$sslc,$hsc,$con)
	{
		$user_id=get_user_id($email,$con);
		if($user_id==-1)
		{
			$query="INSERT INTO user (name,password,course,stream,yop,current_sem,email,college,phone,dob,backlog,cgpa,percent,sslc,hsc) values ('$name','$password',$course,$stream,$yop,$current_sem,'$email','$college','$phone','$dob',$backlog,$cgpa,$percent,$sslc,$hsc)";
			$result=$con->query($query) or die(mysqli_error());                
			if($result)
				return get_user_id($email,$con);
			else
				return -1;
		}
		else
			return  -2 ;
	}
?>