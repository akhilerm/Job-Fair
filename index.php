<?php
	//url should be /index.php?switch=login
    session_start();
    include("header.php");

    if(!empty($_GET['switch']))
    {
    	if($_GET['switch']=='register')
        	include("register_view.php");
    }
    else 
        include("login_view.php");
    include("footer.php");

?>