<?php	
  require_once("db_connect.php");
  require_once("query.php");

  $course_id=cleanup($_GET['course_id'],$con);
  if($_GET['temp']==2 && !empty($course_id))
  {  	 
     $result=fetch_stream($course_id,$con);
     if($result!=-1)
        echo $result;
     else
        echo "-1";
  }
  else
  	echo "-1";
?>