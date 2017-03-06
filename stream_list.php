<?php 
  session_start();
  require_once("db_connect.php");
  require_once("query.php");

  $course_id=$_POST['course_id'];
  //if($_SESSION['FLAG_STREAM']==1)
  //{    
    // $_SESSION['FLAG_STREAM']==0;
     $result=fetch_stream($course_id,$con);
     //if($result!=-1)
        while($row=$result->fetch_assoc()){
          $temp1=$row['id'];
          $temp2=$row['stream_name'];
          ?>
          <option value="<?php echo $temp1; ?>"><?php echo $temp2; ?></option>
          <?php
        //}
  //}
  //else
    //header("location:index.php");
?>