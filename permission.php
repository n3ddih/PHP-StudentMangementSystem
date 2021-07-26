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
		$connection = mysqli_connect("localhost", "root", "");
	}
}

?>