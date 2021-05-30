<?php

class HospitalDasboard
{
	public $sampleRequest;
	public $hospitalRecord;
	public function __construct()
	{
		if(isset($_GET['hospital_dashboard'])){
			$hospital_id = $_SESSION['hospitalSession']['hh_id'];
			$this->hospitalRecord = DatabaseOperations::getHospitalBankRecord($hospital_id);
		}

		if(isset($_POST['addBloodInfo'])){
			$hospital_id = $_SESSION['hospitalSession']['hh_id'];
			$bloodSampleName = $_POST['sample_name'];
			$bloodQuantity = $_POST['sample_quantity'];
			$checkSampleIdInfo = DatabaseOperations::checkSampleIdInfo($bloodSampleName);

			if ($checkSampleIdInfo) {
				$bloodSampleId = $checkSampleIdInfo['id'];
				$sampleOldQuantity = $checkSampleIdInfo['ss_quantity'];
			}else{
				$insertBloodSample = DatabaseOperations::insertBloodSample($bloodSampleName);
				
				if ($insertBloodSample) {
					$sampleInfo = DatabaseOperations::checkSampleIdInfo($bloodSampleName);
					$bloodSampleId = $sampleInfo['id'];
					$sampleOldQuantity = 0;
				}
			}

			$checkBloodRecordForHospital = DatabaseOperations::checkBloodRecordForHospital($hospital_id,$bloodSampleId);
			if ($checkBloodRecordForHospital) {
				$bloodQuantity = $checkBloodRecordForHospital['hs_quantity'] + $bloodQuantity;
				$updateBloodRecordForHospital = DatabaseOperations::updateBloodRecordForHospital($hospital_id,$bloodSampleId,$bloodQuantity);
				if ($updateBloodRecordForHospital) {
					$updateOverallSampleQuantity = DatabaseOperations::updateOverallSampleQuantity($bloodSampleId,$bloodQuantity);
					$response  = array('success' => 'true', 'message'=>'Blood Info added succesfully');
					echo json_encode($response);
					exit;
				}else{
					$response  = array('success' => 'fail', 'message'=>'Error Occured, Please try again');
					echo json_encode($response);
					exit;
				}
			}else{
				$addBloodInfo = DatabaseOperations::addBloodInfo($hospital_id,$bloodSampleId,$bloodQuantity);
				$bloodQuantity = $sampleOldQuantity+$bloodQuantity;
				$updateOverallSampleQuantity = DatabaseOperations::updateOverallSampleQuantity($bloodSampleId,$bloodQuantity);
				if ($addBloodInfo) {
					$response  = array('success' => 'true', 'message'=>'Blood Info added succesfully');
					echo json_encode($response);
					exit;
				}else{
					$response  = array('success' => 'fail', 'message'=>'Error Occured, Please try again');
					echo json_encode($response);
					exit;
				}
			}
		}

		if (isset($_GET['sample_request'])) {
			$hospital_id = $_SESSION['hospitalSession']['id']=1;
			$this->sampleRequest = DatabaseOperations::getReceiversRequest($hospital_id);
		}
	}
}

$hospitalDashboard = new HospitalDasboard();
?>