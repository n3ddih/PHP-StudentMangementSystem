<?php include 'template/auth.php';?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SMS</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <?php include 'template/header.php'; ?>
        <div class="container">
            <div class="col-sm-12">
                <h4><?php echo "Welcome ".$_SESSION["user"];?></h4>
                <ul>
                    <li><a href="userinfo.php">View users info</a></li>
                    <li><a href="alist.php">View assignments</a></li>
                    <?php 
                    if($_SESSION['teacher']){
                        echo '<li><a href="gamechallenge.php">Quiz game</a></li>';
                    } else {
                        echo '<li><a href="gameanswer.php">Quiz game</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </body>
</html>