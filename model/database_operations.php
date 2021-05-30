<?php

class DatabaseOperations
{
	
	public static function createHospital($name, $email, $password){

		$query = "INSERT INTO hospital_db (hh_name, hh_email, hh_password) VALUES (?,?,?)";
		$params = [$name, $email, $password];

		return DatabaseHandler::Execute($query,$params);
	}
	public static function inssertOrderDetailsForUser($user_id,$razorpayId,$amount,$status){

		$query = "INSERT INTO user_payments (user_id, razorpay_id, amount, status) VALUES (?, ?, ?, ?)";

		return DatabaseHandler::Execute($query,[$user_id,$razorpayId,$amount,$status]);
	}
	public static function updatePaymentstatus($user_id,$razorpayId){

		$query = "UPDATE user_payments SET status=1 WHERE user_id = ? AND razorpay_id = ?";

		return DatabaseHandler::Execute($query,[$user_id,$razorpayId]);
	}
	public static function checkPaymentstatus($user_id,$razorpayId){

		$query = "SELECT status FROM  user_payments WHERE user_id = ? AND razorpay_id = ?";

		return DatabaseHandler::GetOne($query,[$user_id,$razorpayId]);
	}
	public static function updateWalletBalance($user_id,$walletBalanceAmount){

		$query = "UPDATE users_db SET walletBalance = walletBalance+$walletBalanceAmount  WHERE id = ? ";

		return DatabaseHandler::Execute($query,[$user_id]);
	}
	
	public static function getAllPlayers(){

		$query = "SELECT * FROM players";

		return DatabaseHandler::GetAll($query);
	}

