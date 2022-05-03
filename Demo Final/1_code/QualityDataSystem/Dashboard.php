<?php
        session_start();

	include("connection.php");
	include("functions.php");
	
	//$user_data = check_login($con);

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html style = "height:100%" class="backgroundImage">
    <head>
        <meta charset="UTF-8">
        <title>Quality Dashboard</title>
        <link id="style" rel="stylesheet" type="text/css" href="css/QualityCSS.css">
        
    </head>
    <main class="backgroundImage">
    <?php include("sidebar.php");
    include("alerts.php");?>
    <center><div class="contentBox" style="color:white">
        <div id="dashboardHeader">
            <h1>Quality Data System</h1>
            <p>Hello, <?php echo $_SESSION['user_id'] . ' , ' . $_SESSION['userAccessName'];?></p>
        </div>
        <div>
            <img src=".\CSS\images\qualityassurance.jpg">
        </div>
        <div>
        </div>
    </div></center>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </main>
</html>
