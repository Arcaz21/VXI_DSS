<?php include "../models/DBconnection.php"; 
include("Classes/PHPExcel/IOFactory.php");
date_default_timezone_set('UTC');
class importModel extends DBconnection {

	function importEmp($file){
			$query = "TRUNCATE TABLE employees";
			$result = mysqli_query($this->conn, $query);
			try {
				//Load the excel(.xls/.xlsx) file
				$objPHPExcel = PHPExcel_IOFactory::load($file);
			} catch (Exception $e) {
				die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME). '": ' . $e->getMessage());
			}
				
			//An excel file may contains many sheets, so you have to specify which one you need to read or work with.
			$sheet = $objPHPExcel->getSheet(0);
			//It returns the highest number of rows
			$total_rows = $sheet->getHighestRow();
			//It returns the highest number of columns
			$highest_column = $sheet->getHighestColumn();
			
			$query = "INSERT INTO `employees` (`Emp_ID`, `Emp_Name`, `Emp_Bday`, `Emp_Hday`, `Emp_Gender`, `Emp_SupID`, `Emp_Title`, `Emp_Tname`, `Emp_Status`, `Emp_Site`) VALUES ";
			//Loop through each row of the worksheet
			for($row =2; $row <= $total_rows; $row++) {
				//Read a single row of data and store it as a array.
				//This line of code selects range of the cells like A1:D1
				$single_row = $sheet->rangeToArray('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
				//Creating a dynamic query based on the rows from the excel file
				$query .= "(";
				//Print each cell of the current row
				foreach($single_row[0] as $key=>$value) {
					$query .= "'".mysqli_real_escape_string($this->conn, $value)."',";
				}
				$query = substr($query, 0, -1);
				$query .= "),";
			}
			$query = substr($query, 0, -1);
			// At last we will execute the dynamically created query an save it into the database
			$result = mysqli_query($this->conn, $query);
			$error = mysqli_errno($this->conn);
			$count = mysqli_affected_rows($this->conn);
			if(mysqli_affected_rows($this->conn) > 0) {
				return $count;
				//$_SESSION['update'] ="Successfully updated employee Database";
			} else {
				return $error;
				//$_SESSION['failed'] ="<b>"."Can't update database."."</b>"." Error: \"".$error."\"";
			}
			// Finally we will remove the file from the uploads folder (optional) 
			unlink($file);
	}
	function importApp($file){
		$query = "TRUNCATE TABLE applicants";
		$result = mysqli_query($this->conn, $query);
			try {
				//Load the excel(.xls/.xlsx) file
				$objPHPExcel = PHPExcel_IOFactory::load($file);
			} catch (Exception $e) {
				die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME). '": ' . $e->getMessage());
			}
				
			//An excel file may contains many sheets, so you have to specify which one you need to read or work with.
			$sheet = $objPHPExcel->getSheet(0);
			//It returns the highest number of rows
			$total_rows = $sheet->getHighestRow();
			//It returns the highest number of columns
			$highest_column = $sheet->getHighestColumn();
			
			$query = "INSERT INTO `applicants` (`app_site`, `app_date`, `l_name`, `f_name`, `m_name`, `gen_source`, `erp_name`, `erp_hrid`, `erp_acc`) VALUES ";
			//Loop through each row of the worksheet
			for($row =2; $row <= $total_rows; $row++) {
				//Read a single row of data and store it as a array.
				//This line of code selects range of the cells like A1:D1
				$single_row = $sheet->rangeToArray('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
				//Creating a dynamic query based on the rows from the excel file
				$query .= "(";
				//Print each cell of the current row
				foreach($single_row[0] as $key=>$value) {
					$query .= "'".mysqli_real_escape_string($this->conn, $value)."',";
				}
				$query = substr($query, 0, -1);
				$query .= "),";
			}
			$query = substr($query, 0, -1);
			// At last we will execute the dynamically created query an save it into the database
			$result = mysqli_query($this->conn, $query);
			$error = mysqli_error($this->conn);
			$count = mysqli_affected_rows($this->conn);
			if(mysqli_affected_rows($this->conn) > 0) {
				return $count;
				//$_SESSION['update'] ="<b> Successfully updated applicant database. </b><i>".$count." applicants added. </i> ";
			} else {
				return $error;
				//$_SESSION['failed'] ="<b>"."Can't update database."."</b>"." Error: \"".$error."\"";
			}
			// Finally we will remove the file from the uploads folder (optional) 
			unlink($file);
	}
}
class userModel extends DBconnection{

