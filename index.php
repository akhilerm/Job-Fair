<?php
	//url should be /index.php?switch=login
    session_start();
    include("header.php");

    if($_GET['switch']=='register')
        include("register_view.php"); 
    else if($_GET['switch']=='login')
        include("login_view.php");
    include("footer.php");

?>