<?php

include 'template/auth.php';
include 'alist.php';

if(isset($_POST['upload_path'])){
    $_SESSION['upload_path'] = $_POST['upload_path'];
}

if(isset($_POST["btnSubmit"]) && isset($_FILES["assignment"])){
    if ($_SESSION['teacher']){
        $target_dir = 'uploads/assignment/';
    } elseif ($_SESSION['student']){
        $target_dir = $_SESSION['upload_path'];
    }
    $target_file = $target_dir. basename($_FILES["assignment"]["name"]);
    $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // checking if file is valid
    if(file_exists($target_file)){ // if file is already exist!
        $msg = '<h5 style="color:red">ERROR! File already exist!</h5>';
    } elseif ($_FILES["assignment"]["size"] > 20971520) { // if file is too large (20MB)
        $msg = '<h5 style="color:red">ERROR! Only upload file lower than 20MB!</h5>';
    } elseif ($filetype != 'pdf') { // if file is not pdf
        $msg = '<h5 style="color:red">ERROR! You can upload pdf file only!</h5>';
    } else {
        if (move_uploaded_file($_FILES["assignment"]["tmp_name"], $target_file)) {
            $msg = '<h5 style="color:green">The file '. htmlspecialchars( basename( $_FILES["assignment"]["name"])). ' has been uploaded.</h5>';
        } else {
            $msg = '<h5 style="color:red">Sorry, there was an error uploading your file.</h5>';
        }
    }
}
?>

<html lang="en">
    <head>
        <title>SMS Submit Assignment</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <?php include 'template/header.php'; ?>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="assignment">Select file to upload (PDF):</label>
                            <input type="file" class="form-control-file" name="assignment" id="assignment">
                        </div>
                        <button type="submit" class="btn btn-primary" name="btnSubmit">Upload</button>
                    </form>
                </div>
                <?php if(isset($msg)){ echo $msg; }?>
            </div>
        </div>
    </body>
</html>
