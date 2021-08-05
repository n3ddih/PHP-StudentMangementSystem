<?php

class DbConnection {
    
    public static function getConnection(){
        $hostname = 'localhost:3306';
        $username = 'smsadmin';
        $password = 'admin@SMS1';
        $dbname = 'smsdb';
        $conn = new mysqli($hostname, $username, $password, $dbname);

        if($conn->connect_error) {
            die('Cannot connect to the database ' . mysqli_error($conn));
            exit();
        }
        return $conn;
    }
    
    public static function closeConnection($link) {
        mysqli_close($link);
    }
}
