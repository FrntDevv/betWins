<?php

class createCricketTournament
{
	public $allTeams;
	public function __construct()
	{
		$this->allTeams = DatabaseOperations::getAllTeams();
		if(isset($_POST['create_tournament'])){
			//$data = $_POST['data'];
			var_dump($_POST);
			exit;
			//$tournamentName = $data['tournamentName'];
			//$tournamentTeams = $data['teams'];
			$tournamentName = "Sahara Cup 2020";
			$tournamentTeams = array(array('id'=>1),array('id'=>2));
			$createCricketTournament = DatabaseOperations::createCricketTournament($tournamentName);
			$tournamentId = $createCricketTournament;
			foreach ($tournamentTeams as $teams) {
				$flag = false;
				$insertTournamentTeams = DatabaseOperations::insertTournamentTeams($tournamentId,$teams['id']);
				if ($insertTournamentTeams) {
					$flag = true;
				}
			}
			if($flag){
				$response = array('success'=>'true','message'=>'Tournament created');
				echo json_encode($response);
				exit;
			}else{
				$response = array('success'=>'fail','message'=>'Error');
				echo json_encode($response);
				exit;
			}
		}
	}
}

$createCricketTournament = new createCricketTournament();
?>