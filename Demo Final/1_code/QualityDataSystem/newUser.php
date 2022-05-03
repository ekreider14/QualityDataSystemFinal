<?php 
session_start();

	include("connection.php");
	include("functions.php");

	//define queries
	$sqlAccessLevels = "Select `AccessLevel`,`AccessName`,`AccessDescription` from `AccessLevel`";
	$sqlUserNames = "Select `UserName` from `View_UserInfo`";

						//if something posted
    if(isset($_POST['user']) or isset($_POST['password'])){
        //set posted variables
		$postUser = $_POST['user'];
		$postPassword = $_POST['password'];
		$postFirstName= $_POST['firstName'];
		$postLastName= $_POST['lastName'];
		$postRadAccess= $_POST['radAccess'];
		$postNotes= $_POST['notes'];

		$sqlInsertAccount = "Insert into `WebUsers` (`UserName`, `UserPassword`, `FirstName`, `LastName`, `AccessLevel`, `Notes`) 
						values ('".$postUser."', '".$postPassword."', '".$postFirstName."', '".$postLastName."', '".$postRadAccess."', '".$postNotes."')";
		
		mysqli_query($con, $sqlInsertAccount);
		header('Location: dashboard.php', true, 303);
		//alert($postUser." ".$postPassword." ".$postFirstName." ".$postLastName." ".$postRadAccess." ".$postNotes);
    } 
	else
		//alert("not yet");
    
?>


<!DOCTYPE html>
<html style = "height:100%" class="backgroundImage">
<head>
	<title>Signup</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link id="style" rel="stylesheet" type="text/css" href="css/QualityCSS.css">
</head>
<main class="backgroundImage" style="color: white;">
	<?php include("sidebar.php");?>
<div class="contentBox" >
	<Center><h1>Create a User</h1></center><br>
<center><form action="" method="post">
	<table style="color: white">
	<tr><td><label for="txtUser">Username: </label></td><td><input type="text" id="txtUser" name="user" required></td></tr>
	<tr><td><label for="txtPassword">Password: </label></td><td><input type="password" id="txtPassword" name="password" required></td></tr>
	<tr><td><label for="txtFirstName">First Name: </label></td><td><input type="text" id="txtFirstName" name="firstName" required></td></tr>
	<tr><td><label for="txtLastName">Last Name: </label></td><td><input type="text" id="txtLastName" name="lastName" required></td></tr>
	<tr><td><label for="radAccess">Access Level: </label></td><td>
	<?php
		$dsAccessLevels = mysqli_query($con, $sqlAccessLevels);
		while ($row = $dsAccessLevels->fetch_assoc()) {

			unset($AccessLevel, $AccessName, $AccessDescription);
			$AccessLevel = $row['AccessLevel'];
			$AccessName = $row['AccessName'];
			echo '<input type="radio" name="radAccess" value="'.$AccessLevel.'" required>'.$AccessName.'</input><br>';
		}
	?></td></tr>
	<tr><td><label for="txtNotes">Account Notes: </label></td><td><input type="text" id="txtNotes" name="notes"></td></tr>
	<tr><td colspan="2"><center><input type="submit" value="Submit"></center></td></tr>
	</table>
</form></center>
	</div>
	</main>
</html>

<script type="text/javascript">
//needs changed to be specific to this page
$('input[type=radio][name=radAccess]').change(function() {
    document.getElementById("test").innerHTML = radAccess.value;
});

</script>