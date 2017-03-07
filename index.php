<?php
    include("header.php");
    require_once("db_connect.php");
    session_create();
    if(isset($_SESSION['LoggedINAdmin']))
    {
        header("location:admin_panel.php");
    }
    else if (isset($_SESSION['LoggedINUser']))
    {   
        header("location:user_account.php"); 
    }   

    if(!empty($_GET['switch']))
    {
    	if($_GET['switch']=='register')
    	{
        	include("register_view.php");
       	}
        else if($_GET['switch']=='next')
        	include("register1_view.php");
    }
    else 
        include("login_view.php");
    include("footer.php");

?>
