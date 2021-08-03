<?php include 'static/auth.php';?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SMS</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <?php include('static/header.html'); ?>
        <div class="container">
            <h4><?php echo "Welcome ".$_SESSION["user"]."!";?></h4>
            <ul>
                <li><a href="userinfo.php">View users info</a></li>
                <li><a href="alist.php">View assignments</a></li>
                <?php                
                if ($_SESSION['teacher']) {
                    echo '<li><a href="asubmit.php">Upload assignments</a></li>';
                }
                if($_SESSION['student']){
                    echo '<li><a href="asubmit.php">Submit assignment</a></li>'
                    . '<li><a href="profile_update.php">Update profile</a></li>';
                }
                ?>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </body>
</html>