<?php
require_once CONTROLLER_DIR . "matchContest.php";
require_once VIEW_DIRECTORY . "homeHeader.php";
?>
<link href="./styles/matchContest.css" rel="stylesheet">
<script type="text/javascript" src="js/matchContest.js"></script>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="border main_heading p-2">
				<h5 class="">Top Run Scorer (Select One Player from each team) <span class='hideShowBlock1'> <i class='fas fa-chevron-down float-right btn btn-sm btn-light'></i></span></h5>
			</div>
			<div class="row block1">
				<div class="col-md-6 pr-0">
					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th><?php echo $matchContest->teams[0]['teamName'];?></th>
							</tr>
						</thead>
						<tbody>
							<?php
								for ($i = 0; $i < count($matchContest->team1player); $i++) {
								    echo "<tr class=''>
										    <td class='team1List' contest-id=5 id ='".$matchContest->team1player[$i]['id']." 'team-id = '".$matchContest->team1player[$i]['teamId']."'>" . $matchContest->team1player[$i]['firstName'] .$matchContest->team1player[$i]['lastName']. "
										    </td>
								    	</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
				<div class="col-md-6 pl-0">
					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th><?php echo $matchContest->teams[1]['teamName'];?></th>
							</tr>
						</thead>
						<tbody>
							<?php
								for ($i = 0; $i < count($matchContest->team2player); $i++) {
									echo "<tr class='borde'>
											<td class='team2List' contest-id=5 contest-name='Top run scorer (Two way)' betting-rate='".$matchContest->matchDetails['battingRate']."' id =".$matchContest->team2player[$i]['id']." team-id = ".$matchContest->team2player[$i]['teamId'].">" . $matchContest->team2player[$i]['firstName'] . $matchContest->team2player[$i]['lastName']."
											</td>
										</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row ">
		<div class="col-sm-12">
			<div class="border main_heading p-2">
				<h5 class="">Top Wicket Taker (Select One Player from each team) <span class='hideShowBlock2'> <i class='fas fa-chevron-down float-right btn btn-sm btn-light'></i></span></h5>
			</div>
			<div class="row block2">
				<div class="col-md-6 pr-0">
					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th>Team 1 Players</th>
							</tr>
						</thead>
						<tbody>
					<?php
					for ($i = 0; $i < count($matchContest->team1player); $i++) {
					    echo "<tr class=''><td class='team1List' contest-name='Player to take most wicket (Two way)' contest-id=6 id ='".$matchContest->team1player[$i]['id']."'team-id = '".$matchContest->team1player[$i]['teamId']."'>" . $matchContest->team1player[$i]['firstName'] .$matchContest->team1player[$i]['lastName']. "</td></tr>";
					}
					?>
				</tbody>
			</table>
		</div>
						<div class="col-md-6 pl-0">
					<table class="table table-hover">
						<thead class="thead-dark">
							<tr>
								<th>Team 2 Players</th>
							</tr>
						</thead>
						<tbody>
				<?php
					for ($i = 0; $i < count($matchContest->team2player); $i++) {
					echo "<tr class='borde'><td class='team2List' contest-id=6 contest-name='Player to take most wicket (Two way)' contest-name='Top run scorer (Two way)' betting-rate='".$matchContest->matchDetails['battingRate']."' id =".$matchContest->team2player[$i]['id']." team-id = ".$matchContest->team2player[$i]['teamId'].">" . $matchContest->team2player[$i]['firstName'] . $matchContest->team2player[$i]['lastName']."</td></tr>";
					}
					?>
				</tbody>
			</table>
		</div>
			</div>
</div>
</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="border main_heading p-2">
				<h5 class="">Team to hit most four  <span class='hideShowBlock3'><i class='fas fa-chevron-down float-right btn btn-sm btn-light'></i></span></h5>
			</div>
			<div class="row block3">
				<div class="col-md-12 pr-0">
					<table class="table table-hover">
						<tbody>
					<?php
					for ($i = 0; $i < count($matchContest->teams); $i++) {
					    echo "<tr class=''><td class='team2List' contest-name='Team to hit most four' id ='".$matchContest->teams[$i]['id']."'team-id = '".$matchContest->teams[$i]['id']."'contest-id=4 betting-rate=''>" . $matchContest->teams[$i]['teamName']. "</td></tr>";
					}
					?>
				</tbody>
			</table>
		</div>
			</div>
</div>
</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="border main_heading p-2">
				<h5 class="">Team to hit most Six  <span class='hideShowBlock4'><i class='fas fa-chevron-down float-right btn btn-sm btn-light'></i></span></h5>
			</div>
			<div class="row block4">
				<div class="col-md-12 pr-0">
					<table class="table table-hover">
						<tbody>
					<?php
					for ($i = 0; $i < count($matchContest->teams); $i++) {
					    echo "<tr class=''><td contest-name='Team to hit most sixes' class='team2List' id ='".$matchContest->teams[$i]['id']."'team-id = '".$matchContest->teams[$i]['id']."'contest-id=3>" . $matchContest->teams[$i]['teamName']. "</td></tr>";
					}
					?>
				</tbody>
			</table>
		</div>
			</div>
</div>
</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="border main_heading p-2">
				<h5 class="">Team to win toss  <span class='hideShowBlock5'><i class='fas fa-chevron-down float-right btn btn-sm btn-light'></i></span></h5>
			</div>
			<div class="row block5">
				<div class="col-md-12 pr-0">
					<table class="table table-hover">
						
						<tbody>
					<?php
					for ($i = 0; $i < count($matchContest->teams); $i++) {
					    echo "<tr class=''><td class='team2List' contest-name='Team to win toss' id ='".$matchContest->teams[$i]['id']."'team-id = '".$matchContest->teams[$i]['id']."'contest-id=2>" . $matchContest->teams[$i]['teamName']. "</td></tr>";
					}
					?>
				</tbody>
			</table>
		</div>
			</div>
</div>
</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="border main_heading p-2">
				<h5 class="">Team to win match<span class='hideShowBlock6'><i class='fas fa-chevron-down float-right btn btn-sm btn-light'></i></span></h5>
			</div>
			<div class="row block6">
				<div class="col-md-12 pr-0">
					<table class="table table-hover">
						<tbody>
					<?php
					for ($i = 0; $i < count($matchContest->teams); $i++) {
					    echo "<tr class=''><td class='team2List' contest-name='Team to win match' id ='".$matchContest->teams[$i]['id']."'team-id = '".$matchContest->teams[$i]['id']."'contest-id=1 >" . $matchContest->teams[$i]['teamName']. "</td></tr>";
					}
					?>
				</tbody>
			</table>
		</div>
			</div>
</div>
</div>
</div>
<div class='container bidBoxMatch  mb-5 '>
	<div class='row justify-content-center'>
		<div class='col-sm-12'>
			<div class=''>
				<div class='p-1 selectedContestName'>Most Run<span class='selectedOption badge badge-warning'></span></div>
				<hr class='bg-success my-1'>
				<div><span class='contestText'></span><span class='contestText2'></span><span> &#xd7; </span><span class='multiplierValue'></span></div>
				<div class='entered_amount'></div>
				<div class='input-group my-3 w-50'>
				  <input type='text' class='form-control bidAmount' placeholder='500-30000'>
				  <div class='input-group-append'>
				    <button class='input-group-tex btn btn-success placeMatchBid' type='button'>Place</button>
				  </div>
				</div>
				<div>Return Amount </div>
				<div class='returnAmount'></div>
			</div>
		</div>
	</div>
</div>
	
