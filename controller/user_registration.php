<?php

class UserRegistation
{
	
	public function __construct()
	{
		if(isset($_POST['receiver_registration'])){
			$email 		= $_POST['email_id'];
			$name		= $_POST['user_name'];
			$password	= $_POST['user_password'];
			$mobile 	= $_POST['mobile_number'];
			$dateOfBirth = $_POST['user_dob'];
			$checkUser = DatabaseOperations::checkExistingReceiver($email);
			if ($checkUser) {
				$response  = array('success' => 'fail', 'message'=>'User already Exist With this email');
				echo json_encode($response);
				exit;
			}else{
				$registerUser = DatabaseOperations::createReceiver($name,$mobile,$email,$dateOfBirth,$password);
				if ($registerUser) {
					$response  = array('success' => 'true', 'message'=>'Registration succesful');
					echo json_encode($response);
					exit;
				}
			}
		}
	}
}

$hospitalRegistration = new UserRegistation();
?>