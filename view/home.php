<?php
require_once CONTROLLER_DIR."home.php";
require_once VIEW_DIRECTORY."homeHeader.php";
?>
<link href="./styles/home.css" rel="stylesheet">
<script type="text/javascript" src="js/home.js"></script>
<div class="hero_image"><div class="overlay"></div></div>
<div class="container-fluid  py-4 middleBar ">
	<div class="collapse navbar-collapse" id="" style="color: black">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link " href="javascript:void(0);">Logout</a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="./login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./registration">Register</a>
          </li>
            <a class="nav-link" href="./today-matches">Today Matches</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./add-money">Add Money</a>
          </li>
      </ul>
    </div>
	
</div>
<div class="container-fluid mainContentDiv py-5">
	<div class="row justify-content-center">
		<div class="col-sm-2">
			<div class="p-2 border bg-secondary">
				<h6>Coming soon..</h6>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="betWinsModuleContainer p-2">
<?php
	echo"<div class='container  contest'><div class='row'><div class='col-sm-12'><div class='border main_heading p-2'>Most Run: <span class='hideShowBlock1'><i class='fas fa-chevron-down float-right btn btn-sm btn-light'></i></span></div>
			<div class='block1'>
			<div class='table-responsive'>
			<table class='table table-bordered table-hover'><tbody>";
			for ($i=0; $i <count($homepage->playersList); $i++) { 
				echo "<tr><td class='eventOption' player-id='".$homepage->playersList[$i]['id']."' contest-id=14 betting-rate=".$homepage->playersList[$i]['battingRate']." contest-name='Most Run Score Tournament' player-name=".$homepage->playersList[$i]['firstName'].$homepage->playersList[$i]['lastName']." id=".$homepage->playersList[$i]['id'].">".$homepage->playersList[$i]['firstName']." ".$homepage->playersList[$i]['lastName']." &#xd7;<span><span class='bettingRate'>".$homepage->playersList[$i]['battingRate']."</span></td></tr>";
			}
			echo "</tbody></table></div></div></div></div></div>";

		echo"<div class='container  contest'><div class='row'><div class='col-sm-12'><div class='border main_heading p-2'>Most Wicket: <span class='hideShowBlock2'><i class='fas fa-chevron-down float-right btn btn-sm btn-light'></i></span></div>
			<div class='block2'>
			<div class='table-responsive'>
			<table class='table table-bordered table-hover'><tbody>";
		for ($i=0; $i <count($homepage->playersList); $i++) { 
				echo "<tr><td class='eventOption' player-id='".$homepage->playersList[$i]['id']."' contest-id=15 betting-rate=".$homepage->playersList[$i]['bowlingRate']." contest-name='Most Wicket Taken Tournament' player-name=".$homepage->playersList[$i]['firstName'].$homepage->playersList[$i]['lastName']." id=".$homepage->playersList[$i]['id'].">".$homepage->playersList[$i]['firstName']." ".$homepage->playersList[$i]['lastName']." <span>&#xd7; ".$homepage->playersList[$i]['battingRate']."</span> <span class='selectedPlayer'>&#10004;<span></td></tr>";
			}
			echo "</tbody></table></div></div></div></div></div>";


		echo"<div class='container contest'><div class='row'><div class='col-sm-12'><div class='border main_heading p-2'>Team to hit most four: <span class='hideShowBlock3'><i class='fas fa-chevron-down float-right btn btn-sm btn-light'></i></span></div>
			<div class='block3'>
			<div class='table-responsive'>
			<table class='table table-bordered table-hover'><tbody>";
		for ($i=0; $i <count($homepage->teamList); $i++) { 
				echo "<tr><td class='eventOption' id=".$homepage->teamList[$i]['id']." player-name=".$homepage->teamList[$i]['teamName']." contest-id=13 betting-rate=".$homepage->teamList[$i]['mostFourRate']." contest-name='Team to hit most four' >".$homepage->teamList[$i]['teamName']." <span>&#xd7; ".$homepage->teamList[$i]['mostFourRate']."</span></td></tr>";
			}
			echo "</tbody></table></div></div></div></div></div>";

		echo"<div class='container contest '><div class='row'><div class='col-sm-12'><div class='border main_heading p-2'>Team to hit most six: <span class='hideShowBlock4'><i class='fas fa-chevron-down float-right btn btn-sm btn-light'></i></span></div>
			<div class='block4'>
			<div class='table-responsive'>
			<table class='table table-bordered table-hover'><tbody>";
		for ($i=0; $i <count($homepage->teamList); $i++) { 
				echo "<tr><td class='eventOption' id=".$homepage->teamList[$i]['id']." player-name=".$homepage->teamList[$i]['teamName']." contest-id=12 betting-rate=".$homepage->teamList[$i]['mostSixesRate']." contest-name='Team to hit most Six' >".$homepage->teamList[$i]['teamName']."<span> &#xd7; ".$homepage->teamList[$i]['mostSixesRate']."</td></tr>";
			}
			echo "</tbody></table></div></div></div></div></div>";

		echo"<div class='container contest '><div class='row'><div class='col-sm-12'><div class='border main_heading p-2'>Team To Win IPL: <span class='hideShowBlock5'><i class='fas fa-chevron-down float-right btn btn-sm btn-light'></i></span></div>
			<div class='block5'>
			<div class='table-responsive'>
			<table class='table table-bordered table-hover'><tbody>";
					for ($i=0; $i<count($homepage->teamList); $i++) { 
						echo "<tr><td class='eventOption' id=".$homepage->teamList[$i]['id']." player-name=".$homepage->teamList[$i]['teamName']." contest-id=11 betting-rate=".$homepage->teamList[$i]['winTournamentRate']." contest-name='Team to win IPL' >".$homepage->teamList[$i]['teamName']."<span> &#xd7; ".$homepage->teamList[$i]['winTournamentRate']."</td>";
					}
					echo "</tbody></table></div></div></div></div></div>";
			?>
		</div>
	</div>
		<div class="col-sm-3">
			<div class="p-2 border bg-secondary">
				<h6>Coming soon..</h6>
			</div>
		</div>
	</div>

	<div class='container betSelectorModel bidBox'>
	   <div class='row justify-content-center'>
	      <div class='col-sm-12 pb-3'>
	         <div class='p-1 selectedContestName'>Most Run<span class='selectedOption badge badge-warning'></span></div>
	         <hr class='bg-success my-1'>
	         <div><span class='contestText'></span><span> &#xd7; </span><span class='multiplierValue'></span></div>
	         <div class='entered_amount'></div>
	         <div class="row">
	            <div class="col-sm-6">
	               <div class='input-group my-3'>
	                  <input type='text' class='form-control bidAmount' placeholder='500-30000' id='demo'>
	                  <div class='input-group-append'>
	                     <button class='input-group-tex btn btn-success placeTournamentBid' type='button'>Place</button>
	                  </div>
	               </div>
	           </div>
	               <div class="col-sm-6">
	               	<div class="border rounded p-1">
	                  <div>Return Amount </div>
	                  <hr class="m-0 bg-warning">
	                  <div class='returnAmount'>0.00 INR</div>
	              </div>
	               </div>
	            </div>
	         </div>
	      </div>
	   </div>
	</div>

</div>
<?php require_once VIEW_DIRECTORY."footer.php"; ?>