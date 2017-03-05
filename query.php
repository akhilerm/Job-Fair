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

	/*function fetch_course_id($course_name,$con)
	{
		$query= "select id from course where course_name='$course_name'";
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
	}*/

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

?>