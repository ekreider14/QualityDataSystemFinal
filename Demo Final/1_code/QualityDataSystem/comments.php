<?php
session_start();

	include("connection.php");
	include("functions.php");

    //$user_data = check_login($con);
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $comment = $_POST['comment'];
        $userName = $_SESSION['user_id'];
        
        $query = "Insert into `WebComments` (UserName, Comment) values ('" . $userName . "', '" . $comment . "');";

        mysqli_query($con,$query);
        
        header("Location: comments.php");
    }

?>
<!DOCTYPE html>
<html style = "height:100%" class="backgroundImage">
    <head>
        <meta charset="UTF-8">
        <title>Quality Dashboard</title>
        <link id="style" rel="stylesheet" type="text/css" href="css/QualityCSS.css">
    </head>
    <main class="backgroundImage">
        <?php include("sidebar.php"); ?>
    <div class="contentBox" style="color:white; overflow-y: scroll;">
            <center><div><form method="post" action="">
                    <label for="txtComment">Comment:</label><br>
                    <input id='txtComment' type='textarea' name='comment' required>
                    <input type="submit" value="Submit">
                </form>
             <?php
            $query = 'SELECT * FROM `WebComments` order by DateTime desc LIMIT 15';
            $result = mysqli_query($con, $query);
            //$row = mysqli_fetch_assoc($result);

            echo("<center><table id='commentsTable' class='table-dark table-striped' style='width:100%; float:left;'><tr><th colspan='3'>"
                   . "<h1>Comments</h1></th></tr>"
                    . "<tr><th style='width:15%'>User</th><th style='width:70%'>Comment</th><th style='width:15%'>Time"
                    . "</th></tr>");
        
            while($row = mysqli_fetch_assoc($result)){
                echo("<tr><td style='border: 1px solid black;'>" . $row['UserName'] . 
                        "</td><td style='border: 1px solid black;'>" . $row['Comment'] .
                        "</td><td style='border: 1px solid black;'>" . 
                        $row['DateTime'] . "</td></tr>");
            }
            ?>
                </div></center>
        </main>
</html>