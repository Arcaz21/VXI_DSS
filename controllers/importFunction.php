<?php include "../models/importModel.php"; 

	$importModel = new importModel();

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
?>