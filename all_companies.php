<?php
	require("db_connect.php");
	session_create();
  if (session_check()==true)
  { 
    if (isset($_SESSION['LoggedINAdmin']))
    {
    	$company_id = $_POST['cmpID'];
    	$query = "SELECT user.name,course.course_name,user.email,user.phone,user.trans_id from course,user,applied where applied.student_id=user.id and course.id=user.course and applied.company_id = $company_id";
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
                          <tr>
                            <td>Transaction</td>
                            <td><?php echo  $row['trans_id']; ?></td>
                           
                          </tr>
                            
                        
                        </tbody>
    		<?php
        }
    	}
    	else{
           ?><h6>Not Available</h6><?php
    	}
    }
    header("location:index.php");
  }
  header("location:index.php");

?>