<?php
require_once RAZORPAY . 'Razorpay.php';
use Razorpay\Api\Api;
class addMoney
{
	
	public function __construct()
	{
		if(isset($_POST['addMoney'])){
			$email = $_POST['hospital_email'];
			$password = $_POST['hospital_password'];
			$checkUser = DatabaseOperations::loginHospital($email,$password);
			var_dump($checkUser);
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

		if(isset($_POST['startPayment'])){
	            $user_id = $_SESSION['receiverSession']['id'];
	            
	            $finalAmount = $_POST['amount']*100;
	            
	            $payment_status= '0';
	            
	            $api = new Api('rzp_test_FEDUc4HtQcznIm', 'R2p0cbSmFDnHCszN5QxRvuSN');
	            
	            $orderData = [
							'amount'   => $finalAmount,
							'currency' => 'INR',
							'payment_capture' => 1 // auto capture
						];
						$orderCreated = $api->order->create($orderData);
						
						$razorpayOrderId = $orderCreated['id'];
						$_SESSION['payment']['order_id'] = $razorpayOrderId;
						$_SESSION['payment']['amount'] = $finalAmount;
						
						if($orderCreated){
							$data = [
							    "key"               => 'rzp_test_FEDUc4HtQcznIm',
							    "amount"            => $finalAmount,
							    "name"              => $_SESSION['receiverSession']['name'],
							    "image"             => "https:///r6dj1g85z/daft_punk.jpg",
							    "prefill"           => [
							    	"name"=> "Gaurav Kumar",
        							"email"=> "gaurav.kumar@example.com",
        							"contact"=> "9999999999"
							    ],
							    
							    //],
							    "theme"             => [
							    "color"             => "#F37254"
							    ],
							    "order_id"          => $razorpayOrderId,
							];
							//$json= json_encode($data);
							$_SESSION['payment']=$data;

						
							if($_SESSION['payment']){
								$status = 0;
								$insertIntoUserPayment = DatabaseOperations::inssertOrderDetailsForUser($user_id,$razorpayOrderId,$finalAmount/100,$status);
								if($insertIntoUserPayment){
									$response = array('success' => 'true', 'message'=>'Order Created');
									echo json_encode($response);
									exit;
								}else{

								}
								
							}else{
								$response =  array('success' => 'fail', 'message'=>'Error!Try again');
								echo json_encode($response);
								exit;
							}
						
						}	
				}
	}
}

$addMoney = new addMoney();
?>