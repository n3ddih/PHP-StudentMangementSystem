<?php

include 'static/auth.php';

$files = glob('uploads/assignment/*');

foreach ($files as $filename) {
    if(is_file($filename)){
        $target = basename($filename, ".pdf").PHP_EOL;
        $submit_path = "uploads/submission/". trim($target);
        if(!file_exists($submit_path)){
            mkdir($submit_path, 0777, true);
        }
        
        echo '<br><br><p>'.$target.'</p>'
            . '<button style="float:left;margin-right: 8px;"><a href="'.$filename.'">Download</a></button>'
            . '<button style="float:left;margin-right: 8px;"><a href=asubmit.php>Submit assignment</a></button>'
            . '<form action="asubmitted.php" method="post" style="float:left;margin-right: 8px;">'
                . '<button class="btn" type="submit" name="submitted" value="'.$submit_path.'">View submitted</button></form>';
    }
}