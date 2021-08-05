<?php

include 'template/auth.php';

if($_SESSION['student']) {
    header("Location: alist.php");
}

if (isset($_POST['submitted'])){
    $path = $_POST['submitted'].'/*';
    $files = glob($path);
} else {
    header("Location: alist.php");
}
?>

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
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">Assignments list</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(isset($files)){
                                        foreach ($files as $filename) {
                                            if(is_file($filename)){
                                                $target = basename($filename).PHP_EOL;
                                                echo '<tr>';
                                                echo '<td>'.$target.'</td>'
                                                    . '<td>'
                                                    . '<button class="btn btn-default" style="float:right;margin-right: 8px;"><a href="'.$filename.'">Download</a></button>';
                                                echo '</td></tr>';
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>