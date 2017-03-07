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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-91559516-4', 'auto');
  ga('send', 'pageview');

</script>
