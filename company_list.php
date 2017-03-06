<?php
	require_once("db_connect.php");
	require_once("admin_query.php");
	$result = get_all_company($con);
	$string="<option value='' disabled selected>Select Course</option>";
	
	while($row=$result->fetch_assoc()){
		$string=$string."<option value='".$row['id']."'>".$row['company_name']."</option>";
	}
	echo $string;
?>