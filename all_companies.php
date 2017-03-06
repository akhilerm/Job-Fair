<?php
	require("db_connect.php");
	require("admin_query.php");
	$company_id = $_POST['cmpID'];
	$query = "SELECT user.name,course.course_name,user.email,user.phone from course,user,applied where applied.student_id=user.id and course.id=user.course and applied.company_id = $company_id";
	$result=$con->query($query);
	if($result){
		while($row=$result->fetch_assoc()){
			?><tbody class="colGreen">
                      <tr >
                        <td>Name</td>
                        <td><?php echo $row['name'];  ?></td>
                          
                      </tr>
                      
                      <tr>
                        <td>Course</td>
                        <td><?php echo  $row['course_name']; ?></td>
                       
                      </tr>
                        
                      <tr>
                        <td>Email</td>
                        <td><?php echo $row['email'];  ?></td>
                       
                      </tr>
                        
                      <tr>
                        <td>Phone</td>
                        <td><?php echo  $row['phone']; ?></td>
                       
                      </tr>
                        
                    
                    </tbody>
		}
	}
	else{

	}

?>