<?php
require_once SITE_ROOT. '/generalFunctions.php';
class MatchContest
{
	public $record=[];
	public $teams=[];
	public $playersList;
	public $matchesList;
	public $team1player;
	public $team2player;
	public $matchDetails;
	public function __construct()
	{
		if(isset($_GET['match-id'])){
			if(isset($_POST['placeBidMatchContest'])){
				$userId = $_SESSION['receiverSession']['id']=1;
				$matchId = $_POST['match_id'];
				$contestId = $_POST['contest_id'];
				$bidAmount = $_POST['bidAmount'];
				if ($contestId==5||$contestId==6) {
					$team1Id = $_POST['player1_teamId'];
					$team2Id = $_POST['player2_teamId'];
					$player1Id = $_POST['player1_id'];
					$player2Id = $_POST['player2_id'];
					
					$player1Data = "$player1Id:$team1Id";
					$player2Data = "$player2Id:$team2Id";
					$fieldValueDB = "$player1Data;$player2Data";
					$fieldData = GF_FieldNameForContest('contest', $contestId);
					if ($fieldData) {
						$returnAmount 	= $bidAmount*$fieldData[2];
						$fieldName		= $fieldData[1];
						$placeBet = DatabaseOperations::placeBetOnContest($userId,$matchId,$contestId,$fieldName,$bidAmount,$returnAmount,$fieldValueDB);
						if ($placeBet) {
							$deductUserWalletBalance = DatabaseOperations::deductUserWalletBalance($userId,$bidAmount);
							$response = array('success'=>'true','message'=>'Bet Placed succesfully');
							echo json_encode($response);
							exit;
						}else{
							$response = array('success'=>'fail','message'=>'Error occured placing the bet');
							echo json_encode($response);
							exit;
						}
					}
				}else{
					$fieldValueDB = $_POST['teamId'];
					$fieldData = GF_FieldNameForContest('contest', $contestId);
					$returnAmount 	= $bidAmount*$fieldData[2];
					$fieldName		= $fieldData[1];
					$placeBet = DatabaseOperations::placeBetOnContest($userId,$matchId,$contestId,$fieldName,$bidAmount,$returnAmount,$fieldValueDB);
					if ($placeBet) {
						$deductUserWalletBalance = DatabaseOperations::deductUserWalletBalance($userId,$bidAmount);
						$response = array('success'=>'true','message'=>'Bet Placed successfully');
						echo json_encode($response);
						exit;
					}else{
						$response = array('success'=>'fail','message'=>'Error Occured');
						echo json_encode($response);
						exit;
					}
				}
			}else{
				$matchId = $_GET['match-id'];
				$getMatchDetailsByMatchId = DatabaseOperations::getMatchDetailByMatchId($matchId);
				//var_dump($getMatchDetailsByMatchId);
				$team1 = DatabaseOperations::getTeamNameByTeamId($getMatchDetailsByMatchId['teamId1']);
				$team2 =  DatabaseOperations::getTeamNameByTeamId($getMatchDetailsByMatchId['teamId2']);
				var_dump($team2);
				array_push($this->teams, $team1);
				array_push($this->teams, $team2);
				$this->matchDetails = $getMatchDetailsByMatchId;
				$this->team1player = DatabaseOperations::getTeamPlayerByTeamId($getMatchDetailsByMatchId['teamId1']);
				$this->team2player =  DatabaseOperations::getTeamPlayerByTeamId($getMatchDetailsByMatchId['teamId2']);
			}
			
		}
		
	}
}

$matchContest = new MatchContest();
?>