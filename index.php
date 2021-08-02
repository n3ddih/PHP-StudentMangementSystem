<?php
session_start();

if(!isset($_SESSION['teacher']) || !isset($_SESSION['student'])){
    // redirect to login
    header("Location: login.php");
}
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SMS</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="row" style="background: #9e9e9e;">
            <div class="container">
                <div class="col-sm-12">
                    <h1>Student Management System</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <h4><?php echo "Welcome ".$_SESSION["user"]."!";?></h4>
            <ul>
                <li><a href="userinfo.php">View users info</a></li>

                <?php if($_SESSION['teacher']) echo '<li><a href="ass_upload.php">Upload assignment</a></li>';?>

                <?php if($_SESSION['student']){
                    echo '<li><a href="ass_submit.php">Submit assignment</a></li>'
                    . '<li><a href="profile_update.php">Update profile</a></li>';
                } ?>

                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </body>
</html>