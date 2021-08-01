<?php
require_once './dbconnection.php';

class User {
    
    private $username;
    private $password;
    private $fullname;
    private $email;
    private $phone;
    private $role;
    
    function __construct($username, $password, $fullname, $email, $phone, $role) {
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->phone = $phone;
        $this->role = $role;
    }
    
    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }
    
    function getFullname() {
        return $this->fullname;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhone() {
        return $this->phone;
    }

    function getRole() {
        return $this->role;
    }
    
    public function save(){
        // Get connection
        $conn = DbConnection::getConnection();
        
        $user = $this->getUsername();
        $pass = $this->getPassword();
        $fullname = $this->getFullname();
        $email = $this->getEmail();
        $phone = $this->getPhone();
        $role = $this->getRole();
        
        // Query
        $query = "INSERT INTO user(username, password, fulname, email, phone, role) VALUES (?, ?, ?, ?, ?, ?);";
        // Prepare and bind
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss", $user, $pass, $fullname, $email, $phone, $role);
        
        // execute
        $ret = $stmt->execute();
        // close connection
        DbConnection::closeConnection($conn);
        return $ret;
    }
    
    public static function getAll(){
        $rows = array();
        // Get connection
        $conn = DbConnection::getConnection();
        $query = "SELECT * FROM user;";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_object($result)){
                $user = new User($row->username, $row->password, $row->fullname, $row->email, $row->phone, $row->role);
                $rows[] = $user;
            }
        }
        // close connection
        DbConnection::closeConnection($conn);
        return $rows;
    }
    
    public function delete($username){
        // Get connection
        $conn = DbConnection::getConnection();
        $query = "DELETE FROM user WHERE username=?;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s",$username);
        // execute
        $ret = $stmt->execute();
        // close connection
        DbConnection::closeConnection($conn);
        return $ret;
    }
}


