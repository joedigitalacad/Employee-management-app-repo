<?php include 'includes/header.php'; ?>
<?php include 'models/Employee.php'; ?>
<?php 
	// creatig an instance of the employee class
$employee = new Employee();
	// creating global variables
	$fullname = "";
	$username= "";
	$email = "";
	$number = "";
	$gender = "";
	$bio = "";
	$matricule = "";
	$address = "";
	$department = "";

	if (isset($_GET['emp_id'])) {
		$id = $_GET['emp_id'];
		$sql = "SELECT * FROM employee WHERE id='$id'";
		$result = $employee->getData($sql);
		//print_r($result);
		foreach ($result as $employee) {
			$fullname = $employee['fullname'];
			$username= $employee['username'];
			$email = $employee['email'];
			$number = $employee['number'];
			$gender = $employee['gender'];
			$bio = $employee['biography'];
			$matricule = $employee['matricule'];
			$address = $employee['address'];
			$department = $employee['department'];
		}
	}


 ?>

<br><br>
<div class="row">
		<div class="card w-75 center" style="margin: auto;">
			<div class="card text-center">
			  <div class="card-header">
			   EMPLOYEE REGISTRATION PAGE
			  </div>
			  <div class="card-body">
			    <form method="post" action="controller/registerEmployee.php" enctype="multipart/form-data">
			    	<?php if (isset($_GET['emp_id'])): ?>
			    		<input type="hidden" name="emp_id" value="<?php echo $_GET['emp_id']; ?>">
			    	<?php endif ?>
				  <div class="row">
				    <div class="col">
				      <input type="text" class="form-control" placeholder="First name" required="" name="fullname" id="fullname" value="<?php if($fullname) echo $fullname;?>">
				    </div>
				    <div class="col">
				      <input type="text" class="form-control" placeholder="Username" name="username" id="username" required="" value="<?php if($username) echo $username;?>">
				    </div>
				  </div> <br><!-- end if first row -->
				  <div class="row">
				    <div class="col">
				    	<select name="department" id="department" required="" class="form-control">

				    	<?php if ($department): ?>
				    		<option selected="selected" value="<?php echo $department;?>"><?php echo $department;?></option>
				    	<?php endif ?>
				    		<option value=""></option>
				    		<option value="IT Department">IT Department</option>
				    		<option value="Quality Assurance Team">Quality Assurance Team</option>
				    		<option value="Programmers">Programmers</option>
				    	</select>
				    </div>
				    <div class="col">
				      <input type="text" class="form-control" placeholder="Employee Matricule Number" name="matricule" id="matricule" required="" value="<?php if($matricule) echo $matricule;?>">
				    </div>
				  </div><br> <!-- end if first row -->
				  <div class="row">
				    <div class="col">
				      <input type="email" class="form-control" placeholder="Email" required="" name="email" id="email" value="<?php if($email) echo $email;?>">
				    </div>
				    <div class="col">
				      <input type="text" class="form-control" placeholder="Phone Number"  required="" name="number" id="number" value="<?php if($number) echo $number;?>">
				    </div>
				  </div> <br> <!-- end if first row -->
				  <div class="row">
				    <div class="col">
				      <input type="address" class="form-control" placeholder="Address" required="" name="address" id="address" value="<?php if($address) echo $address;?>">
				    </div>
				    <div class="col">
				    	<select name="gender" class="form-control">

				    		<?php if ($gender): ?>
				    			<option selected="selected"><?php echo $gender;?></option>
				    		<?php endif ?>
				    		<option value="Male">Male</option>
				    		<option value="Female">Female</option>
				    	</select>
				      <!-- <div style="float: left;">
				      	Male: <input type="radio" name="gender" value="Male" class="form-control">
				      </div>
				      <div style="float: right;">
				      	Female: <input type="radio" name="gender" value="Female" class="form-control">
				      </div> -->
				    </div>
				  </div> <br> <!-- end if first row -->
				  <div class="row">
				    <div class="col">
				      <textarea class="form-control" rows="3" placeholder="Tell Us your Bio" required="" name="bio" id="bio"><?php if($bio) echo $bio;?></textarea>
				    </div>
				  </div> <br> <!-- end if first row -->
				  <input type="submit" class="form-control btn btn-primary" name="submit">
				</form>
			  </div>
			  <div class="card-footer text-muted">
			   Go Back to  <a href="dashboard.php">Dashboard</a>
			  </div>
			</div>
		</div>
</div>


<br><br>
<?php include 'includes/footer.php'; ?>

















