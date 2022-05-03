<?php
session_start();
	include("connection.php");
	include("functions.php");

    //$user_data = check_login($con);
	{     
        $queryDay = "Select * from `View_TrendDataLastDay`";
        $queryWeek = "Select * from `View_TrendDataLastWeek`";
        $queryMonth = "Select * from `View_TrendDataLastMonth`";

        $resultDay=mysqli_query($con,$queryDay);
        $resultWeek=mysqli_query($con,$queryWeek);
        $resultMonth=mysqli_query($con,$queryMonth);
    }

?>

<!DOCTYPE html>
<html style = "height:100%" class="backgroundImage">
  <head>
    <meta charset="UTF-8" />
    <title>Trend Data</title>
    <link id="style" rel="stylesheet" type="text/css" href="css/QualityCSS.css">
    <script src="https://d3js.org/d3.v7.min.js"></script>
  </head>
  <main class="backgroundImage">
  <?php include("sidebar.php")?>
  <center><div class="contentBox" style="color:white; overflow-y:auto;">
  <h1><center>Trend Data</center></h1><br>
  <table class='table-dark table-striped' style='font-size: xx-large;'><tr><th colspan='7'>Last Day Data:</th></tr>
  <tr><td>Sensor:</td><td>Avg Temp:</td><td>Max Temp:</td><td>Min Temp:</td><td>Avg Humidity:</td><td>Max Humidity:</td><td>Min Humidity:</td></tr>
  <?php
  while($row = mysqli_fetch_assoc($resultDay)){
    echo(  "<tr><td style='border: 1px solid black;'>" .     $row['SensorName'] . 
            "</td><td style='border: 1px solid black;'>" . round($row['avg_temperature'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['max_temperature'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['min_temperature'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['avg_humidity'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['max_humidity'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['min_humidity'],2) .
            "</td></tr>");}?>
</table><br>
<table class='table-dark table-striped' style='font-size: xx-large;'><tr><th colspan='7'>Last Week Data:</th></tr>
  <tr><td>Sensor:</td><td>Avg Temp:</td><td>Max Temp:</td><td>Min Temp:</td><td>Avg Humidity:</td><td>Max Humidity:</td><td>Min Humidity:</td></tr>
  <?php
  while($row = mysqli_fetch_assoc($resultWeek)){
    echo(  "<tr><td style='border: 1px solid black;'>" .     $row['SensorName'] . 
            "</td><td style='border: 1px solid black;'>" . round($row['avg_temperature'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['max_temperature'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['min_temperature'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['avg_humidity'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['max_humidity'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['min_humidity'],2) .
            "</td></tr>");}?>
</table><br>
<table class='table-dark table-striped' style='font-size: xx-large;'><tr><th colspan='7'>Last Month Data:</th></tr>
  <tr><td>Sensor:</td><td>Avg Temp:</td><td>Max Temp:</td><td>Min Temp:</td><td>Avg Humidity:</td><td>Max Humidity:</td><td>Min Humidity:</td></tr>
  <?php
  while($row = mysqli_fetch_assoc($resultMonth)){
    echo(  "<tr><td style='border: 1px solid black;'>" .     $row['SensorName'] . 
            "</td><td style='border: 1px solid black;'>" . round($row['avg_temperature'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['max_temperature'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['min_temperature'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['avg_humidity'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['max_humidity'],2) .
            "</td><td style='border: 1px solid black;'>" . round($row['min_humidity'],2) .
            "</td></tr>");}?>
</table>
</div>
</main>
</html>