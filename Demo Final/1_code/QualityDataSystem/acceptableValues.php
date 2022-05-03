<?php
    session_start();
    include("connection.php");
	include("functions.php");

    $query = "SELECT * FROM `SensorsInfo`";
    $sensors = mysqli_query($con, $query);
?>

<?php
    if(isset($_POST['sensors'])){
        $postSensor = $_POST['sensors'];
        $postLowTemp = $_POST['lowTemp'];
        $postHighTemp = $_POST['highTemp'];
        $postLowHum = $_POST['lowHum'];
        $postHighHum = $_POST['highHum'];

        if($postSensor == ''){
            alert("Field cannot be empty!");
        }
        else{
            $updateQuery = "UPDATE `SensorTolerance`
                            set `lowTemperature` = '".$postLowTemp.
                            "', `highTemperature` = '".$postHighTemp.
                            "', `lowHumidity` = '".$postLowHum.
                            "', `highHumidity` = '".$postHighHum.  
                            "' where `SensorID` = '".$postSensor."'";
            mysqli_query($con, $updateQuery);
        }
    } 
    
?>

<html style = "height:100%" class="backgroundImage">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link id="style" rel="stylesheet" type="text/css" href="CSS\QualityCSS.css">
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<main class="backgroundImage">
<?php include("sidebar.php")?>
    <center><div class="contentBox">
    <h1>Set Sensor Tolerances</h1><br><br>
    <form action="" method="post">
        <select id="ddlSensors" name="sensors">
            <option value=''>Please pick a Sensor</option>
            <?php
                    while ($row = $sensors->fetch_assoc()) {

                        unset($sensorName, $sensorID);
                        $sensorName = $row['SensorName'];
                        $sensorID = $row['SensorID'];
                        echo '<option value="'.$sensorID.'">'.$sensorName.'</option>';
                    }
                ?>
        </select><br><br>        
        <label>Low Temp: </label><input type="number" id="numTempLow" name="lowTemp" min="-20" max="50" required><br><br>
        <label>High Temp: </label><input type="number" id="numTempHigh" name="highTemp" min="-20" max="50" required><br><br>
        <label>Low Humidity: </label><input type="number" id="numHumLow" name="lowHum" min="0" max="100" required><br><br>
        <label>High Humidity: </label><input type="number" id="numHumHigh" name="highHum" min="0" max="100" required><br><br>
        <button>Set Tolerances</button>
    </form>        
       
    <table id="sensorInfo" border="2" class="table-dark">
    </table>
    </div></center>
</body>
</html>
<script type="text/javascript">
$("#ddlSensors").change(function(){
    var sensor = $(this).val();
    $.post('sensorInfo.php', {sensor: sensor}, function(response){
        // your drop down box is in response
        $("#sensorInfo").html(response);
    });
});

</script>