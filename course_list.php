<?php 
  session_start();
  require_once("db_connect.php");
  require_once("query.php");
  if($_GET['temp']==1 && $_SESSION['FLAG_COURSE']==1)
  {
      $_SESSION['FLAG_COURSE']==0;
      $result=fetch_courses($con);
      if($result!=-1)
        echo '<option value="" disabled selected>Select Course</option>'.$result;
  }
  else
  {
    header("location:index.php");
    return;
  }

?>