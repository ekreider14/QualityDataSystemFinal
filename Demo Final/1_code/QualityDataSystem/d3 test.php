<?php
    include("connection.php");

  //  $username = "WebUser"; 
   // $password = "WebUser";   
 //   $host = "localhost";
  //  $database="TempData";

    //$server = mysqli_connect($host, $username, $password, $database);
   // $connection = mysqli_select_db($database, $server);

    $myquery = "
    SELECT * FROM `View_RecordDetails`
    ";

    $query = mysqli_query($con, $myquery);

    if ( ! $query ) {
        echo mysqli_error();
        die;
    }

    $data = array();

    for ($x = 0; $x < mysqli_num_rows($query); $x++) {
        $data[] = mysqli_fetch_assoc($query);
    }

    echo json_encode($data);     

    mysqli_close($con);
?>


