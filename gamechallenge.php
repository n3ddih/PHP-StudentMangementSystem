<?php 
include 'template/auth.php';
require_once 'template/dbconnection.php';

if($_SESSION['student']){
    header("Location: index.php");
}

if(isset($_POST["btnSubmit"]) && isset($_FILES["challenge"])){
    $hint = $_POST['hint'];
    $name = $_FILES["challenge"]["name"];
    
    $target_dir = 'uploads/challenge/';
    $target_file = $target_dir. basename($name);
    $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // checking if file is valid
    if(file_exists($target_file)){ // if file is already exist!
        $msg = '<h5 style="color:red">ERROR! File already exist!</h5>';
    } elseif ($_FILES["challenge"]["size"] > 20971520) { // if file is too large (20MB)
        $msg = '<h5 style="color:red">ERROR! Only upload file lower than 20MB!</h5>';
    } elseif ($filetype != 'txt') { // if file is not txt
        $msg = '<h5 style="color:red">ERROR! You can upload txt file only!</h5>';
    } else {
        // upload file
        if (move_uploaded_file($_FILES["challenge"]["tmp_name"], $target_file)) {
            $conn = DbConnection::getConnection();
            
            $query = "INSERT INTO challenge(name, hint) VALUES (?, ?);" ;
            $stmt = $conn->prepare($query);
            $cname = trim(basename($name, '.txt'));
            $stmt->bind_param("ss", $cname, $hint);
            $ret = $stmt->execute();
            DbConnection::closeConnection($conn);
            if($ret){
                $msg = '<h5 style="color:green">The file '.htmlspecialchars(basename($_FILES["challenge"]["name"])).' has been uploaded.</h5>';
            } else {
                $msg = '<h5 style="color:red">ERROR! Something wrong updating database</h5>';
            }
            
        } else {
            $msg = '<h5 style="color:red">Sorry, there was an error uploading your file.</h5>';
        }
    }
}
?>

<html lang="en">
    <head>
        <title>SMS Upload Challenge</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <?php include 'template/header.php'; ?>
        <div class="container" style="margin-top: 47px;">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="hint">Hint:</label>
                            <input class="form-control" type="text" name="hint" id="hint" required="">
                        </div>
                        <div class="form-group">
                            <label for="challenge">Upload a text file (text file):</label>
                            <input type="file" class="form-control-file" name="challenge" id="challenge">
                        </div>
                        <button type="submit" class="btn btn-primary" name="btnSubmit">Upload</button>
                    </form>
                </div>
                <?php if(isset($msg)){ echo $msg; }?>
            </div>
        </div>
    </body>
</html>