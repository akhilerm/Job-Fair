<?php	
  require_once("db_connect.php");
  require_once("query.php");
  if($_GET['temp']==1)
  {
  	  $result=fetch_courses($con);
  	  if($result!=-1)
  	  	echo $result;
  	  else
  	  	echo "No courses";
  }
  else
  {
  	echo "No courses";
  	return;
  }

?>