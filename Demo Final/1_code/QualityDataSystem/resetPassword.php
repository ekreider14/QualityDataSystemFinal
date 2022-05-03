<?php
    session_start();
    include("connection.php");
	include("functions.php");

    $query = "SELECT `UserName` FROM `View_UserInfo`";
    $users = mysqli_query($con, $query);
?>

<?php
    if(isset($_POST['users']) or isset($_POST['password'])){
        $postUser = $_POST['users'];
        $postPassword = $_POST['password'];

        if(($postUser == "") or ($postPassword == "")){
            alert("Fields cannot be empty!");
        }
        else{
            $updateQuery = "UPDATE `View_UserInfo`
                            set `UserPassword` = '".$postPassword."' 
                            where `UserName` = '".$postUser."'";
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
    <?php include("sidebar.php"); ?>
    <div class="contentBox">
    <center><h1>Change a User's Password:</h1><br><br><br>
    <form action="" method="post">
        <select id="ddlUsers" name="users">
            <option value=''>Please pick a User</option>
            <?php
                    while ($row = $users->fetch_assoc()) {

                        unset($userName, $fName, $lName);
                        $userName = $row['UserName'];
                        echo '<option value="'.$userName.'">'.$userName.'</option>';
                    }
                ?>
        </select><br><br>   
        <table id="userInfo" border="1" class="table-dark">
    </table><br>     
        <table class="table-dark"><tr><td><label>Enter new password: </label></td><td><input type="textbox" value="" id="txtPassword" name="password"></input></td></tr></table><br><br>
        <button>Change Password</button>
    </form></center>        
    </div>
</main>
</html>
<script type="text/javascript">
$("#ddlUsers").change(function(){
    var user = $(this).val();
    $.post('userInfo.php', {user: user}, function(response){
        // your drop down box is in response
        $("#userInfo").html(response);
    });
});

</script>