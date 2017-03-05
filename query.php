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

	function fetch_courses($con)
	{
		$query="select * from course";
		$result=$con->query($query);
		if($result)
		{
			if($result->num_rows>0)
			{
				$string='';
				while($row= $result->fetch_assoc())
					$string.='<option value='.$row['id'].'>'.$row['course_name'].'</option>';
				return $string;
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

	function fetch_stream($course_id,$con)
	{
		$query= 'select * from stream where course_id='.$course_id;
		$result=$con->query($query);
		if($result)
		{
			if($result->num_rows>0)
			{
				$string='';
				while($row= $result->fetch_assoc())
					$string.='<option value='.$row['id'].'>'.$row['stream_name'].'</option>';
				return $string;
			}
			else
				return -1;
		}
		else
			return -1;
	}

	function fetch_usr_drive()				// fetches drives available for user
	{



	}

	function  insert_user($name,$password,$course,$stream,$yop,$current_sem,$email,$college,$phone,$dob,$backlog,$cgpa,$percent,$sslc,$hsc,$resume,$con)
	{
		$user_id=get_user_id($email,$con);
		if($user_id!=-1)
		{
			$query="INSERT INTO user (name,password,course,stream,yop,current_sem,email,college,phone,dob,backlog,cgpa,percent,sslc,hsc,resume)";
			$result=$con->query($query);
			if($result)
				return get_user_id($email,$con);
			else
				return -1;
		}
		else
			return  -2 ;
	}
?>