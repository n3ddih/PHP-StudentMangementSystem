<?php 
session_start();

require_once('permission.php');
if(isset($_POST["username"]) && isset($_POST["password"])){
	$user = $_POST["username"];
	$pass = $_POST["password"];
//	$perm = new permission($user, $pass);
//	$is_teacher = $perm->isTeacher();
//	$is_student = $perm->isStudent();
	
	$msg = '<h4>username: '.$user.'</h4>';
	$msg = '<h4>password: '.$pass.'</h4>';
//	$msg = '<h4>isTeacher: '.$is_teacher.'</h4>';
//	$msg = '<h4>isStudent: '.$is_student.'</h4>';
	
	if($is_student || $is_teacher){
		$_SESSION['teacher'] = $is_teacher;
		$_SESSION['student'] = $is_student;
		$_SESSION['user'] = $user;
		//header("Location: index.php");
		$msg = '<h4 style="color:green">Login Success.</h4>';
	} else {
		$msg = '<h4 style="color:red">Invalid Login.</h4>';
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
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<div class="row" style="background: #9e9e9e;">
		<div class="container">
			<div class="col-sm-12">
				<h1>Login Panel</h1>
			</div>
		</div>
	</div>
	<div class="container">
		<?php if(isset($msg)) echo $msg; ?>
		<form action="login.php" method="post">
				<p>Username:</p>
				<input type="text" name="username" required>
				<p>Password:</p>
				<input type="password" name="password" required><br>
				<input type="Submit">
		</form>
		<br>
		<a href="register.php">Sign up here</a>	
	</div>
</body>
</html>