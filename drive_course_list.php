<?php
	require("db_connect.php");
	$companyid = $_POST['cmpid'];
	$query = "SELECT drives.course_id,course.course_name from drives,course where drives.course_id=course.id and drives.company_id = $companyid";
	$result = $con->query($query);
	if($result){
		$string="";
		while ($row=$result->fetch_assoc()) 
		{
			$temp1=$row['course_id'];
			$temp2=$row['course_name'];
			?>
			<option value ="<?php echo $temp1; ?>"><?php echo $temp2; ?></option>"
			<?php
		}
		return $string;
	}
	else
	{
		?>
		<option value = '0'>Not Available</option>
		<?php
	}

?>