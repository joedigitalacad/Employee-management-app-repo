<?php include 'includes/header.php'; ?>
<?php include 'models/Employee.php'; ?>
<br><br>
<?php 

	$id = $_GET['emp_id'];
	$employee = new Employee();
	$sql = "SELECT * FROM employee WHERE id='$id'";
	$employeeInstance = $employee->getData($sql);
	//print_r($employeeInstance);

 ?>

<div class="row">
	<div class="card w-95 center" style="margin: auto;">
		<div class="card text-center">
			<?php foreach ($employeeInstance as $employee): ?>
				
			
			<div class="card-header">
				Details For <strong><?php echo $employee['fullname']; ?></strong>
			</div><!-- // card header-->
			<div class="card-body">
				<ul>
					<li><strong>Fullname:</strong> <?php echo $employee['fullname']; ?></li>
					<li><strong>Username:</strong> <?php echo $employee['username']; ?></li>
					<li><strong>Department:</strong> <?php echo $employee['department']; ?></li>
					<li><strong>Number:</strong><?php echo $employee['number']; ?></li>
					<li><strong>Address:</strong> <?php echo $employee['address']; ?></li>
					<li><strong>Gender:</strong> <?php echo $employee['gender']; ?></li>
					<li><strong>Matricule:</strong> <?php echo $employee['matricule']; ?></li>
					<li><strong>email:</strong> <?php echo $employee['email']; ?></li>
					<li><strong>Biography:</strong> <?php echo $employee['biography']; ?></li>
				</ul>
			</div><!-- // card body ends -->
			<div class="card-footer">
				<p>Go back to <a href="dashboard.php"> Dashboard</a></p>
			</div>
			<?php endforeach ?>
		</div>
	</div>

</div>



<?php include 'includes/footer.php'; ?>