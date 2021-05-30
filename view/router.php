<?php
		if (isset($_GET['hospital-registration'])) {
			require_once VIEW_DIRECTORY.'hospital_registration.php';
		}elseif (isset($_POST['hospital_registration'])) {
			require_once VIEW_DIRECTORY.'hospital_registration.php';
		}elseif (isset($_GET['user-registration'])) {
			require_once VIEW_DIRECTORY.'receiver_registration.php';
		}elseif (isset($_POST['receiver_registration'])) {
			require_once VIEW_DIRECTORY.'receiver_registration.php';
		}elseif (isset($_GET['login'])) {
			require_once VIEW_DIRECTORY.'login.php';
		}elseif(isset($_POST['hospitalLogin'])){
			require_once VIEW_DIRECTORY.'login.php';
		}elseif(isset($_POST['receiverLogin'])){
			require_once VIEW_DIRECTORY.'login.php';
		}elseif(isset($_GET['home'])){
			require_once VIEW_DIRECTORY.'home.php';
		}elseif (isset($_POST['hospitalLogout'])) {
			require_once VIEW_DIRECTORY.'home.php';
		}elseif (isset($_POST['receiverLogout'])) {
			require_once VIEW_DIRECTORY.'home.php';
		}elseif (isset($_POST['requestSample'])) {
			require_once VIEW_DIRECTORY.'home.php';
		}elseif(isset($_GET['registration'])){
			require_once VIEW_DIRECTORY.'registration.php';
		}elseif(isset($_GET['add-money'])){
			require_once VIEW_DIRECTORY.'add_money.php';
		}elseif(isset($_GET['verifyPayment'])){
			require_once VIEW_DIRECTORY.'verifyPayment.php';
		}elseif(isset($_GET['today-matches'])){
			require_once VIEW_DIRECTORY.'matchesList.php';
		}elseif(isset($_GET['match-id'])){
			require_once VIEW_DIRECTORY.'match-contest.php';
		}elseif(isset($_GET['bank-details'])){
			require_once VIEW_DIRECTORY.'addBankDetails.php';
		}elseif(isset($_GET['withdraw'])){
			require_once VIEW_DIRECTORY.'withdraw.php';
		}elseif(isset($_GET['update-match-result'])){
			require_once VIEW_DIRECTORY.'updateMatchResults.php';
		}elseif(isset($_GET['create-match'])){
			require_once VIEW_DIRECTORY.'create_match.php';
		}elseif(isset($_GET['transctions'])){
			require_once VIEW_DIRECTORY.'transction.php';
		}elseif(isset($_GET['cricket-tournament-create'])){
			require_once VIEW_DIRECTORY.'cricketTournamentCreate.php';
		}elseif(isset($_GET['update-team-squad'])){
			require_once VIEW_DIRECTORY.'updateTournamentTeamsSquad.php';
		}elseif(isset($_GET['cricket-tournaments'])){
			require_once VIEW_DIRECTORY.'cricketTournaments.php';
		}elseif(isset($_GET['tournamentDetails'])){
			require_once VIEW_DIRECTORY.'tournamentDetails.php';
		}elseif(isset($_GET['matchDetails'])){
			require_once VIEW_DIRECTORY.'updateEditMatchDetail.php';
		}elseif(isset($_GET['admin-login'])){
			require_once VIEW_DIRECTORY.'adminLogin.php';
		}elseif(isset($_GET['admin-dashboard'])){
			require_once VIEW_DIRECTORY.'adminDashboard.php';
		}elseif(isset($_GET['admin-match-list'])){
			require_once VIEW_DIRECTORY.'adminMatchList.php';
		}elseif(isset($_GET['admin-tournament-list'])){
			require_once VIEW_DIRECTORY.'adminTournamentList.php';
		}
		if (isset($_SESSION['hospitalSession'])) {
			if (isset($_GET['sample_request'])){
				require_once VIEW_DIRECTORY.'sample_request.php';
			}elseif(isset($_POST['addBloodInfo'])){
				require_once VIEW_DIRECTORY.'add_blood_info.php';
			}elseif(isset($_GET['addBloodInfo'])){
				require_once VIEW_DIRECTORY.'add_blood_info.php';
			}elseif (isset($_GET['hospital_dashboard'])) {
				require_once VIEW_DIRECTORY.'hospital_dashboard.php';
			}
		}
		if(isset($_SESSION['receiverSession'])){

			if(isset($_GET['dashboard'])){
				require_once VIEW_DIRECTORY.'receiver_dashboard.php';
			}elseif(isset($_GET['my-bets'])){
				require_once VIEW_DIRECTORY.'my-bets.php';
			}elseif(isset($_GET['bank-details'])){
				require_once VIEW_DIRECTORY.'addBankDetails.php';
			}
		}			

?>