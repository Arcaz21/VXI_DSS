<?php include "../models/importModel.php"; 

	$importModel = new importModel();
	$statisticModel = new statisticModel();

	if(isset($_REQUEST['employee'])){
		if(isset($_FILES['uploadFile']['name']) && $_FILES['uploadFile']['name'] != NULL){
			$allowedExtensions = array("xls","xlsx","csv");
			$ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
			if(in_array($ext, $allowedExtensions)){
				$file_size = $_FILES['uploadFile']['size'] / 1024;
				if($file_size < 3000){
					$file = "uploads/".$_FILES['uploadFile']['name'];
					$isUploaded = copy($_FILES['uploadFile']['tmp_name'], $file);
					var_dump($isUploaded);
					if($isUploaded){
						$importemp = $importModel->importEmp($file);
					}else{
						$_SESSION['failed'] ="Failed to Upload File";
						}
				}else{
					$_SESSION['failed'] ="File should be less than 3MB/3000Kb";
				}
			}else{
				$_SESSION['failed'] ="<b>"."This type of file is not allowed! Please import .xls, .xlsx or .csv files"."</b>";
			}
		}else{
			$_SESSION['failed'] ="<b>"."Please Select an excel file first!"."</b>";
		}
	}

	if(isset($_REQUEST['applicant'])){
		if(isset($_FILES['uploadFile']['name']) && $_FILES['uploadFile']['name'] != NULL){
			$allowedExtensions = array("xls","xlsx","csv");
			$ext = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
			if(in_array($ext, $allowedExtensions)){
				$file_size = $_FILES['uploadFile']['size'] / 1024;
				if($file_size < 3000){
					$file = "uploads/".$_FILES['uploadFile']['name'];
					$isUploaded = copy($_FILES['uploadFile']['tmp_name'], $file);
					var_dump($isUploaded);
					if($isUploaded){
						$importemp = $importModel->importApp($file);
					}else{
						$_SESSION['failed'] ="Failed to Upload File";
						}
				}else{
					$_SESSION['failed'] ="File should be less than 3MB/3000Kb";
				}
			}else{
				$_SESSION['failed'] ="<b>"."This type of file is not allowed! Please import .xls, .xlsx or .csv files"."</b>";
			}
		}else{
			$_SESSION['failed'] ="<b>"."Please Select an excel file first!"."</b>";
		}
	}

	$getErp = $statisticModel->getErp();
	if($getErp){
		error_reporting(E_ERROR | E_PARSE); foreach ($getErp as $index => $value):
			$timestamp = strtotime($value['app_date']);
		    $date=date("Y-m-d", $timestamp);
			$erp['App_Date'] = $date;
			$erp['App_Name'] = $value['f_name'] + $value['m_name'] + $value['l_name'];
			$erp['Emp_ID'] = $value['Emp_ID'];
			$erp['Emp_Name'] = $value['Emp_Name'];
			$erp['Emp_Tname'] = $value['Emp_Tname'];
			$erp['Emp_Site'] = $value['Emp_Site'];
		endforeach;
		$addErp = $statisticModel->addErp($erp);

		if($addErp){
			$_SESSION['success'] ="ERP Exported";
		}
	}
?>