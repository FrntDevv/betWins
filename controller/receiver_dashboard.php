<?php

class ReceiverDashboard
{
	public $receiverRequest;
	public $userData;
	public $userBankData;
	public function __construct()
	{
		$receiverId = $_SESSION['receiverSession']['id'];
		$this->userData = DatabaseOperations::getUserData($receiverId);
		$this->userBankData = DatabaseOperations::getUserBankDetails($receiverId);
		var_dump($this->userData);

	}
}

$receiverDashboard = new ReceiverDashboard();
?>