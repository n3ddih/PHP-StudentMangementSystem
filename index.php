<?php
session_start();

if(!isset($_SESSION['teacher']) || !isset($_SESSION['student'])){
	// redirect to login
	header("Locations: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SMS</title>
</head>
<body>
	<h1>Student Management System</h1>
	<h4><?php echo "Welcome ".$_SESSION["user"]." !";?></h4>
	<ul>
		<li><a href="userinfo.php">View user info</a></li>

		<?php if($_SESSION['teacher']){ echo '<li><a href="ass_upload.php">Upload assignment</a></li>'; }?>

		<?php if($_SESSION['student']){
			echo '<li><a href="ass_submit.php">Submit assignment</a></li>';
			echo '<li><a href="profile_update.php">Update profile</a></li>';
		} ?>

		<li><a href="logout.php">Log Out</a></li>
	</ul>
</body>
</html>