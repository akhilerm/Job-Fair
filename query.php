<?php
	function fetch_user($email,$password,$con)
	{
		$query="select password from user where email='$email' and password='$password'";
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


?>