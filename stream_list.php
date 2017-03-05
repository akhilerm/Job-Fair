<?php 
  session_start();
  require_once("db_connect.php");
  require_once("query.php");

  $course_id=cleanup($_GET['course_id'],$con);
  if($_GET['temp']==2 && !empty($course_id) && $_SESSION['FLAG_STREAM']==1)
  {    
     $_SESSION['FLAG_STREAM']==0;
     $result=fetch_stream($course_id,$con);
     if($result!=-1)
        echo $result;
     else
        header("location:index.php");
  }
  else
    header("location:index.php");
?>