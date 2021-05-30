<?php

class updateMatchResult
{
	public $matchTeams=[];
	public $matchPlayersTeam1=[];
	public $matchPlayersTeam2=[];
	public $winnerTeamResult;
	public $tossWinnerResult;
	public $mostRunPlayer1;
	public $mostRunPlayer2;
	public $mostWicketPlayer1;
	public $mostWicketPlayer2;
	public $mostFourTeam;
	public $mostSixTeam;
	public function __construct()
	{
		if (isset($_GET['update-match-result'])) {
			$matchId = $_GET['id'];
			$getMatchDetails = DatabaseOperations::getMatchDetailByMatchId($matchId);
			
			if ($getMatchDetails['team1highestRunPlayerId']>0) {
				$this->mostRunPlayer1=$getMatchDetails['team1highestRunPlayerId'];
			}
			if ($getMatchDetails['team2highestRunPlayerId']>0) {
				$this->mostRunPlayer2=$getMatchDetails['team2highestRunPlayerId'];
			}
			if ($getMatchDetails['matchWinnerTeamId']>0) {
				$this->winnerTeamResult=$getMatchDetails['matchWinnerTeamId'];
			}
			if ($getMatchDetails['tossWinnerTeamId']>0) {
				$this->tossWinnerResult=$getMatchDetails['tossWinnerTeamId'];
			}
			if ($getMatchDetails['mostFourTeamId']>0) {
				$this->mostFourTeam=$getMatchDetails['mostFourTeamId'];
			}
			if ($getMatchDetails['mostSixTeamId']>0) {
				$this->mostSixTeam=$getMatchDetails['mostSixTeamId'];
			}
			$matchPlayers1 = explode(':',$getMatchDetails['teamPlayers1']);
			$matchPlayers2 = explode(':',$getMatchDetails['teamPlayers2']);
			foreach ($matchPlayers1 as $key => $value) {
				$getPlayerDetailByPlayerId = DatabaseOperations::getPlayerDetailByPlayerId($value);
				array_push($this->matchPlayersTeam1, $getPlayerDetailByPlayerId);
			}
			foreach ($matchPlayers2 as $key => $value) {
				$getPlayerDetailByPlayerId = DatabaseOperations::getPlayerDetailByPlayerId($value);
				array_push($this->matchPlayersTeam2, $getPlayerDetailByPlayerId);
			}
			$getMatchTeam1 = DatabaseOperations::getTeamNameByTeamId($getMatchDetails['teamId1']);
			array_push($this->matchTeams, $getMatchTeam1);
			$getMatchTeam2 = DatabaseOperations::getTeamNameByTeamId($getMatchDetails['teamId2']);
			array_push($this->matchTeams, $getMatchTeam2);
		}
		
		if(isset($_POST['updateMatchResult'])){
		
			$matchId = $_POST['id'];
			$contestId = $_POST['contestId'];
			
			if ($contestId == 2) {
				$betFieldName = 'betted_teamWonMatchId';
				$fieldName='matchWinnerTeamId';
				$fieldValue = $_POST['teamId'];
				
				$updateMatchResult = DatabaseOperations::updateResultForMatch($matchId,$fieldName,$fieldValue);

				$getAllBetsByMatchAndContestId = DatabaseOperations::getAllBetsByMatchAndContestId($matchId,$contestId);
				foreach ($getAllBetsByMatchAndContestId as $matchBets) {
					if($matchBets[$betFieldName] == $fieldValue){
						if ($matchBets['userBetResult']==0) {
							$userId = $matchBets['user_id'];
							$walletBalance = $matchBets['betting_return_amount'];
							$betStatus = 1;
							$updateBetStatus = DatabaseOperations::updateBetStatus($userId,$matchId,$contestId,$betStatus);
							$updateWalletBalance = DatabaseOperations::updateWalletBalanceIncrease($userId,$walletBalance);
						}
					}else{
						if ($matchBets['userBetResult']==1) {
							$userId = $matchBets['user_id'];
							$walletBalance = $matchBets['betting_return_amount'];
							$betStatus = 0;
							$updateBetStatus = DatabaseOperations::updateBetStatus($userId,$matchId,$contestId,$betStatus);
							$updateWalletBalance = DatabaseOperations::deductUserWalletBalance($userId,$walletBalance);
						}
					}
				}
			}elseif($contestId == 1){
				$betFieldName = 'betted_toss_won_teamId';
				$fieldName=='tossWinnerTeamId';
				$fieldValue = $_POST['teamId'];
				$updateMatchResult = DatabaseOperations::updateResultForMatch($matchId,$fieldName,$fieldValue);
				$getAllBetsByMatchAndContestId = DatabaseOperations::getAllBetsByMatchAndContestId($matchId,$contestId);
				foreach ($getAllBetsByMatchAndContestId as $matchBets) {
					if($matchBets[$betFieldName] == $fieldValue){
						$userId = $matchBets['user_id'];
						$walletBalance = $matchBets['betting_return_amount'];
						$betStatus = 1;
						$updateBetStatus = DatabaseOperations::updateBetStatus($userId,$matchId,$contestId,$betStatus);
						$updateWalletBalance = DatabaseOperations::updateWalletBalanceIncrease($userId,$walletBalance);
					}else{
						if ($matchBets['userBetResult']==1) {
							$userId = $matchBets['user_id'];
							$walletBalance = $matchBets['betting_return_amount'];
							$betStatus = 0;
							$updateBetStatus = DatabaseOperations::updateBetStatus($userId,$matchId,$contestId,$betStatus);
							$updateWalletBalance = DatabaseOperations::deductUserWalletBalance($userId,$walletBalance);
						}
					}
				}
			}elseif($contestId ==4){
				$betFieldName = 'betted_total_four_TeamId';
				$fieldName=='mostFourTeamId';
				$fieldValue = $_POST['teamId'];
				$updateMatchResult = DatabaseOperations::updateResultForMatch($matchId,$fieldName,$fieldValue);

				$getAllBetsByMatchAndContestId = DatabaseOperations::getAllBetsByMatchAndContestId($matchId,$contestId);
				foreach ($getAllBetsByMatchAndContestId as $matchBets) {
					if($matchBets[$betFieldName] == $fieldValue){
						if($matchBets['userBetResult']==0) {
							$userId = $matchBets['user_id'];
							$walletBalance = $matchBets['betting_return_amount'];
							$betStatus = 1;
							$updateBetStatus = DatabaseOperations::updateBetStatus($userId,$matchId,$contestId,$betStatus);
							$updateWalletBalance = DatabaseOperations::updateWalletBalanceIncrease($userId,$walletBalance);
						}
					}else{
						if ($matchBets['userBetResult']==1) {
							$userId = $matchBets['user_id'];
							$walletBalance = $matchBets['betting_return_amount'];
							$betStatus = 0;
							$updateBetStatus = DatabaseOperations::updateBetStatus($userId,$matchId,$contestId,$betStatus);
							$updateWalletBalance = DatabaseOperations::deductUserWalletBalance($userId,$walletBalance);
						}
					}
				}
			}elseif($contestId ==3){
				$betFieldName = 'betted_total_six_teamId';
				$fieldName='mostSixTeamId';
				$fieldValue = $_POST['teamId'];
				$updateMatchResult = DatabaseOperations::updateResultForMatch($matchId,$fieldName,$fieldValue);
				$getAllBetsByMatchAndContestId = DatabaseOperations::getAllBetsByMatchAndContestId($matchId,$contestId);
				foreach ($getAllBetsByMatchAndContestId as $matchBets) {
					if($matchBets[$betFieldName] == $fieldValue){
						if ($matchBets['userBetResult']==0) {
							$userId = $matchBets['user_id'];
							$walletBalance = $matchBets['betting_return_amount'];
							$betStatus = 1;
							$updateBetStatus = DatabaseOperations::updateBetStatus($userId,$matchId,$contestId,$betStatus);
							$updateWalletBalance = DatabaseOperations::updateWalletBalanceIncrease($userId,$walletBalance);
						}
					}else{
						if ($matchBets['userBetResult']==1) {
							$userId = $matchBets['user_id'];
							$walletBalance = $matchBets['betting_return_amount'];
							$betStatus = 0;
							$updateBetStatus = DatabaseOperations::updateBetStatus($userId,$matchId,$contestId,$betStatus);
							$updateWalletBalance = DatabaseOperations::deductUserWalletBalance($userId,$walletBalance);
						}
					}
				}
			}elseif($contestId == 6 ){
				$betFieldName = 'betted_highest_wicketTaken';
				$fieldName='highestWicketTakerPlayerId';
				$fieldValue = $_POST['playerId1'].':'.$_POST['playerId2'];
				$playerTeamId1 = DatabaseOperations::getPlayerDetailByPlayerId($_POST['playerId1']);
				$playerTeamId1 = $playerTeamId1['teamId'];
				$playerTeamId2 = DatabaseOperations::getPlayerDetailByPlayerId($_POST['playerId2']);
				$playerTeamId2 = $playerTeamId2['teamId'];
				$betFieldName 	= $_POST['playerId1'].':'.$playerTeamId1.';'.$_POST['playerId2'].':'.$playerTeamId2;
				$updateMatchResult = DatabaseOperations::updateResultForMatch($matchId,$fieldName,$fieldValue);
				$getAllBetsByMatchAndContestId = DatabaseOperations::getAllBetsByMatchAndContestId($matchId,$contestId);
				foreach ($getAllBetsByMatchAndContestId as $matchBets) {
					if($matchBets[$betFieldName] == $betFieldName){
						if ($matchBets['userBetResult']==0) {
							$userId = $matchBets['user_id'];
							$walletBalance = $matchBets['betting_return_amount'];
							$betStatus = 1;
							$updateBetStatus = DatabaseOperations::updateBetStatus($userId,$matchId,$contestId,$betStatus);
							$updateWalletBalance = DatabaseOperations::updateWalletBalanceIncrease($userId,$walletBalance);
						}
					}else{
						if ($matchBets['userBetResult']==1) {
							$userId = $matchBets['user_id'];
							$walletBalance = $matchBets['betting_return_amount'];
							$betStatus = 0;
							$updateBetStatus = DatabaseOperations::updateBetStatus($userId,$matchId,$contestId,$betStatus);
							$updateWalletBalance = DatabaseOperations::deductUserWalletBalance($userId,$walletBalance);
						}
					}
				}
			}elseif($contestId == 5){
				$betFieldName = 'betted_highest_run_player_id';
				$fieldName1='team1highestRunPlayerId';
				$fieldName2='team2highestRunPlayerId';
				$fieldValue1 = $_POST['playerId1'];
				$fieldValue2 = $_POST['playerId2'];
				$playerTeamId1 = DatabaseOperations::getPlayerDetailByPlayerId($fieldValue1);
				$playerTeamId1 = $playerTeamId1['teamId'];
				$playerTeamId2 = DatabaseOperations::getPlayerDetailByPlayerId($fieldValue2);
				$playerTeamId2 = $playerTeamId2['teamId'];
				$fieldValue = $fieldValue1.':'.$playerTeamId1.';'.$fieldValue2.':'.$playerTeamId2;
				$updateMatchResult = DatabaseOperations::updateResultForMatchHighestRun($matchId,$fieldName1,$fieldValue1,$fieldName2,$fieldValue2);
				$getAllBetsByMatchAndContestId = DatabaseOperations::getAllBetsByMatchAndContestId($matchId,$contestId);
				foreach ($getAllBetsByMatchAndContestId as $matchBets) {
					if($matchBets[$betFieldName] == $fieldValue){
						if ($matchBets['userBetResult']==0) {
							$userId = $matchBets['user_id'];
							$walletBalance = $matchBets['betting_return_amount'];
							$betStatus = 1;
							$updateBetStatus = DatabaseOperations::updateBetStatus($userId,$matchId,$contestId,$betStatus);
							$updateWalletBalance = DatabaseOperations::updateWalletBalanceIncrease($userId,$walletBalance);
						}
						
					}else{
						if ($matchBets['userBetResult']==1) {
							$userId = $matchBets['user_id'];
							$walletBalance = $matchBets['betting_return_amount'];
							$betStatus = 0;
							$updateBetStatus = DatabaseOperations::updateBetStatus($userId,$matchId,$contestId,$betStatus);
							$updateWalletBalance = DatabaseOperations::deductUserWalletBalance($userId,$walletBalance);
						}
					}
				}
			}
				
		}
	}
}

$updateMatchResult = new updateMatchResult();
?>