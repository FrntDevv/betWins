<?php

class userAddBank
{
	
	public function __construct()
	{
		if (isset($_POST['userBankDetails'])) {
			$userId = $_SESSION['receiverSession']['id']=1;
			$bankName = $_POST['bank_name'];
			$accountNo = $_POST['account_no'];
			$ifscCode = $_POST['ifsc_code'];
			$accountHolderName = $_POST['account_holder_name'];
			$addUserBankDetails = DatabaseOperations::addUserBankDetails($userId,$bankName,$accountNo,$ifscCode,$accountHolderName);
			if ($addUserBankDetails) {
				$response  = array('success' => 'true', 'message'=>'Account details added successfully');
				echo json_encode($response);
				exit;
			}else{
					$response  = array('success' => 'fail', 'message'=>'Error Occured');
					echo json_encode($response);
					exit;
			}
		}
		if (isset($_POST['userWithdrawlDetails'])) {
			$userId = $_SESSION['receiverSession']['id']=1;
			$withdrawlAmount = $_POST['amount'];
			$userWithdrawlRequest = DatabaseOperations::userWithdrawlRequest($userId,$withdrawlAmount);
			if ($userWithdrawlRequest) {
				$updateWalletBalance = DatabaseOperations::deductUserWalletBalance($userId,$withdrawlAmount);
				$response  = array('success' => 'true', 'message'=>'Withdrawl request succesfullt taken');
				echo json_encode($response);
				exit;
			}else{
					$response  = array('success' => 'fail', 'message'=>'Error Occured');
					echo json_encode($response);
					exit;
			}
		}
	}
}

$matcheList = new userAddBank();
?>