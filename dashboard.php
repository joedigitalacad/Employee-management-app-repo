<?php include 'includes/header.php'; ?>
<?php 
include 'models/Employee.php';
$employee = new Employee();
$sql = "SELECT * FROM employee";
$result = $employee->getData($sql);
//print_r($result);

// number of
$employeeNumber = $employee->countNumEmployee();

 ?>


 <!-- fntionaity to delete employee record in the database -->
 <?php 
 	if (isset($_GET['emp_id'])) {
 		echo '<script>confirm("Are you sure you want to delete this record?"); </script>';
 		$id = $_GET['emp_id'];
 		$sql = "DELETE FROM employee WHERE id='$id'";
 		$result = $employee->executeQuery($sql);
 		if ($result) {
 			echo '<p style="padding: 10px; background: green; color: #fff; width; 50%; margin: auto;">' . 'Data has been succesfully deleted from the database' . '</p>';
 			header("location: dashboard.php");
 		}
 	}

  ?>
<br><br>
<div class="row">
		<div class="card w-95 center" style="margin: auto;">
			<div class="card text-center">
			  <div class="card-header">
			    EMPLOYEES REGISTERED IN THE APPLICATION
			    <a href="index.php" class="btn btn-primary" style="float: right;">Register Employee</a>
			  </div>
			  <div class="card-body">
			   <div class="table">
			   	<table class="table table-hover">
			   		<thead>
			   			<th>Full Name</th>
			   			<th>Username</th>
			   			<!-- <th>Username</th> -->
			   			<th>Email</th>
			   			<th>Department</th>
			   			<th>Matricule</th>
			   			<th>Address</th>
			   			<th>Phone Number</th>
			   			<th>Gender</th>
			   			<th>Edit</th>
			   			<th>View</th>
			   			<th>Delete</th>
			   		</thead>
			   		<tbody>
			   			<?php foreach ($result as $employee): ?>
			
			   			<tr>
			   				<td><?php echo $employee['fullname']; ?></td>
			   				<td><?php echo $employee['username']; ?></td>
			   				<td><?php echo $employee['email']; ?></td>
			   				<td><?php echo $employee['department']; ?></td>
			   				<td><?php echo $employee['matricule']; ?></td>
			   				<td><?php echo $employee['address']; ?></td>
			   				<td><?php echo $employee['number']; ?></td>
			   				<td><?php echo $employee['gender']; ?></td>

			   				<td><a href="index.php?emp_id=<?php echo $employee['id'];?>" class="btn btn-warning">Edit</a></td>

			   				<td><a href="viewEmployee.php?emp_id=<?php echo $employee['id'];?>" class="btn btn-primary">View</a></td>

			   				<td><a href="dashboard.php?emp_id=<?php echo $employee['id'];?>" class="btn btn-danger">Delete</a></td>
			   			</tr>
			   			<?php endforeach ?>
			   		</tbody>
			   	</table>
			   </div>
			  </div>
			  <div class="card-footer text-muted">
			    Number of registered Employee:  <strong><?php echo $employeeNumber; ?>	</strong>
			  </div>
			</div>
		</div>
</div>


<br><br>
<?php include 'includes/footer.php'; ?>