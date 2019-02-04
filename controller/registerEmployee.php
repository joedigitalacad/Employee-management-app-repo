<?php 
// including the Employee class
include '../models/Employee.php';
$employee = new Employee();

// getting the employee input
$fullname = $employee->saniticeData($_POST['fullname']);
$username = $employee->saniticeData($_POST['username']);
$department = $employee->saniticeData($_POST['department']);
$matricule = $employee->saniticeData($_POST['matricule']);
$email = isValidEmail($_POST['email']);
$number = isValidNumber($_POST['number']);
$address = $employee->saniticeData($_POST['address']);
$gender = $employee->saniticeData($_POST['gender']);
$bio = $employee->saniticeData($_POST['bio']);

// if email is valid assign it to a variable
if ($email) {
	$newEmail = $employee->saniticeData($_POST['email']);
}else{
	echo "Email is not valid";
	// redirect to registration page
}

// if number is valid assign it to a variable
if ($number) {
	$newNumber = $employee->saniticeData($_POST['number']);
}else{
	echo "Number is not valid";
	// redirect to registration page
}


// update user query if it is an update
if (isset($_POST['emp_id'])) {
	$id = $_POST['emp_id'];
	$query = "UPDATE employee SET fullname='$fullname', username='$username', department='$department', number='$newNumber', address='$address', gender='$gender', matricule='$matricule', email='$newEmail', biography='$bio' WHERE id='$id'";

	$queryResult = $employee->executeQuery($query);
	if ($queryResult) {
		echo '<p style="background: green; color: #fff; padding: 5px;">'. $username . ' has been successfully updated to the database' .'</p>';
		// redirect to the dashboard
		header("Refresh:4;url=http://localhost/crud/dashboard.php");
	}
	exit;
}




// check if the employee exist in the database
if ($employee->employeeExist($newEmail, $username)) {
	echo '<p style="background: red; color: #fff; padding: 5px;">This employee already exists in the database</p>';
	// redirect back to the registraction page
	exit;
}else{
	$query = "INSERT INTO employee(fullname, username, department, number, address, gender, matricule, email, biography) VALUES('$fullname', '$username', '$department', '$newNumber', '$address', '$gender', '$matricule', '$newEmail', '$bio')";

	$queryResult = $employee->executeQuery($query);
	if ($queryResult) {
		echo '<p style="background: green; color: #fff; padding: 5px;">New User succesfully added to the app...</p>';
		// redirect to the dashboard
		header("Refresh:4;url=http://localhost/IUC_Akwa_Emp_APp/dashboard.php");
	}else{
		echo '<p style="background: red; color: #fff; padding: 5px;">Unable to register the employee to the database. check connection</p>';
		// redirect to the registration page
		header("Refresh:4;url=http://localhost/IUC_Akwa_Emp_APp/");
	}
}





// validate number
function isValidNumber($number)
{
	if (preg_match('/^[0-9]+$/', $number)) {
		return true;
	}else{
		return false;
	}
}

// email validation function
function isValidEmail($email)
{
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return true;
	}else{
		return false;
	}
}







 ?>