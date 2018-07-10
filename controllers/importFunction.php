<?php include "../models/importModel.php"; 

	$importModel = new importModel();
	$statisticModel = new statisticModel();
	
	// if(isset($_REQUEST['generate'])){
	// 	$start = microtime(true);
	// 	if(isset($_FILES['employees']['name']) && $_FILES['employees']['name'] != NULL){
	// 		$allowedExtensions = array("xls","xlsx","csv");
	// 		$ext = pathinfo($_FILES['employees']['name'], PATHINFO_EXTENSION);
	// 		if(in_array($ext, $allowedExtensions)){
	// 			$file_size = $_FILES['employees']['size'] / 1024;
	// 			if($file_size < 3000){
	// 				$file = "uploads/".$_FILES['employees']['name'];
	// 				$isUploaded = copy($_FILES['employees']['tmp_name'], $file);
	// 				var_dump($isUploaded);
	// 				if($isUploaded){
	// 					$importEmp = $importModel->importEmp($file);
	// 				}else{
	// 					$_SESSION['failed'] ="Failed to Upload File";
	// 					}
	// 			}else{
	// 				$_SESSION['failed'] ="File should be less than 3MB/3000Kb";
	// 			}
	// 		}else{
	// 			$_SESSION['failed'] ="<b>"."This type of file is not allowed! Please import .xls, .xlsx or .csv files"."</b>";
	// 		}
	// 	}else{
	// 		$_SESSION['failed'] ="<b>"."Please Select an excel file first!"."</b>";
	// 	}

	// 	if(isset($_FILES['applicants']['name']) && $_FILES['applicants']['name'] != NULL){
	// 		$allowedExtensions = array("xls","xlsx","csv");
	// 		$ext = pathinfo($_FILES['applicants']['name'], PATHINFO_EXTENSION);
	// 		if(in_array($ext, $allowedExtensions)){
	// 			$file_size = $_FILES['applicants']['size'] / 1024;
	// 			if($file_size < 3000){
	// 				$file = "uploads/".$_FILES['applicants']['name'];
	// 				$isUploaded = copy($_FILES['applicants']['tmp_name'], $file);
	// 				var_dump($isUploaded);
	// 				if($isUploaded){
	// 					$importApp = $importModel->importApp($file);
	// 				}else{
	// 					$_SESSION['failed'] ="Failed to Upload File";
	// 					}
	// 			}else{
	// 				$_SESSION['failed'] ="File should be less than 3MB/3000Kb";
	// 			}
	// 		}else{
	// 			$_SESSION['failed'] ="<b>"."This type of file is not allowed! Please import .xls, .xlsx or .csv files"."</b>";
	// 		}
	// 	}else{
	// 		$_SESSION['failed'] ="<b>"."Please Select an excel file first!"."</b>";
	// 	}

	// 	if($importApp && $importEmp){
	// 		$save = $statisticModel->saveAll();
	// 		if($save){
	// 			$filename = "D:/xampp/htdocs/vxi_dss/views/uploads/erp.csv";
	// 			$read = $statisticModel->read($filename);
	// 			if($read){
	// 				$_SESSION['info'] ="<b> ERP Generated! Please proceed to </i> ";
	// 			}
	// 		}
	// 		$_SESSION['emp'] ="<b> Successfully updated employee database. </b><i>".$importEmp." applicants added. </i> ";
	// 		$_SESSION['app'] ="<b> Successfully updated applicant database. </b><i>".$importApp." applicants added. </i> ";
	// 	}
	// 	$importModel->close();
	// 	$end = microtime(true) - $start;
	// 	print_r($end*1000);
	// }
	if(isset($_REQUEST['generate'])){
		$start = microtime(true);
		if(isset($_FILES['employees']['name']) && $_FILES['employees']['name'] != NULL){
			$allowedExtensions = array("xls","xlsx","csv");
			$ext = pathinfo($_FILES['employees']['name'], PATHINFO_EXTENSION);
			if(in_array($ext, $allowedExtensions)){
				$file_size = $_FILES['employees']['size'] / 1024;
				if($file_size < 3000){
					$file = "uploads/".$_FILES['employees']['name'];
					$isUploaded = copy($_FILES['employees']['tmp_name'], $file);
					var_dump($isUploaded);
					if($isUploaded){
						$importEmp = $importModel->importEmp($file);
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

		if(isset($_FILES['applicants']['name']) && $_FILES['applicants']['name'] != NULL){
			$allowedExtensions = array("xls","xlsx","csv");
			$ext = pathinfo($_FILES['applicants']['name'], PATHINFO_EXTENSION);
			if(in_array($ext, $allowedExtensions)){
				$file_size = $_FILES['applicants']['size'] / 1024;
				if($file_size < 3000){
					$file = "uploads/".$_FILES['applicants']['name'];
					$isUploaded = copy($_FILES['applicants']['tmp_name'], $file);
					var_dump($isUploaded);
					if($isUploaded){
						$importApp = $importModel->importApp($file);
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

		if($importApp && $importEmp){
			ini_set('max_execution_time', 300);
			$start = microtime(true);
			$getErp = $statisticModel->getErp();
			if($getErp){
				error_reporting(E_ERROR | E_PARSE); foreach ($getErp as $index => $value):
				$erp['App_Date'] =  gmdate("Y-m-d", ($value['app_date'] - 25569) * 86400);
				$erp['App_Name'] = $value['f_name'] + $value['m_name'] + $value['l_name'];
				$erp['Emp_ID'] = $value['Emp_ID'];
				$erp['Emp_Name'] = $value['Emp_Name'];
				$erp['Emp_Tname'] = $value['Emp_Tname'];
				$erp['Emp_Site'] = $value['Emp_Site'];
				$statisticModel->addErp($erp);
				endforeach;
				
			}
			$exetime = round(microtime(true) - $start);
			$_SESSION['info'] ="<b> ERP Generated for ".$exetime."seconds. Please proceed to </i> ";
			$_SESSION['emp'] ="<b> Successfully updated employee database. </b><i>".$importEmp." applicants added. </i> ";
			$_SESSION['app'] ="<b> Successfully updated applicant database. </b><i>".$importApp." applicants added. </i> ";
		}
		$importModel->close();
		$end = microtime(true) - $start;
		print_r($end*1000);
	}
	
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
		$importModel->close();
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
		$importModel->close();
	}

	if(isset($_REQUEST['class']) && isset($_REQUEST['class']) == 1){
		ini_set('max_execution_time', 300);
		$start = microtime(true);
		$getErp = $statisticModel->getErp();
		$end = microtime(true) - $start;
        echo "TIME GET: ".$end;
		if($getErp){
			$start = microtime(true);
			error_reporting(E_ERROR | E_PARSE); foreach ($getErp as $index => $value):
			$erp['App_Date'] =  gmdate("Y-m-d", ($value['app_date'] - 25569) * 86400);
			$erp['App_Name'] = $value['f_name'] + $value['m_name'] + $value['l_name'];
			$erp['Emp_ID'] = $value['Emp_ID'];
			$erp['Emp_Name'] = $value['Emp_Name'];
			$erp['Emp_Tname'] = $value['Emp_Tname'];
			$erp['Emp_Site'] = $value['Emp_Site'];
			$statisticModel->addErp($erp);
			endforeach;
			$add = microtime(true) - $start;
			echo "TIME ADD: ".$add;
		} 
		
	}
	$db = new statisticModel;
	$site = "DVROB";
	$rob = $db->getRob();
	$sm = $db->getSM();
	$cen = $db->getCen();
	$pan1 = $db->getPan1();
	$pan2 = $db->getPan2();
	$wal = $db->getWal();
	$clark = $db->getClrk();
	$moa = $db->getMOA();
	$mkt = $db->getMkt();

	$t_emp = $db->getAllEmp();
	$t_erp = $db->getAllErp();
?>
<script type="text/javascript">

    var rob = "<?php echo $rob->count ?>";
    var sm = "<?php echo $sm->count ?>";
    var cen = "<?php echo $cen->count ?>";
    var mkt = "<?php echo $mkt->count ?>";
    var pan1 = "<?php echo $pan1->count ?>";
    var pan2 = "<?php echo $pan2->count ?>";
    var wal = "<?php echo $wal->count ?>";
    var clark = "<?php echo $clark->count ?>";
    var moa = "<?php echo $moa->count ?>";

    var davao = +rob + +sm + +cen;
    var qc = +pan1 + +pan2 + +wal;

    var t_emp = "<?php echo $t_emp->count ?>";
    var t_erp = "<?php echo $t_erp->count ?>";

    var performance = Math.round(((parseInt(t_erp)/parseInt(t_emp))*100));
    
</script>