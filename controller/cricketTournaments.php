<?php

class cricketTournaments
{
	public $allTournamentList;
	public function __construct()
	{
			$this->allTournamentList = DatabaseOperations::getAllTournaments();
	}
}

$cricketTournaments = new cricketTournaments();
?>