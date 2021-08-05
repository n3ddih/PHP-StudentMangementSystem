<?php
require_once 'template/dbconnection.php';

class Permission{
    protected $username;
    protected $password;

    function __construct($u, $p){
        $this->username = $u;
        $this->password = $p;
    }
    
    function __toString() {
        return $this->username.":".$this->password;
    }

    function isTeacher(){
        $ret = false;

        $conn = DbConnection::getConnection();
        
        $user = $this->username;
        $pass = $this->password;
        
        $query = "SELECT * FROM user WHERE username=? AND password=? AND role='teacher';";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss",$user, $pass);
        
        $stmt->execute();
        if($stmt->fetch() == 1){
            $ret = true;
        }
        DbConnection::closeConnection($conn);
        
        return $ret;
    }
    
    function isStudent(){
        $ret = false;

        $conn = DbConnection::getConnection();
        
        $user = $this->username;
        $pass = $this->password;
        
        $query = "SELECT * FROM user WHERE username=? AND password=? AND role='student';";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss",$user, $pass);
        
        $stmt->execute();
        if($stmt->fetch() == 1){
            $ret = true;
        }
        DbConnection::closeConnection($conn);
        
        return $ret;
    }
}
