<?php

$dbhost = "192.168.0.69";
//$dbhost = "127.0.0.1";
$dbuser = "WebUser";
$dbpass = "WebUser";
$dbname = "TempData";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
	die("failed to connect!");
}