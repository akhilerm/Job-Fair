<?php 
  require_once("db_connect.php");
  require_once("query.php");
  
  $query="select * from course";
  $result=$con->query($query);
    if($result)
    {
      if($result->num_rows>0)
      {
        ?>
        <option value="" disabled selected> Select Course</option>
         <?php
        while($row= $result->fetch_assoc())
        {
          ?>
          <option value="<?php echo $row['id'] ?>"> <?php echo  $row['course_name']?> </option>
          <?php
        }
      }
      else
      {
        ?>
        <option value="" disabled selected>No Courses</option>
        <?php
      }
    }
    else
    {
      ?>
      <option value="" disabled selected>No Courses 1</option>  
      <?php  
    }    


?>