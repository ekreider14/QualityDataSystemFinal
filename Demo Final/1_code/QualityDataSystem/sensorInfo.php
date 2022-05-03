<?php
    include "connection.php";
    $sensor = $_POST['sensor'];
    
    $query = "Select * from `View_SensorInformation`
              Where `SensorID` = '".$sensor."'";

    if ($result = mysqli_query($con, $query))
    {}
    else die();
    $sensor_data = mysqli_fetch_assoc($result);
    // Fetch data from db related to $course

    if ($sensor == '')
        $html="";
    else {
    $html = '<tbody>
        <tr>
            <td>Sensor Name</td>
            <td>Low Temperature</td>
            <td>High Temperature</td>
            <td>Low Humidity</td>
            <td>High Humidity</td>
            <td>Description: </td>
        </tr>
        <tr>
            <td>'.$sensor_data['SensorName'].'</td>
            <td>'.$sensor_data['lowTemperature'].'</td>
            <td>'.$sensor_data['highTemperature'].'</td>
            <td>'.$sensor_data['lowHumidity'].'</td>
            <td>'.$sensor_data['highHumidity'].'</td>
            <td>'.$sensor_data['Description'].'</td>
        </tr>
    </tbody>';
    }
    echo $html;
    die();
?>