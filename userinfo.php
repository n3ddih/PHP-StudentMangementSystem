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
        <title>User Profile</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <style>
            .with-margin{
                margin-bottom: 7px;
                margin-top: 5px;
            }
        </style>
    </head>
    
    <body>
        <?php require_once './user.php';?>
        <div class="container">
            <div class="row with-margin">
                <div class="col-sm-12">
                    <form action="adduser.php">
                        <button class="btn btn-default" type="submit">Add User</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Full name</th>
                                    <th>Email address</th>
                                    <th>Phone number</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $users = User::getAll();
                                    foreach ($users as $user){
                                        echo "<tr>";
                                        echo "<td>{$user->getFullname()}</td>";
                                        echo "<td>{$user->getEmail()}</td>";
                                        echo "<td>{$user->getPhone()}</td>";
                                        echo "<td>{$user->getRole()}</td>";
                                        echo "<tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
            