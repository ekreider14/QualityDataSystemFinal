<?php
    include "connection.php";
    //include "functions.php";

    echo('<head>
    <meta charset="UTF-8">
    <title>Quality Dashboard</title>
    <link id="style" rel="stylesheet" type="text/css" href="css/QualityCSS.css">
</head>');

    $commentQuery = 'SELECT * FROM `WebComments` ORDER BY `DateTime` desc LIMIT 1';
    $sensorQuery = 'SELECT * FROM `View_MostRecentRecords`';

    $commentResult = mysqli_query($con,$commentQuery);
    $sensorResult = mysqli_query($con,$sensorQuery);

    $alertString='';

    echo('<div style = "background-color:grey;" class="marquee-container">
    <p class="marquee" style="color:white; font-size: x-large;">');
    
    while($row = mysqli_fetch_assoc($commentResult)){
        echo('<span> Comment: ' . $row['UserName']. ': ' . $row['Comment'] . ' </span>');
    }

    //$alertString = $alertString . '           ';

    while($row = mysqli_fetch_assoc($sensorResult)){
        if($row['temperature']>$row['highTemperatureTol']){
            echo('<span>' . 'Warning! Sensor: '. $row['SensorName'] . ' is above temp allowance. ' . '</span>');
        }
        if($row['temperature']<$row['lowTemperatureTol']){
            echo('<span>' . 'Warning! Sensor: '. $row['SensorName'] . ' is below temp allowance. ' . '</span>');
        }
        if($row['humidity']>$row['highHumidityTol']){
            echo('<span>' . 'Warning! Sensor: '. $row['SensorName'] . ' is above humidity allowance. ' . '</span>');
        }
        if($row['humidity']<$row['lowHumidityTol']){
            echo('<span>' .'Warning! Sensor: '. $row['SensorName'] . ' is below humidity allowance. ' . '</span>');
        }
    }
echo('</p></div>')
?>
