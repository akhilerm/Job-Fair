<?php
	require_once("db_connect.php");
	session_create();
	if (session_check()==true)
	{ 
		if (isset($_SESSION['LoggedINAdmin']))
		{	
			//$company_id = $_POST['exportid'];
			//$select = "SELECT user.name, course.course_name,stream.stream_name, user.email,user.phone,user.college,user.cgpa,user.percent,user.sslc,user.hsc,user.trans_id from user,course,stream,applied where applied.student_id = user.id and user.course = course.id and user.stream = stream.id and applied.company_id=$company_id";
    		header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=file.csv");
header("Pragma: no-cache");
header("Expires: 0");

echo "record1,record2,record3\n";

			
		}
		else
			header("location:index.php");
	}
	else
		header("location:index.php");
?>