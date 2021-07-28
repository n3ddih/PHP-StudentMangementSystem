<?php
session_start();

if(!isset($_SESSION['teacher']) || !isset($_SESSION['student'])){
    // redirect to login
    header("Location: login.php");
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>SMS</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <style>
            .with-margin{
                margin-bottom: 7px;
                margin-top: 5px;
            }
        </style>
    </head>
    <body>
	<h1>Student Management System</h1>
	<h4><?php echo "Welcome ".$_SESSION["user"]." !";?></h4>
	<ul>
            <li><a href="userinfo.php">View users info</a></li>

            <?php if($_SESSION['teacher']){ echo '<li><a href="ass_upload.php">Upload assignment</a></li>'; }?>

            <?php if($_SESSION['student']){
                echo '<li><a href="ass_submit.php">Submit assignment</a></li>';
                echo '<li><a href="profile_update.php">Update profile</a></li>';
            } ?>

            <li><a href="logout.php">Log Out</a></li>
	</ul>
    </body>
</html>