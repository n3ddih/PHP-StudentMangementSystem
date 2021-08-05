<?php 
session_start();

require_once('template/permission.php');
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
        $msg = '<h5 style="color:red">Wrong username or password.</h5>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'template/header.php'; ?>
    <div class="container">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">Login Panel</div>
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required><br>
                        </div>
                        <input type="Submit" class="btn btn-default">
                    </form>
                    <br>
                    <?php if(isset($msg)){ echo $msg; }?>
                </div>
            </div>
        </div> 
    </div>
</body>
</html>