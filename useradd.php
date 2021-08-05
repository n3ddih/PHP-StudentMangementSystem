<?php
session_start();
if(!isset($_SESSION['teacher'])){
    header("Location: userinfo.php");
}
?>

<?php 
require_once 'template/user.php';
if (isset($_POST['btnSubmit'])){
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $user = new User($username, $password, $fullname, $email, $phone, $role);
    if($user->save()){
        $msg = '<h5 style="color:green">Student added successfully</h5>';
    } else {
        $msg = '<h5 style="color:red">Added fail</h5>';
    }
}
?>

<html lang="en">
    <head>
        <title>Add student</title>
        <meta charset="UTF-8"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <?php include 'template/header.php';?>
        <div class="container">
            <form action="#" method="post" style="margin-top: 37px;">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="user" placeholder="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="pass" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label for="fullname">Student full name:</label>
                    <input type="text" class="form-control" name="fname" id="fullname" placeholder="A Full Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="mail@example.com" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone number:</label>
                    <input type="tel" pattern="[0-9]{10}" placeholder="0123456789" class="form-control" name="phone" id="phone" required>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select id="role" name="role">
                        <option value="Student">Student</option>
                        <option value="Teacher">Teacher</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-default" name="btnSubmit">Add</button>
            </form>
            <?php if(isset($msg)){ echo $msg; }?>
        </div>
    </body>
</html>