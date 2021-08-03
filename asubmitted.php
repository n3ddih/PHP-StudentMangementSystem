<?php

include 'static/auth.php';

if($_SESSION['student']) {
    header("Location: alist.php");
}

if (isset($_POST['submitted'])){
    $path = $_POST['submitted'].'/*';
    $files = glob($path);

    foreach ($files as $filename) {
        if(is_file($filename)){
            $target = basename($filename).PHP_EOL;

            echo '<br><br><button><a href="'.$filename.'"> '.$target.' </a></button>';
        }
    }
}