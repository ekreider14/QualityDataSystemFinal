<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<?php

//if a session variable exists and that variable exists in current users
function check_login($con)
{
	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "SELECT * FROM `View_UserInfo` WHERE UserName = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;
}

//pops up an alert box
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

function displayQualAssuranceDashboard($con)
{
    $query = "SELECT * FROM `View_MostRecentRecords`";
    $result = mysqli_query($con,$query);
    
    echo("<center><table id='sensorsTable' class='table table-striped'><tr><th colspan='4'>"
            . "<h1>Current Sensor Records</h1></th></tr>"
            . "<tr><th>Sensor</th><th>Humidity</th><th>Temperature"
            . "</th><th>Last Record</th></tr>");
    while($row = mysqli_fetch_array($result)){
        echo("<tr><td style='border: 1px solid black;'>" . $row['SensorName'] . 
                "</td><td style='border: 1px solid black;'>" . $row['humidity'] .
                "</td><td style='border: 1px solid black;'>" . 
                $row['temperature'] . "</td><td style='border: 1px solid black;'>" . 
                $row['DateTimeStamp'] . "</td></tr>");
    }
}

function displayQualManagementDashboard($con)
{
    $query = "SELECT * FROM `view_trenddata`";
    $result = mysqli_query($con,$query);
    
    echo("<center><table id='trendTable' class='table table-striped' style='width:100%;'><tr><th colspan='7'>"
            . "<h1>Trend Data</h1></th></tr>"
            . "<tr><th>Name</th><th>Avg Temp</th><th>Avg Humidity</th><th>Max Temp</th><th>Min Temp</th>"
            . "<th>Max Humidity</th><th>Min Humidity</th></tr>");
    while($row = mysqli_fetch_array($result)){
        echo("<tr><td style='border: 1px solid black;'>" . $row['SensorName'] . 
                "</td><td style='border: 1px solid black;'>" . $row['avg_temperature'] .
                "</td><td style='border: 1px solid black;'>" . 
                $row['avg_humidity'] . "</td><td style='border: 1px solid black;'>" . $row['max_temperature'] . 
                "</td><td style='border: 1px solid black;'>" . $row['min_temperature'] .
                "</td><td style='border: 1px solid black;'>" . 
                $row['max_humidity'] .  "</td><td style='border: 1px solid black;'>" . $row['min_humidity'] . "</td></tr>");
    }
}

function displayAppSupportDashboard()
{
    echo("<center><h1>Change User's Password</h1></center>
            <div>
                <form id='formPasswordChange' method='post' action='phpOtherPassword.php'>
                            <div style='font-size: 20px;margin: 10px;color: white;'>Enter a new password: </div>
                            <label>Username: </label><input id='txtUser' type='text' name='user_id'>
                            <label>Password: </label><input id='txtPassword' type='password' name='changedPassword'><br><br>
                            <center><input id='button' type='submit' value='Change'></center><br><br>
                    </form>
            </div>");
}

function displayITAdminDashboard()
{
    echo "ITAdminDashboard";
}

function displayAllComments($con)
{
    $sql = "SELECT * FROM `webcomments`";
    $result = mysqli_query($con,$sql);
    
    echo("<center><table id='commentsTable' class='table table-striped' style='width:100%; float:left;'><tr><th colspan='3'>"
            . "<h1>Comments</h1></th></tr>"
            . "<tr><th style='width:15%'>User</th><th style='width:70%'>Comment</th><th style='width:15%'>Time"
            . "</th></tr>");

    while($row = mysqli_fetch_array($result)){
        echo("<tr><td style='border: 1px solid black;'>" . $row['UserName'] . 
                "</td><td style='border: 1px solid black;'>" . $row['Comment'] .
                "</td><td style='border: 1px solid black;'>" . 
                $row['DateTime'] . "</td></tr>");
    }
}

function checkPasswordsMatch($passwordOne,$passwordTwo) { 
    if($passwordOne === $passwordTwo) 
        {         
          return true; 
        } 
        else 
        {
          alert('Passwords do not match!');
          return false; 
        } 
}

//dynamically generate sidebar based on user level
function sidebarLinks($AccessLevel){
        switch ($AccessLevel){
            case "1"://quality assurance
                echo '<a href="sensorDashboard.php">Sensor Dashboard</a>';
                break;
            case "2"://quality management
                echo '<a href="sensorDashboard.php">Sensor Dashboard</a>';
                echo '<a href="trendData.php">Trend Data</a>';
                break;
            case "3"://app support
                echo '<a href="newUser.php">Create User</a>';
                echo '<a href="connectionTest.php">Connection Test</a>';
                echo '<a href="lastPoll.php">Sensor Heartbeat</a>';
                echo '<a href="resetPassword.php">Reset User Password</a>';
                break;
            case "9"://IT support
                echo '<a href="connectionTest.php">Connection Test</a>';
                echo '<a href="newUser.php">Create User</a>';
                echo '<a href="resetPassword.php">Reset User Password</a>';
                echo '<a href="sensorDashboard.php">Sensor Dashboard</a>';
                echo '<a href="trendData.php">Trend Data</a>';
                echo '<a href="acceptableValues.php">Set Sensor Tolerances</a>';
                echo '<a href="lastPoll.php">Sensor Heartbeat</a>';
                break;
            default:
                echo "I'm not sure what you are";
        }
}

?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://d3js.org/d3.v6.min.js"></script>

