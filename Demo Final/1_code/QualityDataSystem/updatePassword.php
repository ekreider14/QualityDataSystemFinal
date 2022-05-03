<?php
session_start();

include("connection.php");
include("functions.php");

?>

<html style="height:100%" class="backgroundColor backgroundDashboard">
    <head>
        <meta charset="UTF-8">
        <title>Password Update</title>
        <link id="style" rel="stylesheet" type="text/css" href="css/QualityCSS.css">
    </head>
    <main class="backgroundImage">
    <?php include("sidebar.php")?>
    <center><div class="contentBox" style="color:white">
            <center><h1>Update your Password</h1></center><br><br>
            <div>
                <form id="formPasswordChange" method="post" action="phpUpdatePassword.php">
                            <div style="font-size: 20px;margin: 10px;color: white;">Enter a new password: </div>
                            <input id="txtPasswordOne" type="password" name="passwordOne" required><br><br>
                            <input id="txtPasswordTwo" type="password" name="passwordTwo" required><br><br>
                    </form>
                    <center><input id="button" type="submit" value="Change" onClick='passwordValidator()'></center><br><br>
            </div>
        </div>
    </main>

    <script type="text/javascript">
        function passwordValidator() {
        //get value of the two text boxes    
        var firstPassword = document.getElementById('txtPasswordOne').value;
        var secondPassword = document.getElementById('txtPasswordTwo').value;  
        
        //verify good password
        if(firstPassword == secondPassword){
            if((firstPassword.length < 6) || (secondPassword.lenght < 6)){
                alert('Cannot be empty or shorter than 6 characters!');
            }
            else {
                document.getElementById("formPasswordChange").submit();
            }
        }
        else {
            alert('The passwords dont match!');
        }
    }
    </script>
</html>
