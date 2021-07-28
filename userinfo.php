<html>
    <head>
        <meta charset="UTF-8">
        <title>User Profile</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <style>
            .with-margin{
                margin-bottom: 7px;
                margin-top: 5px;
            }
        </style>
    </head>
	
    <body>
		<?php require_once './student.php';?>
		<div class="container">
			<div class="row with-margin">
				<div class="col-sm-12">
					<form action="add_student.php">
						<button class="btn btn-default" type="submit">Add Student</button>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Student name</th>
									<th>Email address</th>
									<th>Phone number</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$students = Student::getAll();
									foreach ($students as $student){
										echo "<tr>";
										echo "<td>{$student->getFullname()}</td>";
										echo "<td>{$student->getEmail()}</td>";
										echo "<td>{$student->getPhone()}</td>";
										echo "<tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
			