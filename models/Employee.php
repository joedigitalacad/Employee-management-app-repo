<?php 

	/**================= EMPLOYEE ================
	 * This is the class that holds all database *functionalities for the employee
	 * @package: IUC EEmployee App
	 * @Developer: IUC DEVELOPER
	 */
	 include 'Database.php';
	class Employee extends Database
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function getData($query)
		{
			$data = array();
			$result = $this->connect->query($query);
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}

		public function executeQuery($query)
		{
			$result = $this->connect->query($query);
			if ($result) {
				return true;
			}else{
				return false;
			}
		}

		public function deleteData($id, $table)
		{
			$sql = "DELETE FROM '$table' WHERE id='$id'";
			$result = $this->connect->query($sql);
			if ($result) {
				return true;
			}else{
				return false;
			}
		}

		public function employeeExist($email, $username)
		{
			$sql = "SELECT * FROM employee WHERE email='$email' OR username='$username'";
			$result = $this->connect->query($sql);
			$num_rows = $result->num_rows;
			if ($num_rows > 0) {
				return true;
			}else{
				return false;
			}
		}

		public function saniticeData($data)
		{
			return mysqli_real_escape_string($this->connect,$data);
		}
		
		public function countNumEmployee()
		{
			$sql = "SELECT * FROM employee";
			$result = $this->connect->query($sql);
			$rows = $result->num_rows;
			return $rows;
		}

	}// class ends here

 ?>