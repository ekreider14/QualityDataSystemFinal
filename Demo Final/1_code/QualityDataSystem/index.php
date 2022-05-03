<?php
session_start();

	include("connection.php");
	include("functions.php");
	include("sidebar.php");
	
	$user_data = check_login($con);

?>

<html>
<head>
	<title>My website</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link id="style" rel="stylesheet" type="text/css" href="CSS\QualityCSS.css">
</head>
<body>
	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>
	
	<br>
	Hello, <?php echo $user_data['UserName']; ?>
</body>
</html>
