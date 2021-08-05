<?php
include 'template/auth.php';
require_once 'template/dbconnection.php';

if(isset($_POST['btnSubmit'])){
    $ret = false;
    $answer = $_POST['answer'];
    $hint = $_POST['hint'];
    $conn = DbConnection::getConnection();
    $query = "SELECT * FROM challenge WHERE name=? AND hint=?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $answer, $hint);
    $stmt->execute();
    if($stmt->fetch() == 1){
        $ret = true;
    }
    DbConnection::closeConnection($conn);
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
                        <div class="card-header">Challenge list</div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <?php
                                    $files = glob('uploads/challenge/*');
                                    
                                    foreach ($files as $filename) {
                                        if(is_file($filename)){
                                            $name = trim(basename($filename, '.txt'));
                                            $conn = DbConnection::getConnection();
                                            $query = "SELECT hint FROM challenge WHERE name=?;";
                                            $stmt = $conn->prepare($query);
                                            $stmt->bind_param("s", $name);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $challenge = $result->fetch_array(MYSQLI_ASSOC);
                                            $result->close();
                                            $stmt->close();
                                            
                                            echo '<tr><td>';
                                            $content = file_get_contents($filename);
                                            echo $content;
                                            echo "<p></p>";
                                            echo "<strong>Hint: </strong>".$challenge['hint'];
                                            echo "<p></p>";
                                            echo '
                                            <form method="post" action="#">
                                                <input type="hidden" name="hint" value="'.$challenge['hint'].'">
                                                <div class="form-group">
                                                    <label for="answer">Answer: </label>
                                                    <input type="text" class="form-control" name="answer" id="answer">
                                                </div>
                                                <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
                                            </form>
                                            ';
                                            if(isset($ret)){
                                                if($ret && $hint == $challenge['hint']){
                                                    echo '<h5 style="color:green">Answer is right</h5>';
                                                    unset($ret);
                                                } elseif (!$ret && $hint == $challenge['hint']) {
                                                    echo '<h5 style="color:red">Wrong answer</h5>';
                                                    unset($ret);
                                                }
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