<?php
session_start();

	include("connection.php");
	include("functions.php");

        //see if already signed in
        if(isset($_SESSION['user_id']))
        {
            header("Location: Dashboard.php");
        }
        
        
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
        
                //if there is something there
		if(!empty($user_name) && !empty($password))
		{

			//read from database
			$query = "SELECT * FROM `View_UserInfo` where UserName = '$user_name' limit 1";
			$result = mysqli_query($con, $query);
                        
                        //if something is returned
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['UserPassword'] === $password)
					{

						$_SESSION['user_id'] = $user_data['UserName'];
                                                $_SESSION['userAccessLevel'] = $user_data['AccessLevel'];
                                                $_SESSION['userAccessName'] = $user_data['AccessName'];
						header("Location: Dashboard.php");
						die;
					}
				}
			}
			
			alert('Bad Username or Password!');
		}else
		{
			alert('Bad Username or Password!');
		}
	}

?>


<!DOCTYPE html>
<html class="backgroundImage">
<head>
	<title>Login</title>
        <link id="style" rel="stylesheet" type="text/css" href="CSS\QualityCSS.css">
</head>
<body class="backgroundImage">
            <div id="LoginDiv">
                <center><h1 class="mt-4 text-white rounded">Quality Data System</h1></center>
                <div id="LoginBox">
                    <center>
                        <form method="post">
                                <h3 style="margin: 10px;color: white;">Login</h3>
                                <label class="form-label text-white">Username: </label>
                                <input id="text" type="text" name="user_name" class="form-control" required><br><br>
                                <label class="form-label text-white">Password: </label>
                                <input id="text" type="password" name="password" class="form-control" required><br><br>

                                <input id="button" type="submit" value="Login" class=""><br><br>
                        </form>
                    </center>
                </div>
            </div>
</body>
</html>
