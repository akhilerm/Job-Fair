<?php	
  require_once("db_connect.php");
  require_once("query.php");
  if($_GET['temp']==1)
  {
  	  $result=fetch_courses($con);
  	  if($result!=-1)
  	  	echo '<option value="" disabled selected>Select Stream</option>'.$result;
  	  else
  	  	echo "-1";
  }
  else
  {
  	echo "-1";
  	return;
  }

?>