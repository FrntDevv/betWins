<?php
require_once CONTROLLER_DIR.'myBets.php';
require_once VIEW_DIRECTORY.'receiverHeader.php';
?>
<link rel="stylesheet" href="./styles/hospital_registration.css" />
<script src="./js/hospital_registration.js"></script>
<div class="container-fluid bgImg" style="margin-top: -40px;">
  <div class="container">
    <div class="row justify-content-center">
    <?php
    foreach($myBets->betListMatch as $bets){
    	echo '<div class="col-xl-8">
    			<div class="border shadow p-2 bg-light mb-3">
    				<div>Bet Id: <b>'.$bets['id'].'</b></div>
    				<div>Bet Time: <b>'.$bets['betPlacedAt'].'</b></div>';
    				if ($bets['betStatus']==0) {
    					echo '<div><b>Pending Result</b></div>';
    				}else{
    					echo '<div><b>Completed</b></div>';
    				}
    				echo '
    				<div> <b>'.$bets['team1'] .' vs '.$bets['team2'].'</b></div>
    				<div>Bet On: <b>'.$bets['contestName'].'</b></div>';
    				if($bets['contest_id']==5||$bets['contest_id']==6){
    					echo '<div>'.$bets['playerDetail0'].'</div>
    					<div>'.$bets['playerDetail1'].'</div>';
    				}else{
    					echo '<div>'.$bets['teamName'].'</div>';
    				}
    				echo '
    				<div>Amount: <b>'.$bets['betting_amount'].'INR</b></div>
    				<div>Draw Amount: <b>'.$bets['betting_return_amount'].'</b></div>';
    				if($bets['userBetResult']==1){
    					echo '<div>Got Amount: <b>'.$bets['betting_return_amount'].'INR</b></div>';
    				}else{
    					echo '<div>Got Amount: <b>0.00 INR</b></div>';
    				}
    				
    				echo '</div></div>';
    }
      
      ?>
    </div>
  </div>
</div>
</body>

</html>