<?php 
require_once './user.php';
if (isset($_POST['btnSubmit'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];
	$fullname = $_POST['fname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$role = $_POST['role'];
	$user = new User($username, $password, $fullname, $email, $phone, $role);
	if($user->save()){
		echo 'Student added successfully';
	} else {
		echo 'Added fail';
	}
}
?>

<html>
	<head>
		<title>Add student</title>
		<meta charset="UTF-8"/>
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<div class="container">
			<form action="#" method="post">
				<div class="form-group">
					<label for="username">Username:</label>
					<input type="text" class="form-control" name="user" required>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" class="form-control" name="pass" required>
				</div>
				<div class="form-group">
					<label for="fullname">Student full name:</label>
					<input type="text" class="form-control" name="fname" required>
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" name="email" required>
				</div>
				<div class="form-group">
					<label for="phone">Phone number:</label>
					<input type="tel" pattern="[0-9]{10}" placeholder="0123456789" class="form-control" name="phone" required>
				</div>
				<div class="form-group">
					<label for="role">Role:</label>
					<select id="role" name="role">
						<option value="Student">Student</option>
						<option value="Teacher">Teacher</option>
					</select>
				</div>
				<button type="submit" class="btn btn-default" name="btnSubmit">Add</button>
			</form>
		</div>
	</body>
</html>