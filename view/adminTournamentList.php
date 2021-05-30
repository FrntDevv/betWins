<?php
require_once CONTROLLER_DIR."cricketTournaments.php";
require_once VIEW_DIRECTORY."adminHeader.php";
?>
<link href="./styles/matchList.css" rel="stylesheet">
<script type="text/javascript" src="js/matchesList.js"></script>

<div class="matchesListDiv container"><h5 class="text-center">Matches</h5><div class="row justify-content-center"><div class="col-md-7">
	<div class="row justify-content-center">
	<?php 
		for($i=0;$i<count($cricketTournaments->allTournamentList);$i++){
			echo "<div class='col-md-12'><div class='bg-light border p-2 mb-3'>
					<a class='tournamentName' style='' href=./tournamentDetails?tournament-id=".$cricketTournaments->allTournamentList[$i]['id'].">
						<div>".$cricketTournaments->allTournamentList[$i]['tournamentName']."</div>
					</a></div></div>";
		}
	?>
</div></div></div>

