<?php
	require_once("db_connect.php");
	
	function add_drive($course_id,$company_id,$backlog_history,$backlog_active,$cgpa,$percent,$con){
		$query = "INSERT INTO drives (company_id,course_id,backlog_history,backlog_active,cgpa,percent) VALUES ('$course_id','$company_id','$backlog_history','$backlog_active','$cgpa','$percent')";
		$result = $con->query($query);
		if($result)
			return 1;
		else
			return 0;
	}

	function add_drive_stream($company_id,$course_id,$stream_id,$con){
		$query = "INSERT INTO drive_stream (company_id,course_id,stream_id) VALUES ('$company_id','$course_id','$stream_id')";
		$result = $con->query($query);
		if($result)
			return 1;
		else
			return 0;
	}

	function add_company($company_name){
		$query = "INSERT INTO company (company_name) VALUES ('$company_name')";
		$result = $con->query($query);
		if($result)
			return 1;
		else
			return 0;
	}

	

?>