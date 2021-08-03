<?php 
session_start();

require_once('permission.php');
if(isset($_POST["username"]) && isset($_POST["password"])){
    $user = $_POST["username"];
    $pass = $_POST["password"];
    
    $perm = new Permission($user, $pass);
    $is_teacher = $perm->isTeacher();
    $is_student = $perm->isStudent();
    
    if($is_student || $is_teacher){
        $_SESSION['teacher'] = $is_teacher;
        $_SESSION['student'] = $is_student;
        $_SESSION['user'] = $user;
        header("Location: index.php");
        die();
    } else {
        $msg = '<h5 style="color:red">Invalid Login.</h5>';
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <div class="col-sm-12">
                <h1 style="color: whitesmoke">Login Panel</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-sm-6">
        <?php if(isset($msg)){ echo $msg; }?>
            <form action="#" method="post">
                <div class="form-group" style="margin-top: 16px;">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" required><br>
                </div>
                <input type="Submit" class="btn btn-default">
            </form>
        </div>
        <br>   
    </div>
</body>
</html>