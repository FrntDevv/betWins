<?php
require_once VIEW_DIRECTORY."receiverHeader.php";
require_once CONTROLLER_DIR."receiver_dashboard.php";
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h3 class="text-center">Profile</h3>
			<hr class="pt-2 w-50 bg-warning">
			<div class="row justify-content-center">
				<div class="col-sm-8">
					<div class="bg-light border shadow p-4 rounded">
						<div class="form-group form-row">
							<label class="control-label col-lg-4">Name:</label>
							<div class="col-lg-8 text-capitalize"><?php echo $receiverDashboard->userData['name']?></div>
						</div>
						<div class="form-group form-row">
							<label class="control-label col-lg-4">Email:</label>
							<div class="col-lg-8"><?php echo $receiverDashboard->userData['email_id']?></div>
						</div>
						<div class="form-group form-row">
							<label class="control-label col-lg-4">Mobile No.:</label>
							<div class="col-lg-8"><?php echo $receiverDashboard->userData['mobile']?></div>
						</div>
						<div class="form-group form-row">
							<label class="control-label col-lg-4">Wallet Balance:</label>
							<div class="col-lg-8"><?php echo $receiverDashboard->userData['walletBalance']?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>