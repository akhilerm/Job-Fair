<?php
//query to insert
session_start();
require_once("db_connect.php");
require_once("query.php");

$course=cleanup($_POST['course'],$con);
$stream=cleanup($_POST['stream'],$con);
$yop=cleanup($_POST['yop'],$con);
$current_sem=cleanup($_POST['sem'],$con);
$college=cleanup($_POST['college'],$con);
$cgpa=cleanup($_POST['cgpa'],$con);
$sslc=cleanup($_POST['sslc'],$con);
$backlog=cleanup($_POST['backlog'],$con);
$hsc=cleanup($_POST['hsc'],$con);
$resume=cleanup($_POST['resume'],$con);
))
 if((!empty($_SESSION['NEW_USER']['PASSWORD'])) && (!empty($_SESSION['NEW_USER']['NAME'])) && (!empty($_SESSION['NEW_USER']['EMAIL'])) && (!empty($_SESSION['NEW_USER']['DOB'])) && (!empty($_SESSION['NEW_USER']['PHONE']))  )
  {
  	if((!empty($course)) && (!empty($stream)) && (!empty($yop))  && (!empty($college)) && (!empty($sslc)) && (!empty($resume)))
  	{
	      if(strlen($phone)==10)
	      {  
	        if(strcmp($password,$repassword)==0)
	        {
	           if(strlen($password)>=8 && strlen($repassword)>=8)
	           {
	                //code for inserting 
	           		$verify=insert_user($_SESSION['NEW_USER']['NAME'],$_SESSION['NEW_USER']['PASSWORD'],$course,$stream,$yop,$current_sem,$_SESSION['NEW_USER']['EMAIL'],$college,$_SESSION['NEW_USER']['PHONE'],$_SESSION['NEW_USER']['DOB'],$backlog,$cgpa,$percent,$sslc,$hsc,$resume,$con);
	           		if($verify==-1)
	           		{
	           			$_SESSION['MESSAGE']="Couldn't Add You . Please Try Again";
	           			header("location:index.php");
	           		}
	           		else if($verify==-2)
	           		{
	           			$_SESSION['MESSAGE']="User Already Exists";
	           			header("location:index.php");
	           		}
	           		else
	           		{
	           			$_SESSION['MESSAGE']="Successful Registration. Your ID is :".$verify;
	           			header("location:index.php");
	           		}
	           }
	           else
	           {
	              $_SESSION['MESSAGE']='Password Should Contain Atleast 8 Characters';
	              header("location:index.php?switch=register");
	              return;
	           }
	        }
	        else
	        {
	          $_SESSION['MESSAGE']='PASSWORD AND RETYPE NOT MATCHING';
	          header("location:index.php?switch=register");
	          return;
	        }
	      } 
	      else
	      {
	          $_SESSION['MESSAGE']='PHONE NUMBER SHOULD BE OF LENGTH 10';
	          header("location:index.php?switch=register");
	          return;
	      }
    }
    else
    {
    	$_SESSION['MESSAGE']='ALL FIELDS ARE MANDATORY';                      //should be checked
    	$_SESSION['NEXT']=1;
    	header("location:index.php?switch=next");
    	return;
    }
  }
  else
  {
    $_SESSION['MESSAGE']='ALL FIELDS ARE MANDATORY';
    header("location:index.php?switch=register");
    return;
  }

?>