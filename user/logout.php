<?php
require_once('db_connect.php');
session_create();
if (session_check()==true)
{
  sess_destroy();
  header("location:index.php");
}  
else
{
	header("location:index.php");
}