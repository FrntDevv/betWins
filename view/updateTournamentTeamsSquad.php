<?php
require_once CONTROLLER_DIR.'updateTournamentTeamSquad.php';
require_once VIEW_DIRECTORY.'homeHeader.php';
$teamSquad = $updateTournamentTeamSquad->tournamentTeams;
$allPlayers = $updateTournamentTeamSquad->allPlayers;
?>
<style>
	.alternate_background:nth-child(even){
		background-color: green;
	}
	.teamDiv {
    background-color: #dcebf8;
    margin-bottom: 28px;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="./styles/hospital_registration.css" />
<script src="./js/updateTournamentTeamSquad.js"></script>
<script>
	$(document).ready(function() {
    $('.select-multiple-player').select2({
    	multiple:true,
    	tags:true,
    	placeholder:'please select players / you can add multiple player at once'
    });
    $('.remove_player').on('click', function(){
    	$(this).parent().closest('tr').remove();
    })
});
</script>
<div class="container-fluid bgImg mt-5">
  <div class="container" style="background-color: floralwhite;">
    <div class="row justify-content-center mt-5">
    	<div class="col-lg-12">
    		<h1 class="text-center mt-3">Update Tournament Squad</h1>
    		<hr class="bg-warning w-50 pt-1">
    		<form id="update-tournament-squad-form">
    			<div class="alternate_background">
    			<?php 
    			foreach($teamSquad as $teams){
    			?>
    			<div class="container teamDiv">
    				<div class="form-group">
	    				<label>Team Name</label>
	    				<input type="text" name="team[<?php echo $teams['id']?>]" class="form-control" value="<?php echo $teams['teamName'] ?>" readonly>
    				</div>
    				<div class="form-group">
    				<table class="table table-striped table-sm table-bordered">
    					<tbody>
    						<?php 
    							foreach ( $teams['players'] as $players) {
    						
    								echo "<tr>
    									<th name='teams[players][id]' value=".$players['id'].">".$players['firstName']." ".$players['lastName']."</th>
    									<td><button class='btn btn-sm btn-danger remove_player'>remove</button>
    								</tr>";
    						
    							}
    						?>
    					</tbody>
    				</table>
    			</div>
    				<div class="form-group">
    					<label>Add Players</label>
    					<select class="custom-select select-multiple-player" name="team[players][id]" multiple="multiple" style="width:100%;">
    						<?php
	    						 foreach ($allPlayers as $playerList) {
	    							echo "<option value=".$playerList['id'].">".$playerList['firstName']." ".$playerList['lastName']."</option>";
	    						}
    						?>
    					</select>
    				</div>
    				<div class="form-group py-2 my-2 bg-secondary">
    				</div>
    				</div>
    			<?php
    			}
    			?>
    		</div>
    			<div class="form-group">
    				<button class="updateSquad btn btn-primary btn-lg btn-block mt-5"> UPDATE SQUAD</button>
    			</div>

    		</form>
    	</div>
    </div>
  </div>
</div>
</body>

</html>