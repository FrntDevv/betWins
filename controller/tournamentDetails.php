<?php

class TournamentDetails
{
	public $record=[];
	public $tournamenDetails;
	public $matchesList=[];
	public function __construct()
	{
		if(isset($_GET['tournamentDetails'])){
			if (isset($_POST['tournamentDetailsUpdate'])) {
				var_dump($_POST);
				
			}else{
				$tournamentId = $_GET['tournament-id'];
				$getTournamentDetails = DatabaseOperations::getTournamentDetailsByTournamentId($tournamentId);
				$this->tournamenDetails['tournamentName'] = $getTournamentDetails['tournamentName'];
				$teamsData = [];
				$getTournamentTeams = DatabaseOperations::getTournamentAllTeams($tournamentId);
				$this->tournamenDetails['teams']=[];
				//var_dump($getTournamentTeams);
				foreach ($getTournamentTeams as $teams) {
					$teamName = $teams['teamName'];
					$teamId = $teams['id'];
					$mostFourHitRate = $teams['mostFourHitRate'];
					$mostSixHitRate = $teams['mostSixHitRate'];
					$tournamentWinRate = $teams['tournamentWinRate'];
					$teamsData['teamName'] = $teamName;
					$teamsData['teamId']   = $teamId;
					$teamsData['mostFourHitRate'] = $mostFourHitRate;
					$teamsData['mostSixHitRate'] = $mostSixHitRate;
					$teamsData['tournamentWinRate'] = $tournamentWinRate;
					$teamsData['players'] = [];
					$teamRates = explode(';', $teams['teamPlayerWithBattingBowlingRate']);
					foreach ($teamRates as $rateArray) {
						$players = []; 
						$explodeTeamRate = explode(':', $rateArray);
						$playerId        = $explodeTeamRate[0];
						$getPlayerDetail = DatabaseOperations::getPlayerDetailByPlayerId($playerId);
						$playerId = $getPlayerDetail['id'];
						$playerName = $getPlayerDetail['firstName']." ".$getPlayerDetail['lastName'];
						$battingRate = $explodeTeamRate[1];
						$wicketRate  = $explodeTeamRate[2];
						$players['id'] = $playerId;
						$players['name'] = $playerName;
						$players['battingRate'] = $battingRate;
						$players['wicketRate'] 	= $wicketRate;
						array_push($teamsData['players'],$players);
					}
					
					array_push($this->tournamenDetails['teams'], $teamsData);
				}
			}
		}
		//var_dump($this->tournamenDetails);
	}
}

$tournamentDetails = new TournamentDetails();
?>