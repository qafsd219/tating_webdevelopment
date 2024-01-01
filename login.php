<?php
include 'process/db_connection.php';

$conn = OpenCon();
$sql = "SELECT * FROM user_accounttbl;";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$sql = "SELECT COUNT(*) AS count
    FROM user_accounttbl
    WHERE username = '$user' AND password = '$pass';
    ";
	$result = mysqli_fetch_assoc($conn->query($sql));

	if ($result['count'] > 0 && $user != "" && $pass != "") {
		$sql = "SELECT * FROM user_accounttbl WHERE username = '$user' AND password = '$pass';";
		$result = mysqli_fetch_assoc($conn->query($sql));
		session_start();
		$_SESSION['privilege'] = $result['privilege'];
		$_SESSION['username'] = $result['username'];
		$_SESSION['employee_no'] = $result['employee_no'];
		
		if($_SESSION['privilege'] == 1){
			header("Refresh:0; url=admin.php");
		}elseif($_SESSION['privilege'] == 2){
			header("Refresh:0; url=payroll.php");
		}elseif($_SESSION['privilege'] == 3){
			header("Refresh:0; url=pos.php");
		}
		
		exit();
	} else {
		echo "<script>";
		echo "alert('Invalid credentials!');";
		echo "</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Doctor Jen's | Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body style="background-image: url('uploads/background1.jpg');">
    </br>
    <div class="login-container">
        <img src="uploads/login.jpg" width="200" height="200">
        <h2>Login Page</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <div class="action-links">
                Not yet a member? <a href="#">Sign Up</a> |
                <a href="#">Forgot Password</a>
            </div>

            <button type="submit" class="login_btn">Log In</button>
        </form>
    </div>
</body>
</html>