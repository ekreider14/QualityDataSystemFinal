<?php
    include("connection.php");
	include("functions.php");

    $query = "SELECT `UserName` FROM `View_UserInfo`";
    $users = mysqli_query($con, $query);
?>

<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="paragraph-div">
        <select id="courses">
            <option value=''>Please pick a User</option>
            <<?php
                    while ($row = $users->fetch_assoc()) {

                        unset($userName, $fName, $lName);
                        $userName = $row['UserName'];
                        echo '<option value="'.$userName.'">'.$userName.'</option>';
                    }
                ?>
        </select>
        <table id="myTable" border="1">

        </table>
    </div>
</body>
</html>
<script type="text/javascript">
$("#courses").change(function(){
    var course = $(this).val();
    $.post('data.php', {course: course}, function(response){
        // your drop down box is in response
        $("#myTable").html(response);
    });
});

</script>