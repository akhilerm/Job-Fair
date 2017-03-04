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
		$query="select * from user where id=$userid";
		$result=$con->query($query);
		if($result)
		{
			if($result->num_rows>0)
			{
				$row=$result->fetch_assoc();
				$_SESSION['USER_ID']=$row[id];
				return $row['password'];
			}
			else
				return -1;
		}
		else
			return -1;
	}



?>