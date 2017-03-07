<?php
	require("db_connect.php");
	session_create();
  	if (session_check()==true)
  	{ 
    	if (isset($_SESSION['LoggedINAdmin']))
    	{
			$companyid = $_POST['cmpid'];
			$query = "SELECT drives.course_id,course.course_name from drives,course where drives.course_id=course.id and drives.company_id = $companyid";
			$result = $con->query($query);
			?><option value="0" disabledselected>Select Course</option><?php
			if($result){
				while ($row=$result->fetch_assoc()) 
				{
					$temp1=$row['course_id'];
					$temp2=$row['course_name'];
					?>
					<option value ="<?php echo $temp1; ?>"><?php echo $temp2; ?></option>"
					<?php
				}
			}
			else
			{
				?>
				<option value = '0'>Not Available</option>
				<?php
			}
		}
		else
			header("location:index.php");
	}
	else
		header("location:index.php");

?>