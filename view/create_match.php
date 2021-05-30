	<?php
	require_once CONTROLLER_DIR . "createMatch.php";
	require_once VIEW_DIRECTORY . "homeHeader.php";
	?>
	<script type="text/javascript" src="js/createMatch.js"></script>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row mt-5 justify-content-center">
					<div class="col-lg-6">
						<select class="custom-select tournamentSelect">
						<option selected disabled>Select Tournament</option>
							<?php foreach($createMatch->allActiveTournaments as $tournaments) 
						  	echo '<option tournament-id='.$tournaments['id'].'>'.$tournaments['tournamentName'].'</option>';
						  ?>
						</select>
					</div>
					
				</div>
				<h3 class="text-center"><b>Pick Team For the Match:</b></h3>
				<hr class="pt-2 bg-warning w-50">
				<div class="row mt-5 justify-content-center">
					<div class="col-lg-6">
						<select class="custom-select team_one_side">
						<option selected disabled>Select Team</option>
							<?php foreach($createMatch->allTeams as $teams) 
						  	echo '<option team-id='.$teams['id'].'>'.$teams['teamName'].'</option>';
						  ?>
						</select>
					</div>
					<div class="col-lg-6">
						<select class="custom-select team_other_side">
							<option selected disabled>Select Team</option>
							<?php foreach($createMatch->allTeams as $teams) 
						  	echo '<option team-id='.$teams['id'].'>'.$teams['teamName'].'</option>';
						  ?>
						</select>
					</div>
					<div class="col-sm-6 text-center mt-5">
						<button class="btn btn-primary createMatch">Create</button>
					</div>
				</div>
			</div>
		</div>
	</div>
