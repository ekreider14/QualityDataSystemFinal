<?php
    session_start();

	include("connection.php");
	include("functions.php");
?>
<!DOCTYPE html>

<html style = "height:100%" class="backgroundImage">
    <head>
        <meta charset="UTF-8">
        <title>Sensor Dashboard</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link id="style" rel="stylesheet" type="text/css" href="CSS\QualityCSS.css">
    </head>
    <main class="backgroundImage"><
    <?php include('sidebar.php'); ?>   
    <center><div class="contentBox"><h1>Sensor Records</h1><div 
        id="tableHolder">
        
        </div>
    </div></center>  
</main>
</html>
<script type="text/javascript">
    setInterval(function(){
        $.get("getTable.php", function(result){

            $("#tableHolder").html(result);
        });
    });

    
   // function refreshTable(){
     //   $('#tableHolder').load('getTable.php', function(){
       // });
   // }
</script>