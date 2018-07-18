<?php 

	class DBconnection {

		protected $conn;

		function __construct() {
			// Database credentials
			$dbhost = "localhost:3306";
			$dbuser = "root";
			$dbpass = "";
			$dbname = "vxi";
			

			$this->conn = mysqli_connect($dbhost, $dbuser, $dbpass);

			if(!$this->conn) {
				echo "<strong> ERROR </strong>".mysql_error($this->conn);
			}
			echo "Host connected!<br>";
			$selectdb = mysqli_select_db($this->conn,$dbname);
			if(empty($selectdb)){
				//echo "database not found! <br>";
				$createDB = "CREATE DATABASE vxi";
				$queryDB = mysqli_query($this->conn,$createDB);
				if($queryDB){
					echo "Database created! <br>";
				}else{
					echo "Creating Database Error! <br>";
				}
			}else{
				echo "Database Exist!<br>";
				$checkUsers = "SELECT * from users";
				$query = mysqli_query($this->conn,$checkUsers);
				if(!$query){
					echo "Table not found <br>";
					$createU = "CREATE TABLE `users` (
							  `id` int(11) NOT NULL AUTO_INCREMENT,
							  `username` varchar(20) NOT NULL,
							  `password` varchar(20) NOT NULL,
							  `fname` varchar(20) NOT NULL,
							  `lname` varchar(20) NOT NULL,
							  `role` enum('admin','registrar') NOT NULL,
							  PRIMARY KEY (id)
							) ENGINE=InnoDB DEFAULT CHARSET=latin1";
					$query = mysqli_query($this->conn,$createU);
					if($query){
						echo "Table User Created!<br>";
					}
				} else {
					echo "Table Users Exist <br>";
					
				}

				$checkApp = "SELECT * from applicants";
				$query = mysqli_query($this->conn,$checkApp);
				if(!$query){
					echo "Table applicants not found <br>";
					$createA = "CREATE TABLE `applicants` (
							  `app_site` varchar(30) NOT NULL,
							  `app_date` varchar(30) NOT NULL,
							  `l_name` varchar(30) NOT NULL,
							  `f_name` varchar(30) NOT NULL,
							  `m_name` varchar(30) NOT NULL,
							  `gen_source` varchar(30) NOT NULL,
							  `erp_name` varchar(30) DEFAULT NULL,
							  `erp_hrid` mediumint(9) DEFAULT NULL,
							  `erp_acc` varchar(30) DEFAULT NULL,
							  `Trk_ID` int(12) NOT NULL AUTO_INCREMENT,
							  PRIMARY KEY (Trk_ID)
							) ENGINE=InnoDB DEFAULT CHARSET=latin1";
					$query = mysqli_query($this->conn,$createA);
					if($query){
						echo "Table Applicants Created!<br>";
					}
				} else {
					echo "Table Applicants Exist <br>";
				}

				$checkEmp = "SELECT * from employees";
				$query = mysqli_query($this->conn,$checkEmp);
				if(!$query){
					echo "Table employees not found <br>";
					$createE = "CREATE TABLE `employees` (
							  `Emp_ID` int(12) NOT NULL,
							  `Emp_Name` varchar(30) NOT NULL,
							  `Emp_Bday` date NOT NULL,
							  `Emp_Hday` date NOT NULL,
							  `Emp_Gender` tinytext NOT NULL,
							  `Emp_SupID` mediumint(30) NOT NULL,
							  `Emp_Title` varchar(30) NOT NULL,
							  `Emp_Tname` varchar(30) NOT NULL,
							  `Emp_Status` varchar(30) NOT NULL,
							  `Emp_Site` varchar(30) NOT NULL,
							  PRIMARY KEY (Emp_ID)
							) ENGINE=InnoDB DEFAULT CHARSET=latin1";
					$query = mysqli_query($this->conn,$createE);
					if($query){
						echo "Table Employees Created!<br>";
					}
				} else {
					echo "Table Employees Exist <br>";
				}

				$checkEmp = "SELECT * from erp";
				$query = mysqli_query($this->conn,$checkEmp);
				if(!$query){
					echo "Table erp not found <br>";
					$createE = "CREATE TABLE `erp` (
							  `ERP_ID` int(12) NOT NULL AUTO_INCREMENT,
							  `App_Name` varchar(30) NOT NULL,
							  `App_Site` varchar(30) NOT NULL,
							  `ERP_Site` varchar(30) NOT NULL,
							  `ERP_Acc` varchar(30) NOT NULL,
							  `Trk_ID` int(11) NOT NULL,
							  PRIMARY KEY (ERP_ID)
							) ENGINE=InnoDB DEFAULT CHARSET=latin1";
					$query = mysqli_query($this->conn,$createE);
					if($query){
						echo "Table ERP Created!<br>";
					}
				} else {
					echo "Table ERP Exist <br>";
				}
			}
			

		}
			function runQuery($query) {
		
		$result = mysqli_query($this->conn, $query);
		
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}

		function close(){
			mysqli_close($this->conn);
		}

	}


?>