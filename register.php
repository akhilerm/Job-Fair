
<?php
require_once("db_connect.php");
require_once("query.php");
session_create();

$course=cleanup($_POST['course'],$con);
$stream=cleanup($_POST['stream'],$con);
$yop=cleanup($_POST['yop'],$con);
$college=cleanup($_POST['college'],$con);
$sslc=cleanup($_POST['sslc'],$con);

if($course!=108)
{
	$current_sem=cleanup($_POST['sem'],$con);
	$mark=cleanup($_POST['c_p'],$con);
	$backlog=cleanup($_POST['backlog'],$con);
	$hsc=cleanup($_POST['hsc'],$con);
	$mark_radio=cleanup($_POST['mark'],$con);
	if($mark_radio=='c')
	{
		$cgpa=$mark;
		$percent=0;
	}
	else if($mark_radio=='p')
	{
		$percent=$mark;
		$cgpa=0;
	}
}
else
{
	$current_sem=0;
	$mark=0;
	$backlog=0;
	$hsc=0;
	$cgpa=10;
	$percent=100;
}

 if((!empty($_SESSION['NEW_USER']['PASSWORD'])) && (!empty($_SESSION['NEW_USER']['NAME'])) && (!empty($_SESSION['NEW_USER']['EMAIL'])) && (!empty($_SESSION['NEW_USER']['DOB'])) && (!empty($_SESSION['NEW_USER']['PHONE']))  )
  {
  	if((!empty($course)) && (!empty($stream)) && (!empty($yop))  && (!empty($college)) && (!empty($sslc)))
  	{
	      if(strlen($_SESSION['NEW_USER']['PHONE'])==10)
	      {  
	        if(strcmp($_SESSION['NEW_USER']['PASSWORD'],$_SESSION['NEW_USER']['REPASSWORD'])==0)
	        {
	           if(strlen($_SESSION['NEW_USER']['PASSWORD'])>=8 && strlen($_SESSION['NEW_USER']['REPASSWORD'])>=8)
	           {
	                //code for inserting 
           			$uploaddir = './resume/';
					$filename = $_FILES['file_up']['name'];
					$ext = pathinfo($filename, PATHINFO_EXTENSION);
					if($ext=='pdf')
					{	
						$verify=insert_user($_SESSION['NEW_USER']['NAME'],$_SESSION['NEW_USER']['PASSWORD'],$course,$stream,$yop,$current_sem,$_SESSION['NEW_USER']['EMAIL'],$college,$_SESSION['NEW_USER']['PHONE'],$_SESSION['NEW_USER']['DOB'],$backlog,$cgpa,$percent,$sslc,$hsc,$con);
		           		if($verify==-1)
		           		{
		           			$_SESSION['MESSAGE']="Couldn't Add You . You Might Have Already Registered With Same Credentials";
		           			header("location:index.php?switch=register");
		           			return;
		           		}
		           		else if($verify==-2)
		           		{
		           			$_SESSION['MESSAGE']="User Already Exists";
		           			header("location:index.php?switch=register");
		           			return;
		           		}
		           		else
		           		{
		           			$uploadfile = $uploaddir . basename($verify.".".$ext);
							if (file_exists($uploadfile)) 
							{
								$_SESSION['MESSAGE']="File Already Exists";
	           					header("location:index.php?switch=register");	
	           					return;
							}
							if (move_uploaded_file($_FILES['file_up']['tmp_name'], $uploadfile))
							{
								$_SESSION['MESSAGE']="Successful Registration. Your ID is :".$verify;
		           				header("location:index.php");
		           				return ;
							}
							else
							{
								$_SESSION['MESSAGE']="Registration Failed.";
		           				header("location:index.php?switch=register");
		           				return ;
							}
		           		}
					}
					else
					{
						$_SESSION['MESSAGE']='Only pdf Files Can Be Uploaded';
	              		header("location:index.php?switch=register");
	              		return;
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
	          $_SESSION['MESSAGE']='Password Not Matching With Retype';
	          header("location:index.php?switch=register");
	          return;
	        }
	      } 
	      else
	      {
	          $_SESSION['MESSAGE']='Enter a Valid Phone Number';
	          header("location:index.php?switch=register");
	          return;
	      }
    }
    else
    {
    	$_SESSION['MESSAGE']='All Fields Are Mandatory inner';                      //should be checked
    	//$_SESSION['NEXT']=1;
    	header("location:index.php?switch=register");
    	return;
    }
  }
  else
  {
    $_SESSION['MESSAGE']='All Fields Are Mandatory outer';                //delete
    header("location:index.php?switch=register");
    return;
  }

?>