<?php
require_once CONTROLLER_DIR . "cricketTournamentCreate.php";
require_once VIEW_DIRECTORY . "adminHeader.php";
?>
<script type="text/javascript" src="js/cricketTournamentCreate.js"></script>
<script type="text/javascript" src="js/jsLibrary/jquery.repeater.min.js"></script>
<script type="text/javascript" src="js/repeater.js"></script>
<div class="container mt-5" style="background-color: floralwhite;">
	<div class="row justify-content-center">
		<div class="col-sm-12 pb-3">
			<h3 class="text-center mt-3"><b>Create New Cricket Tournament :</b></h3>
			<hr class="pt-2 bg-warning w-50">
			<form class="repeater" id="create-tournament-form">
			<div class="form-group">
				<lable>Tournament Name:</lable>
				<input type="text" name="cricketTournamentName" class="form-control">
			</div>
			<div class="form-group">
				<lable>Number of Teams:</lable>
			</div>
			<div class="form-group">
			<div class="row mt-5 justify-content-center" data-repeater-list="teams">
				<div class="col-lg-12 abc mb-3" data-repeater-item>
					<div class="row">
						<div class="col-10">
					<label>Team 1<span class ="teamNu"></span></label>
					 <select class="custom-select team_one_side" name="id">
					<option selected disabled>Select Team</option>
						<?php 
							foreach($createCricketTournament->allTeams as $teams){
								echo "<option value=".$teams['id'].">".$teams['teamName']."</option>";
							} 
						?>
					</select> 
				</div>
				<div class="col-2"  style="display: flex;align-items: flex-end;" >
					<input data-repeater-delete type="button" value="Delete" class="btn btn-sm btn-danger"/>
				</div>
			</div>
				</div>					
				</div>					
			</div>
			<div class="form-group">
				<input data-repeater-create type="button" value= "+ Add New Team" class="btn btn-sm btn-primary mt-3" />
			</div>
			<div class="form-group">
				<div class="row">
				<div class="col-sm-12">
					<button class="btn btn-success btn-lg createTournament btn-block" name="create_tournament">Create</button>
				</div>
			</div>
			</div>
					</div>
			</form>
		</div>
	</div>
</div>