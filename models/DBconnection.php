<?php 

	class DBconnection {

		protected $conn;

		function __construct() {
			// Database credentials
			$dbhost = "localhost:3306";
			$dbuser = "root";
			$dbpass = "";
			$dbname = "vxi";
			

			$this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			if(!$this->conn) {
				echo "<strong> ERROR </strong>".mysql_error($this->conn);
			} else {
				//echo "Database connected! :-)<br><br>";
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