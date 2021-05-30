<?php
require_once CONTROLLER_DIR."matchesList.php";
require_once VIEW_DIRECTORY."homeHeader.php";
?>
<link href="./styles/matchList.css" rel="stylesheet">
<script type="text/javascript" src="js/matchesList.js"></script>

<div class="matchesListDiv container mt-5">
	<h3 class="text-center pt-3">Matches</h3>
	<hr class="bg-warning pt-2 w-50">
	<div class="row justify-content-center">
		<div class="col-md-7">
			<div class="row justify-content-center">
			<?php 
				for($i=0;$i<count($matcheList->matchesList);$i++){
					echo "<div class='col-md-12 text-center'>
							<div class='bg-light border p-4 mb-3 shadow'>
							<a class='matchName' style='' href=./match-id=".$matcheList->matchesList[$i]['id'].">
								<div class='badge badge-primary'>";?>
								<?php 
								$date = date_create($matcheList->matchesList[$i]['matchDate']); echo date_format($date,"D m,Y H:i");echo "</div>
								<div class='row team_name'>
								<div class='col-sm-5'>
								<img width='24' height='24' class='img-fluid rounded-circle' src='https://placeit-assets1.s3-accelerate.amazonaws.com/custom-pages/cricket-logo-maker/All-Star-Cricket-Team-Logo-Maker-for-Cricket-Teams.png' alt='teams-image-logo'>".$matcheList->matchesList[$i]['teamNameFirst']."</div><div class='col-sm-2'><img src='https://icon2.cleanpng.com/20180505/dww/kisspng-fire-emblem-awakening-spartan-race-video-game-fire-5aedb7886a8261.1531372015255284564363.jpg' class='' width='24' height='24' alt='vs'></div><div class='col-sm-5'>
								<img width='24' height='24' class='img-fluid rounded-circle' src='https://placeit-assets1.s3-accelerate.amazonaws.com/custom-pages/cricket-logo-maker/All-Star-Cricket-Team-Logo-Maker-for-Cricket-Teams.png' alt='teams-image-logo'>".$matcheList->matchesList[$i]['teamNameSecond']."</div></div>
							</a></div></div>";
				}
			?>
			</div>
		</div>
	</div>
</div>

