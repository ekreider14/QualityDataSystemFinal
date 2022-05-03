<?php
        session_start();
        
        include("connection.php");
	include("functions.php");
        
        $newPassword = $_POST['passwordOne'];
        $userName = $_SESSION['user_id'];
        
        $query = "update `WebUsers` set UserPassword = '" . $newPassword . 
                "' where UserName = '" . $userName . "'";

        $result = mysqli_query($con,$query);
        
        header("Location: Dashboard.php");
?>