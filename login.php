<?php 
session_start();

require_once('permission.php');
if(isset($_POST["username"]) && isset($_POST["password"])){
    $user = $_POST["username"];
    $pass = $_POST["password"];
	$perm = new permission($user, $pass);
	$is_teacher = $perm->isTeacher();
	$is_student = $perm->isStudent();
	
	if($is_student || $is_teacher){
		$_SESSION['teacher'] = $is_teacher;
		$_SESSION['student'] = $is_student;
		$_SESSION['user'] = $user;
		header("Location: index.php");
	} else {
		$msg = '<h6 style="color:red">Invalid Login.</h6>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Panel</h1>
	<?php if(isset($msg)) echo $msg; ?>
    <form action="login.php" method="POST">
            <p>Username:</p>
            <input type="text" name="username" required>
            <p>Password:</p>
            <input type="password" name="password" required><br>
            <input type="Submit">
    </form>
    <br>
    <a href="register.php">Sign up here</a>	
</body>
</html>