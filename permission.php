<?php
require_once './dbconnection.php';

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

        $conn = DbConnection::getConnection();
        
        $user = $this->username;
        $pass = $this->password;
        
        DbConnection::getConnection($conn);
    }
}

?>