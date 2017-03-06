<?php
    include("header.php");
    if(session_status() == PHP_SESSION_ACTIVE)
        sess_destroy();
    if(!empty($_GET['switch']))
    {
    	if($_GET['switch']=='register')
        	include("register_view.php");
        else if($_GET['switch']=='next')
        	include("register1_view.php");
    }
    else 
        include("login_view.php");
    include("footer.php");

?>