	public static function getAllTeams(){

		$query = "SELECT * FROM teams";

		return DatabaseHandler::GetAll($query);
	}
	public static function getAllTodayMatches($date){

		// $query = "SELECT * FROM matches WHERE matchDate >= CURDATE()";
		$query = "SELECT * FROM matches";
		return DatabaseHandler::GetAll($query);
	}
	public static function getMatchDetailByMatchId($matchId){
		$query = "SELECT * FROM matches WHERE id = ?";
		return DatabaseHandler::GetRow($query,[$matchId]);
	}
	public static function getTeamPlayerByTeamId($teamId){
		$query = "SELECT * FROM players WHERE teamId = ?";
		return DatabaseHandler::GetAll($query,[$teamId]);
	}
	public static function placeBetOnContest($userId,$matchId,$contestId,$fieldName,$bidAmount,$returnAmount,$fieldValueDB){
		$query = "INSERT INTO user_match_betting_db (user_id,match_id, contest_id, $fieldName, betting_amount, betting_return_amount) VALUES(?,?,?,?,?,?)";
		return DatabaseHandler::Execute($query,[$userId,$matchId,$contestId,$fieldValueDB,$bidAmount,$returnAmount]);
		
	}
	public static function getUserBetsByMatches($userId){
		$query = "SELECT user_match_betting_db.* FROM user_match_betting_db WHERE match_id!=0 AND user_id=?";
		return DatabaseHandler::GetAll($query,[$userId]);
	}
	public static function getPlayerNameWithTeam($playerId){
		$query = 	"SELECT players.firstName,players.lastName,teams.teamName 
					FROM players 
					INNER JOIN teams 
					ON players.teamId=teams.id WHERE players.id=$playerId";
		return DatabaseHandler::GetRow($query,[$playerId]);
	}
	public static function getTeamNameByTeamId($teamId){
		$query = 	"SELECT * FROM teams 
					 WHERE teams.id=?";
		return DatabaseHandler::GetRow($query,[$teamId]);
	}
	public static function deductUserWalletBalance($userId,$bidAmount){
		$query = 	"UPDATE users_db SET walletBalance = walletBalance-$bidAmount WHERE id = ?";
		return DatabaseHandler::Execute($query,[$userId]);
	}
	public static function getTeamMultiplier($teamId,$fieldName){
		$query = 	"SELECT $fieldName FROM teams WHERE id=?";
		return DatabaseHandler::GetOne($query,[$teamId]);
	}
	public static function getPlayerMultiplier($playerId,$fieldName){
		$query = 	"SELECT $fieldName FROM players WHERE id=?";
		return DatabaseHandler::GetOne($query,[$playerId]);
	}
	public static function placeBetForTournament($userId,$contestId,$fieldName,$fieldValue,$bidAmount,$returnAmount){
		$query = 	"INSERT INTO user_tournament_betting (user_id, contestId,bettingAmount,returnAmount,$fieldName) VALUES(?,?,?,?,?)";
		return DatabaseHandler::Execute($query,[$userId,$contestId,$bidAmount,$returnAmount,$fieldValue]);
	}
	public static function addUserBankDetails($userId,$bankName,$accountNo,$ifscCode,$accountHolderName){
		$query = 	"INSERT INTO userbankdetails (user_id, bankName,bank_ifsc,bank_accountno,bank_accountHolderName) VALUES(?,?,?,?,?)";
		return DatabaseHandler::Execute($query,[$userId,$bankName,$accountNo,$ifscCode,$accountHolderName]);
	}
	public static function userWithdrawlRequest($userId,$withdrawAmount){
		$query = 	"INSERT INTO user_withdrawlrequest (user_id, withdrawAmount,withdrawlStatus) VALUES(?,?,?)";
		return DatabaseHandler::Execute($query,[$userId,$withdrawAmount,0]);
	}
	public static function updateBetStatus($userId,$matchId,$contestId,$betStatus){
		$query = 	"UPDATE user_match_betting_db SET userBetResult=$betStatus, betStatus = 1 WHERE user_id=$userId AND match_id = $matchId AND contest_id = $contestId";
		var_dump($query);
		return DatabaseHandler::Execute($query);
	}
	public static function updateWalletBalanceIncrease($userId,$walletBalance){
		$query = 	"UPDATE users_db SET walletBalance=walletBalance+$walletBalance WHERE id=?";
		return DatabaseHandler::Execute($query,[$userId]);
	}
	public static function getPlayerDetailByPlayerId($playerId){
		$query = 	"SELECT * FROM players WHERE id=?";
		return DatabaseHandler::GetRow($query,[$playerId]);
	}
	public static function updateResultForMatch($matchId,$fieldName,$fieldValue){
		$query = 	"UPDATE matches SET $fieldName = $fieldValue WHERE id=$matchId";
		return DatabaseHandler::Execute($query);
	}
	public static function updateResultForMatchHighestRun($matchId,$fieldName1,$fieldValue1,$fieldName2,$fieldValue2){
		$query = 	"UPDATE matches SET $fieldName1 = $fieldValue1, $fieldName2=$fieldValue2 WHERE id=$matchId";
		return DatabaseHandler::Execute($query);
	}

	public static function getAllBetsByMatchAndContestId($matchId,$contestId){
		$query = 	"SELECT * FROM user_match_betting_db WHERE match_id=$matchId AND contest_id = $contestId";
		return DatabaseHandler::GetAll($query);
	}
	public static function createCricketTournament($tournamentName){
		$tableName = 'crickettournaments';
		$query = 	"INSERT INTO crickettournaments (tournamentName) VALUES (?)";
		DatabaseHandler::Execute($query,[$tournamentName]);
		return self::getLastInsertedId($tableName);
	}
	public static function getLastInsertedId($tableName){
		$query = 	"SELECT MAX(id) FROM $tableName";
		return DatabaseHandler::GetOne($query);
	}
	public static function insertTournamentTeams($tournamentId,$teamId){
		$query = 	"INSERT INTO crickettournamentteams (tournamentId,teamId) VALUES (?,?)";
		return DatabaseHandler::Execute($query,[$tournamentId,$teamId]);
	}
	public static function getTournamentAllTeams($tournamentId){
		$query = 	"SELECT crickettournamentteams.*,teams.* FROM crickettournamentteams 
					 INNER JOIN teams ON crickettournamentteams.teamId=teams.id WHERE crickettournamentteams.tournamentId=?";
		return DatabaseHandler::GetAll($query,[$tournamentId]);
	}
	public static function updateTeamSquad($tournamentId,$teamId,$teamPlayers){
		$query = 	"UPDATE crickettournamentteams SET teamSquadList = ?
					WHERE crickettournamentteams.tournamentId =? 
					AND   crickettournamentteams.teamId      =?";
		return DatabaseHandler::Execute($query,[$teamPlayers,$tournamentId,$teamId]);
	}
	public static function getTeamSquadByTournament($tournamentId,$teamId){
		$query = 	"SELECT  teamSquadList FROM crickettournamentteams
					WHERE crickettournamentteams.tournamentId =? 
					AND   crickettournamentteams.teamId      = ?";
		return DatabaseHandler::GetOne($query,[$tournamentId,$teamId]);
	}
	public static function allActiveTournaments(){
		$query =    "SELECT * FROM crickettournaments";
		return DatabaseHandler::GetAll($query);
	}
	




	

	
	
	
	
	