	function getUse($username) {
			
			$query = "SELECT username, password, fname, lname, role FROM users
					  WHERE username = \"".$username."\"
					  LIMIT 1
					  ";

			$result = mysqli_query($this->conn, $query);
			
			// if there is an error in your query, an error message is displayed.
			if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}
			$row = $result->fetch_object();
			return $row;
		}
}
class statisticModel extends DBconnection{
// ERP GENERATOR v1
	function getErp(){

			$result = mysqli_query($this->conn, 'SELECT applicants.app_date, concat(applicants.f_name," ", applicants.m_name," ", applicants.l_name) as app_name, employees.Emp_ID, employees.Emp_Name, employees.Emp_Tname, employees.Emp_Site
			FROM applicants join employees
			ON applicants.erp_hrid = employees.Emp_ID or applicants.erp_name = employees.Emp_Name');
			$res = array();
	            while ($row = mysqli_fetch_array($result)){
	                array_push($res, $row);
	            }
	            return ($result->num_rows>0)? $res: FALSE;
	}

	function addErp($erp){
		
		$query ="INSERT INTO `erp` (`App_Date`, `App_Name`, `Emp_ID`, `Emp_Name`, `Emp_Tname`, `Emp_Site`) 
            VALUES (
            \"".$erp['App_Date']."\",
            \"".$erp['App_Name']."\",
            \"".$erp['Emp_ID']."\",
            \"".$erp['Emp_Name']."\",
            \"".$erp['Emp_Tname']."\",
            \"".$erp['Emp_Site']."\"
            )";
            $result = mysqli_query($this->conn, $query);
            $error = mysqli_error($this->conn);
            if($result){
                return (($result)? TRUE:FALSE);
            }else{
                echo "ERROR ADDING ERP ".$error;
                //header('Location: error.php');
            } 
            
	}
//END
	
// ERP GENERATOR v2
    function saveAll(){
    	$start = microtime(true);
	    // create a file pointer connected to the output stream
	    $output = fopen('uploads/erp.csv', 'w');

	    // output the column headings
	    fputcsv($output, array('Date', 'Applicant Name', 'Employee ID', 'Employee Name', 'Employee Team Name', 'Employee Site Location'));

	    // fetch the data
	    // mysql_connect('localhost', 'root', '');
	    // mysql_select_db('pod');
	    $rows = mysqli_query($this->conn,'SELECT applicants.app_date, concat(applicants.f_name," ", applicants.m_name," ", applicants.l_name), employees.Emp_ID, employees.Emp_Name, employees.Emp_Tname, employees.Emp_Site
			FROM applicants join employees
			ON applicants.erp_hrid = employees.Emp_ID or applicants.erp_name = employees.Emp_Name');

	    // loop over the rows, outputting them
	    while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);
	    $end = microtime(true) - $start;
	    return TRUE;
    }

    function read($name){
    	$query = "TRUNCATE TABLE erp";
    	$result = mysqli_query($this->conn, $query);
		$trun = mysqli_query($this->conn, $query);
		if($trun){
			$result = mysqli_query($this->conn, '
	        LOAD DATA INFILE "'.$name.'"
	        INTO TABLE erp
	        FIELDS TERMINATED by \',\'
	        LINES TERMINATED BY \'\n\'
	        IGNORE 1 LINES
	        ');
			if($result){
				unlink($name);
				return TRUE;
			}else{
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}
		}
    		
    }
//END
    function getRob() {
    	$query = "SELECT count(App_Name) as count from erp 
		WHERE Emp_Site = 'DVROB'";
		//print_r($query);
    	$result = mysqli_query($this->conn, $query);
			if(!$result) {
	            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
	        }
	        $rob = $result->fetch_object();
	        return $rob;
    }
    function getSM() {
    	$query = "SELECT count(App_Name) as count from erp 
		WHERE Emp_Site = 'DVSM' ";
		//print_r($query);
    	$result = mysqli_query($this->conn, $query);
			if(!$result) {
	            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
	        }
	        $rob = $result->fetch_object();
	        return $rob;
    }
    function getCen() {
    	$query = "SELECT count(App_Name) as count from erp 
		WHERE Emp_Site = 'DVCEN' ";
		//print_r($query);
    	$result = mysqli_query($this->conn, $query);
			if(!$result) {
	            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
	        }
	        $rob = $result->fetch_object();
	        return $rob;
    }
    function getMkt() {
    	$query = "SELECT count(App_Name) as count from erp 
		WHERE Emp_Site = 'MKSMC' ";
		//print_r($query);
    	$result = mysqli_query($this->conn, $query);
			if(!$result) {
	            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
	        }
	        $rob = $result->fetch_object();
	        return $rob;
    }
    function getPan1() {
    	$query = "SELECT count(App_Name) as count from erp 
		WHERE Emp_Site = 'QCPAN1' ";
		//print_r($query);
    	$result = mysqli_query($this->conn, $query);
			if(!$result) {
	            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
	        }
	        $rob = $result->fetch_object();
	        return $rob;
    }
    function getPan2() {
    	$query = "SELECT count(App_Name) as count from erp 
		WHERE Emp_Site = 'QCPAN2' ";
		//print_r($query);
    	$result = mysqli_query($this->conn, $query);
			if(!$result) {
	            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
	        }
	        $rob = $result->fetch_object();
	        return $rob;
    }
    function getWal() {
    	$query = "SELECT count(App_Name) as count from erp 
		WHERE Emp_Site = 'QCWAL' ";
		//print_r($query);
    	$result = mysqli_query($this->conn, $query);
			if(!$result) {
	            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
	        }
	        $rob = $result->fetch_object();
	        return $rob;
    }
    function getClrk() {
    	$query = "SELECT count(App_Name) as count from erp 
		WHERE Emp_Site = 'CLARK' ";
		//print_r($query);
    	$result = mysqli_query($this->conn, $query);
			if(!$result) {
	            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
	        }
	        $rob = $result->fetch_object();
	        return $rob;
    }
    function getMOA() {
    	$query = "SELECT count(App_Name) as count from erp 
		WHERE Emp_Site = 'MOA' ";
		//print_r($query);
    	$result = mysqli_query($this->conn, $query);
			if(!$result) {
	            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
	        }
	        $rob = $result->fetch_object();
	        return $rob;
    }

    function getAllApp(){
    	$query = "SELECT count(Trk_ID) as count from applicants";
    	$result = mysqli_query($this->conn, $query);
			if(!$result) {
	            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
	        }
	        $app = $result->fetch_object();
	        return $app;
    }
    function getAllEmp(){
    	$query = "SELECT count(Emp_ID) as count from employees";
    	$result = mysqli_query($this->conn, $query);
			if(!$result) {
	            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
	        }
	        $emp = $result->fetch_object();
	        print_r($emp);
	        return $emp;
    }
    function getAllErp(){
    	$query = "SELECT count(Emp_ID) as count from erp";
    	$result = mysqli_query($this->conn, $query);
			if(!$result) {
	            die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
	        }
	        $erp = $result->fetch_object();
	        print_r($erp);
	        return $erp;
    }
}




?>