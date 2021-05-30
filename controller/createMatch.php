<?php

class createMatch
{
	public $allTeams;
	public $allActiveTournaments; 
	public function __construct()
	{

		$this->allTeams = DatabaseOperations::getAllTeams();
		$this->allActiveTournaments = DatabaseOperations::allActiveTournaments();
		if(isset($_POST['createMatch'])){
			$tournamentId = $_POST['tournamentId'];
			$teamId1 = $_POST['teamId1'];
			$teamId2 = $_POST['teamId2'];
			$teamPlayer1 = DatabaseOperations::getTeamSquadByTournament($teamId1);
			$teamPlayer2 = DatabaseOperations::getTeamSquadByTournament($teamId2);
			$createMatch = DatabaseOperations::createMatch($tournamentId,$teamId1,$teamId2,$teamPlayer1,$teamPlayer2);	
			if ($createMatch) {
				$response = array('success'=> 'true', 'message'=>'Match created successfully');
				echo json_encode($response);
				exit;
			}else{
				$response = array('success'=> 'fail', 'message'=>'Error creating match');
				echo json_encode($response);
				exit;
			}
		}
		if(isset($_POST['getTournamentTeams'])){
			$tournamentId = $_POST['tournamentId'];
			
			$teamsListTournament = DatabaseOperations::getTournamentAllTeams($tournamentId);	
			if ($teamsListTournament) {
				echo json_encode($teamsListTournament);
				exit;
			}else{
				$response = array('success'=> 'fail', 'message'=>'Error creating match');
				echo json_encode($response);
				exit;
			}
		}
		
	}
}

$createMatch = new createMatch();
?>