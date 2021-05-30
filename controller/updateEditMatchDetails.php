<?php

class MatchDetails
{
	public $record=[];
	public $matchDetails;
	public $matchesList=[];
	public function __construct()
	{
		if(isset($_GET['matchDetails'])){
			if (isset($_POST['matchDetailsUpdate'])) {
				$matchId 		   =  $_POST['matchID']=2;
				$startTiming       =  $_POST['match_time'];
				$match_date        =  $_POST['match_date'];
				$battingRate       =  $_POST['battingRate'];
				$bowlingRate       =  $_POST['bowlingRate'];
				$matchStatus       =  $_POST['matchStatus'];
				$teamFirstId       =  $_POST['teamFirstId'];
				$team1winningRate  =  $_POST['team1winningRate'];
				$team1TossWinRate  =  $_POST['team1TossWinRate'];
				$team1MostFourRate =  $_POST['team1MostFourRate'];
				$team1MostSixRate  =  $_POST['team1MostSixRate'];

				$teamSecondId      =  $_POST['teamSecondId'];
				$team2winningRate  =  $_POST['team2winningRate'];
				$team2TossWinRate  =  $_POST['team2TossWinRate'];
				$team2MostFourRate =  $_POST['team2MostFourRate'];
				$team2MostSixRate  =  $_POST['team2MostSixRate'];

				$updateMatchDetails  = DatabaseOperations::updateMatchDetails($matchId,$startTiming,$match_date,$battingRate,$bowlingRate,$matchStatus,$teamFirstId,$team1winningRate,$team1TossWinRate,$team1MostFourRate,$team1MostSixRate,$teamSecondId,$team2winningRate,$team2TossWinRate,$team2MostFourRate,$team2MostSixRate);

				
			}else{
				$matchId = $_GET['matchID'];
				$getMatchDetails = DatabaseOperations::getMatchDetailByMatchId($matchId);
				$tournamentId = $getMatchDetails['tournamentId'];
				$getTournamentDetails = DatabaseOperations::getTournamentDetailsByTournamentId($tournamentId);
				$teamFirst  = DatabaseOperations::getTeamNameByTeamId($getMatchDetails['teamId1']);
				$teamSecond = DatabaseOperations::getTeamNameByTeamId($getMatchDetails['teamId2']);
				$teamFirstName  = $teamFirst['teamName'];
				$teamFirstId    = $teamFirst['id'];
				$teamSecondName = $teamSecond['teamName'];
				$teamSecondId   = $teamSecond['id'];
				$this->matchDetails['tournamentName'] = $getTournamentDetails['tournamentName'];
				$this->matchDetails['matchTime'] = $getMatchDetails['matchStartTime'];
				$this->matchDetails['matchDate'] = $getMatchDetails['matchStartDate'];
				$this->matchDetails['matchVenue'] = $getMatchDetails['matchVenue'];

				$this->matchDetails['teamFirstName'] = $teamFirstName;
				$this->matchDetails['teamFirstId'] = $teamFirstId;

				$this->matchDetails['teamSecondName'] = $teamSecondName;
				$this->matchDetails['teamSecondId'] = $teamSecondId;

				$this->matchDetails['battingRate'] = $getMatchDetails['battingRate'];
				$this->matchDetails['bowlingRate'] = $getMatchDetails['bowlingRate'];

				$this->matchDetails['team1winningRate'] = $getMatchDetails['team1winningRate'];
				$this->matchDetails['team2winningRate'] = $getMatchDetails['team2winningRate'];
				$this->matchDetails['team1TossWinRate'] = $getMatchDetails['team1winningRate'];
				$this->matchDetails['team2TossWinRate'] = $getMatchDetails['team2winningRate'];
				$this->matchDetails['team1MostFourRate'] = $getMatchDetails['team1MostFourRate'];
				$this->matchDetails['team2MostFourRate'] = $getMatchDetails['team2MostFourRate'];
				$this->matchDetails['team1MostSixRate'] = $getMatchDetails['team1MostSixRate'];
				$this->matchDetails['team2MostsixRate'] = $getMatchDetails['team2MostsixRate'];
				$this->matchDetails['matchStatus'] = $getMatchDetails['matchStatus'];
				
				
				$teamsData = [];
				$getTournamentTeams = DatabaseOperations::getTournamentAllTeams($tournamentId);
				$this->matchDetails['teams']=[];
				//var_dump($getTournamentTeams);
				foreach ($getTournamentTeams as $teams) {
					$teamName = $teams['teamName'];
					$teamId = $teams['id'];
					$mostFourHitRate = $teams['mostFourHitRate'];
					$mostSixHitRate = $teams['mostSixHitRate'];
					$tournamentWinRate = $teams['tournamentWinRate'];
					$teamsData['teamName'] = $teamName;
					$teamsData['teamId']   = $teamId;
					array_push($this->matchDetails['teams'], $teamsData);
				}
			}
		}
		// var_dump($this->matchDetails);
	}
}

$matchDetails = new MatchDetails();
?>