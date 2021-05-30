<?php
require_once CONTROLLER_DIR."matchesList.php";
require_once VIEW_DIRECTORY."adminHeader.php";
?>
<link href="./styles/matchList.css" rel="stylesheet">
<script type="text/javascript" src="js/matchesList.js"></script>

<div class="matchesListDiv container"><h5 class="text-center">Matches</h5><div class="row justify-content-center"><div class="col-md-7">
	<div class="row justify-content-center">
	<?php 
		for($i=0;$i<count($matcheList->matchesList);$i++){
			echo "<div class='col-md-12'><div class='bg-light border p-2 mb-3'>
					<a class='matchName' style='' href=./match-id=".$matcheList->matchesList[$i]['id'].">
						<div>".$matcheList->matchesList[$i]['matchDate']."</div>
						<div>".$matcheList->matchesList[$i]['teamNameFirst']."</div>
						<div>".$matcheList->matchesList[$i]['teamNameSecond']."</div>
					</a></div></div>";
		}
	?>
</div></div></div>

