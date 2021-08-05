<?php include 'template/auth.php';?>
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
                                    $files = glob('uploads/assignment/*');

                                    foreach ($files as $filename) {
                                        if(is_file($filename)){
                                            $target = trim(basename($filename, ".pdf"));
                                            $submit_path = "uploads/submission/". $target;
                                            if(!file_exists($submit_path)){
                                                mkdir($submit_path, 0777, true);
                                            }
                                            echo '<tr>';
                                            echo '<td>'.$target.'</td>'
                                                . '<td>'
                                                . '<a class="btn btn-primary" style="float:right;margin-right: 8px;" href="'.$filename.'">Download</a>';
                                            echo '<form action="asubmit.php" method="post" style="float:right;margin-right: 8px;">'
                                                . '<button class="btn btn-primary" type="submit" name="upload_path" value="'.$submit_path.'">Submit assignment</button></form>';

                                            if($_SESSION['teacher']){
                                                echo '<form action="asubmitted.php" method="post" style="float:right;margin-right: 8px;">'
                                                . '<button class="btn btn-primary" type="submit" name="submitted" value="'.$submit_path.'/'.'">View submitted</button></form>';
                                            }
                                            echo '</td></tr>';
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