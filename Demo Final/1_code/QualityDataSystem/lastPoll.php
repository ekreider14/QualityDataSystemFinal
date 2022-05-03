<?php
session_start();

	include("connection.php");
	include("functions.php");
?>

<!DOCTYPE html>
<main class="backgroundImage">
    <head>
        <meta charset="UTF-8">
        <title>Sensor Heartbeat Poll</title>
        <link id="style" rel="stylesheet" type="text/css" href="css/QualityCSS.css">
    </head>
    <main class="backgroundImage">
    <?php include("sidebar.php")?>
        <div>
            <center><<div class="contentBox" style="color:white">>
             <?php
            $query = 'SELECT `SensorID`,`SensorName`,`DateTimeStamp`, TIMESTAMPDIFF(minute, `DateTimeStamp`, now()) as TimeSinceRecord from View_MostRecentRecords';
            $result = mysqli_query($con, $query);
            //$row = mysqli_fetch_assoc($result);

            echo("<center><table id='heartbeatTable' class='table-dark table-striped' style='width:100%; float:left;'><tr><th colspan='4'>"
                   . "<center><h1>Sensor Heartbeat Poll</h1></center></th></tr>"
                    . "<tr><th>Sensor ID</th><th>Sensor Name</th><th>Last Record" . "<th>Minutes Since Record"
                    . "</th></tr>");
        
            while($row = mysqli_fetch_assoc($result)){
                echo("<tr><td style='border: 1px solid black;'>" . $row['SensorID'] . 
                        "</td><td style='border: 1px solid black;'>" . $row['SensorName'] .
                        "</td><td style='border: 1px solid black;'>" . $row['DateTimeStamp'] .
                        "</td><td class='minutesSince' style='border: 1px solid black;'>" . $row['TimeSinceRecord'] . "</td></tr>");
            }
            ?>
                </div></center></div>
        </main>
    <script type="text/javascript">
       //Get all cells that will be conditionally styled
       elements=document.getElementsByClassName('minutesSince');
       
       //iterate through elements and mark sensors that havent reported
       for (var i = 0; i<elements.length; i++)
       {
           var minValue = elements[i].innerText;
           if (minValue > 5 && minValue < 10){
            elements[i].style.backgroundColor='yellow';
           } else if (minValue >= 10) {
            elements[i].classList.add('warningFlash');
           }

       }
        </script>
</html>