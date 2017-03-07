<?php
//list of students applied for a company
	require("db_connect.php");
	session_create();
  if (session_check()==true)
  { 
    if (isset($_SESSION['LoggedINAdmin']))
    {
    	$company_id = $_POST['cmpID'];
    	$query = "SELECT user.name,course.course_name,user.email,user.phone,user.trans_id from course,user,applied where applied.student_id=user.id and course.id=user.course and applied.company_id = $company_id";
    	$result=$con->query($query);
    	if($result->num_rows>0)
            {
              echo "<table class='colGreen driveTable striped'>";
              echo "<tr>";
              echo "<th>NAME</th><th>COURSE</th><th>EMAIL</th><th>PHONE</th><th>TRANS_ID</th>";
              echo "</tr>";
              
              while($row=$result->fetch_assoc())
              {
                echo "<tr>";
                echo "<td>".$row['name']."</td><td>".$row['course_name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['trans_id']."</td>";
                echo "</tr>";
              }   
              echo "</table>";
            }
            else
              echo "NO BODY HAS APPLIED";
    }
    else
      header("location:index.php");
  }
  else 
    header("location:index.php");

?>