	public static function checkExistingReceiver($email){

		$query = "SELECT * FROM users_db WHERE  email_id = '$email'";

		return DatabaseHandler::GetRow($query);
	}

	public static function getUserData($userId){
		$query = "SELECT * FROM users_db WHERE  id = ?";
		return DatabaseHandler::GetRow($query,[$userId]);
	}
	public static function createReceiver($name, $mobile, $email, $dateOfBirth, $password){

		$query = "INSERT INTO users_db (name, mobile, email_id, userDateOfBirth, password) VALUES (?,?,?,?,?)";
		$params = [$name, $mobile, $email, $dateOfBirth, $password];
		return DatabaseHandler::Execute($query,$params);
	}

	public static function loginHospital( $email, $password){

		$query = "SELECT * FROM hospital_db WHERE  hh_email = '$email' AND hh_password = '$password'";

		return DatabaseHandler::GetRow($query);
	}

	public static function loginReceiver( $email, $password){

		$query = "SELECT * FROM users_db WHERE  email_id = '$email' AND password = '$password'";

		return DatabaseHandler::GetRow($query);
	}

	public static function getTeamPlayersByTeamId($teamId1){
		$query = "SELECT id FROM players WHERE teamId = ?";
		$params = [$teamId1];
		return DatabaseHandler::GetAll($query,$params);
	}
	public static function createMatch($tournamentId,$teamId1,$teamid2,$teamPlayer1,$teamPlayer2){
		$query = "INSERT INTO matches (tournamentIdteamId1,teamId2,teamPlayers1,teamPlayers2) VALUES (?,?,?,?,?)";
		$params = [$tournamentId,$teamId1,$teamid2,$teamPlayer1,$teamPlayer2];
		return DatabaseHandler::Execute($query,$params);
	}
	public static function getAllTournaments(){
		$query = "SELECT * FROM crickettournaments";
		return DatabaseHandler::GetAll($query);
	}
	public static function getTournamentDetailsByTournamentId($tournamentId){
		$query = "SELECT * FROM crickettournaments WHERE id = ?";
		return DatabaseHandler::GetRow($query,[$tournamentId]);
	}
	public static function updateMatchDetails($matchId,$startTiming,$match_date,$battingRate,$bowlingRate,$matchStatus,$teamFirstId,$team1winningRate,$team1TossWinRate,$team1MostFourRate,$team1MostSixRate,$teamSecondId,$team2winningRate,$team2TossWinRate,$team2MostFourRate,$team2MostSixRate){
		$query = "UPDATE matches SET  
						matchStartTime = ?, 
						matchStartDate = ?, 
						battingRate    = ?, 
						bowlingRate    = ?, 
						matchStatus    = ?, 
						teamId1        = ?, 
						team1winningRate  = ?,
						team1TossWinRate  = ?,
						team1MostFourRate = ?,
						team1MostSixRate  = ?,
						teamId2      = ?,
						team2winningRate  = ?, 
						team2TossWinRate  = ?;
						team2MostFourRate = ?;
						team2MostSixRate  = ? 
					WHERE id = ?";

		return DatabaseHandler::Execute($query,[$startTiming,$match_date,$battingRate,$bowlingRate,$matchStatus,$teamFirstId,$team1winningRate,$team1TossWinRate,$team1MostFourRate,$team1MostSixRate,$teamSecondId,$team2winningRate,$team2TossWinRate,$team2MostFourRate,$team2MostSixRate,$matchId]);
	}


	

	
}


?>