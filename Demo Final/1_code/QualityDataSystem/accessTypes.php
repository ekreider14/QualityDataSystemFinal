<?php
    include "connection.php";
    $accessLevel = $_POST['radAccess'];
    $html = $accessLevel;
   // $query = "Select * from `View_UserInfo`
      //        Where `UserName` = '".$user."'";

  //  $result = mysqli_query($con, $query);
  //  $user_data = mysqli_fetch_assoc($result);
    // Fetch data from db related to $course

 //   if ($user == '')
   //     $html="";
  //  else {
  //  $html = '<tbody>
 //       <tr>
   //         <td>Username: </td>
   //         <td>First Name</td>
  //          <td>Last Name</td>
   //         <td>User Roles</td>
   //         <td>Notes</td>
   //         <td>Creation Date</td>
   //     </tr>
   //     <tr>
   //         <td>'.$user_data['UserName'].'</td>
   ///         <td>'.$user_data['FirstName'].'</td>
   //         <td>'.$user_data['LastName'].'</td>
   //         <td>'.$user_data['AccessName'].'</td>
   //         <td>'.$user_data['Notes'].'</td>
   //         <td>'.$user_data['CreationDate'].'</td>
   //     </tr>
   // </tbody>';
   // }
    echo $html;
    die();
?>