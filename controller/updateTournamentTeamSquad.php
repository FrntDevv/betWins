<?php

class updateTournamentTeamSquad
{
	public $tournamentTeams = [];
	public $allPlayers;
	public function __construct()
	{
		if(isset($_POST['squadUpdates'])){
			var_dump($_POST);
			exit;
			//$tournamentId = $_POST['tournamentId'];
			$tournamentId = 9;
			//$teamsSquad   = $_POST['teams'];
			$teamsSquad   = [
								['teamId'=>1,'players'=>'1:2:3:4:5:6:7:8:9:10:11:12:13:14:15'],
								['teamId'=>2,'players'=>'16:17:18:19:20:21:22:23:24:25:26:27:28:29:30']
							];
			foreach ($teamsSquad as $squad) {
				$flag = false;
				$teamId = $squad['teamId'];
				$teamPlayers 		= $squad['players'];
				$updateTeamSquad 	= DatabaseOperations::updateTeamSquad($tournamentId,$teamId,$teamPlayers);
				if ($updateTeamSquad) {
					$flag = true;
				}
			}

			if($flag){
					$response = array('success'=>'true','message'=>'Teams updated');
					echo json_encode($response);
					exit;
				}else{
					$response = array('success'=>'fail','message'=>'Error');
					echo json_encode($response);
					exit;
				}
		}



		if(isset($_GET['update-team-squad'])){
			$this->allPlayers = DatabaseOperations::getAllPlayers();
			$tournamentId = $_GET['tournament-id']=9;
			$getTournamentAllTeams = DatabaseOperations::getTournamentAllTeams($tournamentId);
			$playersArray = [];
			foreach ($getTournamentAllTeams as $key => $value) {
				$getTeamDetails = DatabaseOperations::getTeamNameByTeamId($value['teamId']);
				$getTeamPlayers = DatabaseOperations::getTeamSquadByTournament($tournamentId,$value['teamId']);
				$teamPlayers = explode(':', $getTeamPlayers);
				foreach ($teamPlayers as $players) {
					$getPlayersDetails = DatabaseOperations::getPlayerDetailByPlayerId($players);
					array_push($playersArray,$getPlayersDetails);
				}
				$getTeamDetails['players'] = $playersArray;
				array_push($this->tournamentTeams, $getTeamDetails);
			}

			// var_dump($this->tournamentTeams);
		}
	}
}

$updateTournamentTeamSquad = new updateTournamentTeamSquad();
?>