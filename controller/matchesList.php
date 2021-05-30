<?php

class MatchesList
{
	public $record=[];
	public $playersList;
	public $matchesList=[];
	public function __construct()
	{
		$date = date("Y-m-d");
		$matchDetails = DatabaseOperations::getAllTodayMatches($date);
		foreach ($matchDetails as $match) {
			$teamFirstName =  DatabaseOperations::getTeamNameByTeamId($match['teamId1']);
			$teamSecondName =  DatabaseOperations::getTeamNameByTeamId($match['teamId2']);
			$match['teamNameFirst']=$teamFirstName['teamName'];
			$match['teamNameSecond']=$teamSecondName['teamName'];
			array_push($this->matchesList,$match);
		}
		
		
		
		//$teamsDetails 		=	DatabaseOperations::getAllTodayMatches($date);

	}
}

$matcheList = new MatchesList();
?>