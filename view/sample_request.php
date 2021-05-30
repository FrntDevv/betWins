<?php
	require_once CONTROLLER_DIR."hospitalDashboard.php";
	require_once VIEW_DIRECTORY.'hospitalHeader.php';
	$requests = $hospitalDashboard->sampleRequest;
	echo "<div class='container'><div class='text-center bg-light p-2 border mb-3'><h4>Request</h4></div><div class='row'>";
	foreach ($requests as $key => $value) {
		echo "<div class='col-sm-12 border shadow rounded bg-light p-4'>
				<div class='receiverName text-capitalize'><small><b>Applicant Name: </b></small><span class=''>" .$value['name']."</span></div>
				<div class='reeiverEmail'><small><b>Email Id: </b></small> " .$value['email_id']."</div>
				<div class='sampleName text-capitalize'><small><b>Sample Name (Blood Group):</b></small> " .$value['ss_name']."</div>
			</div>";
	}
	echo "</div></div>";
?>