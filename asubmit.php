<?php

include 'static/auth.php';

include 'alist.php';
if(isset($_POST["submit"]) && isset($_FILES["assignment"])){
    if ($_SESSION['teacher']){
        $target_dir = 'uploads/assignment/';
    } elseif ($_SESSION['student']){
        $target_dir = 'uploads/submission/$target/';
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
    </head>
    <body>
        <div class="container" style="margin-top: 47px;">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <h4><label for="assignment">Select file to upload (PDF):</label></h4>
                    <input type="file" class="form-control-file" name="assignment" id="assignment">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Upload</button>
            </form>
            <?php if(isset($msg)){ echo $msg; }?>
        </div>
    </body>
</html>
