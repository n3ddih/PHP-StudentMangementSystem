<?php
require_once './dbconnection.php';

class permission{
	private $username;
	private $password;

	function __contruct($u, $p){
		$this->username = $u;
		$this->password = $p;
	}
	
	function getUsername() {
		return $this->username;
	}

	function getPassword() {
		return $this->password;
	}

	function __toString() {
		$this->getUsername().$this->getPassword();
	}


	function isTeacher(){
		$ret = false;

		$conn = DbConnection::getConnection();
		
		$user = $this->username;
		
		$query = "SELECT role FROM user WHERE username=? AND role='teacher';";
		$prep = $conn->prepare($query);
		$prep->bind_param($user);
		
		$prep->execute();
		if($prep->fetch() == 1){
			$ret = true;
		}
		DbConnection::closeConnection($conn);
		
		return $ret;
	}
	
	function isStudent(){
		$ret = false;

		$conn = DbConnection::getConnection();
		
		$user = $this->username;
		
		$query = "SELECT role FROM user WHERE username=? AND role='student';";
		$prep = $conn->prepare($query);
		$prep->bind_param($user);
		
		$prep->execute();
		if($prep->fetch() == 1){
			$ret = true;
		}
		DbConnection::closeConnection($conn);
		
		return $ret;
	}
}

