<?php
    include ("connection.php");

	//query
    $query = "Select * from `View_RecordDetails` order by `dateTime` desc";

	//result set
    $result = mysqli_query($con, $query);

	//configure array
    $data = array();

	//add to array
    for ($x = 0; $x < mysqli_num_rows($result); $x++) {
        $data[] = mysqli_fetch_assoc($result);
    }

	//return json
    echo json_encode($data);     

?>
