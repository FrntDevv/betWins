<?php
require_once SITE_ROOT. '/generalFunctions.php';
class Home
{
	public $record=[];
	public $playersList;
	public $teamList;
	public function __construct()
	{
		$this->playersList = DatabaseOperations::getAllPlayers();
		$this->teamList = DatabaseOperations::getAllTeams();

		if (isset($_POST['placeTournamentBet'])) {
			$userId = $_SESSION['receiverSession']['id']=1;
			$bidAmount = $_POST['bidAmount'];
			$contestId = $_POST['contestId'];
			$getFieldNameToInsert = GF_FieldNameForTournamnetContest('tournamentContest',$contestId);
			$fieldName = $getFieldNameToInsert[1];
			if ($contestId==11||$contestId==12||$contestId==13) {
				$fieldValue = $_POST['teamId'];
				if ($contestId==11) {
					$multiplierFieldName = 'winTournamentRate';
				}elseif($contestId==12){
					$multiplierFieldName = 'mostSixesRate';
				}elseif($contestId==13){
					$multiplierFieldName = 'mostFourRate';
				}
				$getTeamMultiplier 	= DatabaseOperations::getTeamMultiplier($fieldValue,$multiplierFieldName);
				$returnAmount 	= $bidAmount*$getTeamMultiplier;
			}else{
				if ($contestId==14) {
					$multiplierFieldName = 'battingRate';
				}elseif($contestId==15){
					$multiplierFieldName = 'bowlingRate';
				}
				$fieldValue = $_POST['playerId'];
				$getPlayerMultiplier = DatabaseOperations::getPlayerMultiplier($fieldValue,$multiplierFieldName);
				$returnAmount 	= $bidAmount*$getPlayerMultiplier;
			}
			$placeTournamentBet = DatabaseOperations::placeBetForTournament($userId,$contestId,$fieldName,$fieldValue,$bidAmount,$returnAmount);
			if ($placeTournamentBet) {
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
	}
}

$homepage = new Home();
?>