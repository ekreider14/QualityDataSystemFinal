<?php
session_start();
include("connection.php");
include("functions.php");?>

<html style = "height:100%" class="backgroundImage">
    <head>
    <meta charset="UTF-8">
        <title>Connection Test</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link id="style" rel="stylesheet" type="text/css" href="CSS\QualityCSS.css">
    </head>
    <main class="backgroundImage" >
        <?php include("sidebar.php");?>
        <div class="contentBox">
            <center><h1>Connection Test</h1>
            <?php echo('Connecting with account ' . $dbuser . '<br><br>');

            if ($con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
                {
                        die("Connection succeeded!");
                }

            if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
                {
                        die("failed to connect!");
                }
            ?></center>
        </div>
    </main>
</html>

