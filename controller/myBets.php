<?php
require_once SITE_ROOT. '/generalFunctions.php';
class MyBets
{
	public $betListMatch=[];
	public function __construct()
	{
		if (isset($_GET['my-bets'])) {
			$userId = $_SESSION['receiverSession']['id'];
			$getUserBetsByMatches= DatabaseOperations::getUserBetsByMatches($userId);
			foreach ($getUserBetsByMatches as $key=>$value) {
				$contestId = $value['contest_id'];
				$fieldData = GF_FieldNameForContest('contest', $contestId);
				$matchDetail = DatabaseOperations::getMatchDetailByMatchId($value['match_id']);
				$teamName1 	 = DatabaseOperations::getTeamNameByTeamId($matchDetail['teamId1']);
				$teamName2   = DatabaseOperations::getTeamNameByTeamId($matchDetail['teamId2']);
				$getUserBetsByMatches[$key]['team1']=$teamName1['teamName'];
				$getUserBetsByMatches[$key]['team2']=$teamName2['teamName'];
				if ($contestId==5||$contestId==6) {
					$coulmnName =$fieldData[1];
					$fieldValueFromDB = $value[$coulmnName];
					$explodePlayers = explode(';', $fieldValueFromDB);
					$arrayLength = count($explodePlayers);
					for($i=0;$i<$arrayLength;$i++) {
						$explodePlayerWithTeam = explode(':',$explodePlayers[$i]);
						$getPlayerNameWithTeam = DatabaseOperations::getPlayerNameWithTeam($explodePlayerWithTeam[0]);
						$name = $getPlayerNameWithTeam['firstName'].$getPlayerNameWithTeam['lastName'];
						$teamName = $getPlayerNameWithTeam['teamName'];
						$variableName ="playerDetail$i";
						$getUserBetsByMatches[$key][$variableName]="$name:$teamName";
					}
				}else{
					$coulmnName =$fieldData[1];
					$fieldValueFromDB = $value[$coulmnName];
					$getTeamNameByTeamId = DatabaseOperations::getTeamNameByTeamId($fieldValueFromDB);
					$getUserBetsByMatches[$key]['teamName'] = $getTeamNameByTeamId['teamName'];
				}
				$getUserBetsByMatches[$key]['contestName'] = $fieldData[0];
			}
			$this->betListMatch=$getUserBetsByMatches;
			//$getUserBetsByTournamnet = DatabaseOperations::getUserBetsByTournament();
		}
	}
}

$myBets = new MyBets();
?>