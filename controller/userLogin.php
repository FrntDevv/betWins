<?php
class UserLogin
{
	
	public function __construct()
	{
		if(isset($_POST['hospitalLogin'])){
			$email = $_POST['hospital_email'];
			$password = $_POST['hospital_password'];
			$checkUser = DatabaseOperations::loginHospital($email,$password);
			
			if ($checkUser) {
				$_SESSION['hospitalSession'] = $checkUser;
				$response  = array('success' => 'true', 'message'=>'Logging In');
				echo json_encode($response);
				exit;
			}else{
					$response  = array('success' => 'fail', 'message'=>'Username or Password is Wrong');
					echo json_encode($response);
					exit;
			}
		}

		if(isset($_POST['receiverLogin'])){
			$email 		= $_POST['receiver_email'];
			$password	= $_POST['receiver_password'];
			$checkUser = DatabaseOperations::loginReceiver($email,$password);

			if ($checkUser) {
				$_SESSION['receiverSession'] = $checkUser;
				$response  = array('success' => 'true', 'message'=>'Logging In');
				echo json_encode($response);
				exit;
			}else{
					$response  = array('success' => 'fail', 'message'=>'Username or Password is Wrong');
					echo json_encode($response);
					exit;
			}
		}
	}
}

$hospitalRegistration = new UserLogin();
?>