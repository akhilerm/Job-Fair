<?php
	require_once("db_connect.php");
	
	function add_drive($course_id,$company_id,$backlog_active,$cgpa,$percent,$con){
		$query = "INSERT INTO drives (company_id,course_id,backlog_active,cgpa,percent) VALUES ($company_id,$course_id,$backlog_active,$cgpa,$percent)";
		$result = $con->query($query);
		if($result)
			return 1;
		else
			return 0;
	}

	function add_drive_stream($company_id,$stream_id,$con){
		$query = "INSERT INTO drive_stream (company_id,stream_id) VALUES ($company_id,$stream_id)";
		$result = $con->query($query);
		if($result)
			return 1;
		else
			return 0;
	}

	function add_company($con){
		$company_name = $_POST['full_name'];
		$query = "INSERT INTO `company` (`id`, `company_name`) VALUES (NULL, '$company_name');";
		$result = $con->query($query);
		if($result)
			return 1;
		else
			return  0; 
	}

	function get_company_name($company_id,$con){
		$query = "SELECT company_name from company where company_id=$company_id";
		$result = $con->query($query);
		if($result){
			$row = $result->fetch_assoc();
			return $row['company_name'];
		}
		else
			return 0;
	}

	function get_all_company($con){
		$query = "SELECT * from company";
		$result = $con->query($query);
		if($result){
			return $result;
		}
		else
			return 0;
	}

	function get_all_courses($con){
		$query = "SELECT * FROM course";
		$result = $con->query($query);
		return $result;
	}

	function search_user($email,$phone,$user_id,$con){
		$query = "SELECT * from user where email ='$email' OR phone = $phone OR id = $user_id";
		$result = $con->query($query);
		if($result){
			$row = $result->fetch_assoc();
			return $row;
		} 
		else
			return -1;
	}

	function reset_password($user_id,$con){
		$query = "UPDATE user SET password = sha1('12345678') WHERE id = $user_id";
		$result = $con->query(query);
		if($result)
			return 1;
		else
			return 0;
	}

?>