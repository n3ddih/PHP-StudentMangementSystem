<?php

class permission{
    public $username;
    public $password;

    function __contruct($u, $p){
        $this->username = $u;
        $this->password = $p;
    }

    function __toString(){
        return $u.$p;
    }

    function isTeacher(){
        $is_teacher = false;

        $hostname = 'localhost:3306';
        $username = 'root';
        $password = '';
        $dbname = 'smsdb';
        $conn = mysqli_connect($hostname, $username, $password, $dbname);

        if(!$conn) {
                die('Cannot connect to the database ' . mysqli_error($conn));
                exit();
        }

        echo "Connect to database successfully";
        
        $user = $this->username;
        $pass = $this->password;
        
        mysqli_close($conn);
    }
}

?>