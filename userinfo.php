<?php
session_start();

if(!isset($_SESSION['teacher']) || !isset($_SESSION['student'])){
    // redirect to login
    header("Location: login.php");
}

// delete user
if (isset($_POST['delete'])){
    $username = $_POST['delete'];
    $con = DbConnection::getConnection();
    $query = "DELETE FROM user WHERE username=?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s",$username);
    // execute
    $ret = $stmt->execute();
    // close connection
    DbConnection::closeConnection($conn);
    if($ret){
        $msg = "Update successfully";
    } else {
        $msg = "Update fail".$stmt->error;
    }
    $stmt->close();
}
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>User Profile</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body>
        <?php require_once './user.php';?>
        <div class="container">
            <?php if(isset($_SESSION['teacher'])) { ?>
            <div class="row" style="margin-top: 10px;">
                <div class="col-md-1">
                    <form action="adduser.php">
                        <button class="btn btn-secondary" type="submit">Add User</button>
                    </form>
                </div>
                <div class="col-md-1">
                    <form action="updateuser.php">
                        <button class="btn btn-secondary" type="submit">Update User</button>
                    </form>
                </div>
            </div>
            <?php } ?>
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $users = User::getAll();
                                // print all user as table
                                foreach ($users as $user){
                                    echo "<tr>";
                                    echo "<td>{$user->getFullname()}</td>";
                                    echo "<td>{$user->getEmail()}</td>";
                                    echo "<td>{$user->getPhone()}</td>";
                                    echo "<td>{$user->getRole()}</td>";
                                    if($_SESSION['teacher']){
                                        // update button
                                        echo '<td><form action="updateuser.php" method="post" style="float:left;margin-right: 8px;">'
                                        . '<button class="btn" type="submit" name="update" title="Delete" value="'.$user->getUsername().'">'
                                                . '<i class="fa fa-save"></i></button></form></td>';
                                        // delete button
                                        echo '<td><form action="#" method="post" style="float:left;">'
                                        . '<button class="btn" type="submit" name="delete" title="Delete" value="'.$user->getUsername().'">'
                                                . '<i class="fa fa-trash"></i></button></form></td>';
                                    }
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
            