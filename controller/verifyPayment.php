	<?php
	require_once RAZORPAY . 'Razorpay.php';
	use Razorpay\Api\Api;
	class verifyPayment{

		public $message;
		public function __construct(){
			$success = true;
				$error = "Payment Failed";
				//var_dump($_SESSION);
				if (empty($_POST['razorpay_payment_id']) === false)
				{
				    $api = new Api('rzp_test_FEDUc4HtQcznIm', 'R2p0cbSmFDnHCszN5QxRvuSN');

				    try
				    {
				        $attributes = array(
				            'razorpay_order_id' => $_SESSION['payment']['order_id'],
				            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
				            'razorpay_signature' => $_POST['razorpay_signature']
				        );
				        $api->utility->verifyPaymentSignature($attributes);
				    }
				    catch(SignatureVerificationError $e)
				    {
				        $success = false;
				        $error = 'Razorpay Error : ' . $e->getMessage();
				    }
				}

				if ($success === true)
				{			$user_id = $_SESSION['receiverSession']['id'];
								$updatePaymentStatus = DatabaseOperations::updatePaymentstatus($user_id,$_SESSION['payment']['order_id']);
								if ($updatePaymentStatus) {
									$checkPaymentStatus = DatabaseOperations::checkPaymentstatus($user_id,$_SESSION['payment']['order_id']);
									if ($checkPaymentStatus==1) {
										$walletBalanceAmount = $_SESSION['payment']['amount']/100; 
										$updateWalletBalance = DatabaseOperations::updateWalletBalance($user_id,$walletBalanceAmount);
									}
								}
								$razorpay_order_id =  $_SESSION['payment']['order_id'];
				 				$this->message = "<p>Your payment was successful</p>
					             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
			
					             
					             unset($_SESSION['payment']['razorpay_order_id']);
					             unset($_SESSION['payment']);
							    //$this->message = "<p>Your payment failed</p>";					        
				}
				else
				{
				    $this->message = "<p>Your payment failed</p>
				             <p>{$error}</p>";

				             unset($_SESSION['razorpay_order_id']);
					         unset($_SESSION['payment']);
				}

				//echo $html;
			}

		}
		$verifyPayment = new verifyPayment();	
	?>