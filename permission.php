<?php
require_once './dbconnection.php';

class permission{
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
        
        $query = "SELECT * FROM user WHERE username=? AND role='teacher';";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s",$user);
        
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
        
        $query = "SELECT * FROM user WHERE username=? AND role='student';";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $user);
        
        $stmt->execute();
        if($stmt->fetch() == 1){
            $ret = true;
        }
        DbConnection::closeConnection($conn);
        
        return $ret;
    }
}
?>