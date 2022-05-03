<?php
        include_once("connection.php");
        $AccessLevel = $_SESSION['userAccessLevel']?>

<html>
    <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="Dashboard.php">Dashboard</a>
            <a href="comments.php">Comments</a>
            <a href="updatePassword.php">Change My Password</a>
            <?php sidebarLinks($AccessLevel)?>
            <a href="logout.php">Logout</a>
    </div>
    <button class="openbtn" onclick="openNav()">☰ Open Sidebar</button>  
    <script>
            //script for loading sidebar
            function openNav() {
              document.getElementById("mySidebar").style.width = "250px";
              document.getElementById("main").style.marginLeft = "250px";
            }
            
            //script for closing sidebar
            function closeNav() {
              document.getElementById("mySidebar").style.width = "0";
              document.getElementById("main").style.marginLeft= "0";
            }
    </script>

</html>

