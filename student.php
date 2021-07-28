<?php
require_once './dbconnection.php';

class Student {
	
	private $username;
	private $password;
	private $fullname;
	private $email;
	private $phone;
	
	function __construct($username, $password, $fullname, $email, $phone) {
		$this->username = $username;
		$this->password = $password;
		$this->fullname = $fullname;
		$this->email = $email;
		$this->phone = $phone;
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

	function save(){
		// Get connection
		$conn = DbConnection::getConnection();
		// Query
		$query = "INSERT INTO student(username, password, fulname, email, phone, isTeacher) VALUES (?, ?, ?, ?, ?, ?);";
		// Prepare and bind
		$con_prep = $conn->prepare($query);
		$con_prep->bind_param($user, $pass, $fullname, $email, $phone);
		
		$user = $this->getUsername();
		$pass = $this->getPassword();
		$fullname = $this->getFullname();
		$email = $this->getEmail();
		$phone = $this->getPhone();
		
		// execute
		$ret = $con_prep->execute();
		// close connection
		DbConnection::closeConnection($conn);
		return $ret;
	}
	
	function getAll(){
		$rows = array();
		// Get connection
		$conn = DbConnection::getConnection();
		$query = "SELECT * FROM student";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_object($result)){
				$student = new Student($row->username, $row->password, $row->fullname, $row->email, $row->phone);
				$rows[] = $student;
			}
		}
		// close connection
		DbConnection::closeConnection($conn);
		return $rows;
	}

}

?>
