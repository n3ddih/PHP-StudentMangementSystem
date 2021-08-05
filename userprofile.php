<?php
include 'template/auth.php';

require_once 'template/dbconnection.php';
// get user info from username
if (isset($_POST['btnSubmit'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $conn = DbConnection::getConnection();
    
    $query = "UPDATE user SET fullname=?, email=?, phone=? WHERE username=?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $fullname, $email, $phone, $username);
    $ret = $stmt->execute();
    if($ret){
        $msg = '<h5 style="color:green">Update successfully</h5>';
    } else {
        $msg = '<h5 style="color:red">Update fail'.$stmt->error.'</h5>';
    }
    $stmt->close();
    
    DbConnection::closeConnection($conn);
    
} else {
    if (isset($_POST['update'])){
        $username = $_POST['update'];
    } else {
        $username = $_SESSION['user'];
    }
    $conn = DbConnection::getConnection();
    
    $query = "SELECT fullname, password, email, phone FROM user WHERE username = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s",$username);
    // execute
    $ret = $stmt->execute();
    $result = $stmt->get_result();
    // user info array
    $user = $result->fetch_array(MYSQLI_ASSOC);
    $result->close();
    $stmt->close();
    
    DbConnection::closeConnection($conn);
    
}

?>
<html lang="en">
    <head>
        <title>SMS user profile</title>
        <meta charset="UTF-8"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <?php include 'template/header.php'; ?>
        <div class="container">
            <div class="col-sm-12">
                <form action="#" method="post">
                    <div class="form-group">
                        <?php echo '<label for="username">Username:</label>'
                        . '<input type="text" class="form-control" id="username" name="user" value="'.$username.'" readonly>';?>
                    </div>
                    <div class="form-group">
                        <?php echo '<label for="password">Password:</label>'
                        . '<input type="password" class="form-control" name="pass" id="fullname" value="'.$user['password'].'" required>';?>
                    </div>
                    <div class="form-group">
                        <?php echo '<label for="fullname">Full name:</label>'
                        . '<input type="text" class="form-control" name="fname" id="fullname" value="'.$user['fullname'].'" required>';?>
                    </div>
                    <div class="form-group">
                        <?php echo '<label for="email">Email:</label>'
                        . '<input type="email" class="form-control" name="email" id="email" value="'.$user['email'].'" required>';?>
                    </div>
                    <div class="form-group">
                        <?php echo '<label for="phone">Phone number:</label>'
                        . '<input type="tel" pattern="[0-9]{10}" class="form-control" name="phone" id="phone" value="'.$user['phone'].'"  required>';?>
                    </div>
                    <button type="submit" class="btn btn-secondary" name="btnSubmit">Update</button>
                </form>
            </div>
            <?php if(isset($msg)){ echo $msg; }?>
        </div>
    </body>
</html>
