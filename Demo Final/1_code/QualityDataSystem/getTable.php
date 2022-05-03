<?php
            include("connection.php");
            include("functions.php");

            $sensorQuery = "Select * from `View_MostRecentRecords`";
            $dsSensors = mysqli_query($con, $sensorQuery);
            //$currentTime = date("Y-m-d H:i:s"); 

            while($row = mysqli_fetch_array($dsSensors)){
                $sensorID = $row['SensorID'];
                $sensorName = $row['SensorName'];
                $sensorTemp = $row['temperature'];
                $sensorHumidity = $row['humidity'];
                $sensorTime = $row['DateTimeStamp'];
                $sensorHighHum = $row['highHumidityTol'];
                $sensorLowHum = $row['lowHumidityTol'];
                $sensorHighTemp = $row['highTemperatureTol'];
                $sensorLowTemp = $row['lowTemperatureTol'];

                echo("<div><table class= table-dark table-striped text-center sensorTable' border='2' style = 'font-size:xx-large;' id='tblSensor'".$sensorID.">
                <tr><th colspan='4'><center>".$sensorName."</center></th></tr>
                <tr><td>Value</td><td>Current</td><td>Min</td><td>Max</td></tr>
                <tr><td><center>Temperature:</center></td><td><center>".$sensorTemp."</center></td><td><center>".$sensorLowTemp.
                "</center></td><td><center>".$sensorHighTemp."</center></td></tr>
                <tr><td>Humidity: </td><td><center>".$sensorHumidity."</center></td><td><center>".$sensorLowHum."</center></td><td><center>".$sensorHighHum."</center></td></tr>
                <tr><td>Timestamp: </td><td colspan='3'>".$sensorTime."</td></tr>");
                if(($sensorTemp>$sensorHighTemp)||($sensorTemp<$sensorLowTemp)||
                ($sensorHumidity>$sensorHighHum)||($sensorHumidity<$sensorLowHum)){
                    echo("<tr><td colspan='4' class='warningFlash'>WARNING. OUT OF TOLERANCES</td></tr>");
                }
                echo("</table></div><br>");
            }

        ?>