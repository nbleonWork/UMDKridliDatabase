<?php

session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "webarchive";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("failed to connect!");

}

$incorrect = false;

if (isset($_GET['submittedPassword'])) {
	$query = "select * from password";
	$result = mysqli_query($con, $query);
	$passwordTable = mysqli_fetch_assoc($result);
	$password = $passwordTable['password'];
	
	if ($_GET['submittedPassword'] === $password) {
		$_SESSION['loggedIn'] = 1;
		header("location: admindashboard.php");
	} else {
		$incorrect = true;
	}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Screen</title>
    <style>
        body {
			font-family: 'Nunito Sans', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color:rgba(175,195,219,0.3);
        }

        .login-box {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-box input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-box button {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-box button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="login-box">
	<form action="adminlogin.php" method="get">
		<input type="password" placeholder="Enter your password" name="submittedPassword">
		<button type="submit">Login</button>
	</form>
	<?php 
		if ($incorrect) {
			echo "Incorrect password, please try again.";
		}
	?>
</div>

<script>
    function login() {
        // Add your login logic here
        alert("Login button clicked!");
    }
</script>

</body>
</html>
