<?php
require_once CONTROLLER_DIR.'updateMatchResult.php'; 
require_once VIEW_DIRECTORY.'homeHeader.php';
var_dump($updateMatchResult);
?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="styles/login.css" />
<script src="js/updateMatchResult.js?v={jsversion()}"></script>
      <div class="container mb-5">
        <div class="row justify-content-center no-gutters">
          <div class="col-12 col-sm-8 col-md-7 col-lg-6 col-xl-6 loginFormSection bg-white">
            <div class="row text-center no-gutters" style="cursor: pointer;">
              <h3 class="col-12 btn-light border reslgbtn p-2">Match Result</h3>
            </div>
            <div class="row justify-content-center no-gutters">
              <div class="col-sm-12 p-0">
                <div class="receiverLoginSection">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-12">
                        <form id="userBankDetails">
                          <div class="form-group match_winner_container">
                            <label for="">Match Winner:</label>
                            <select class="custom-select">
                              <option selected disabled="">Select</option>
                              <?php
                              foreach($updateMatchResult->matchTeams as $matchTeams){
                                if ($updateMatchResult->winnerTeamResult==$matchTeams['id']) {
                                  echo '<option class="matchResult" selected contest-id=2 selected-id='.$matchTeams['id'].'>'.$matchTeams['teamName'].'</option>';
                                }else{
                                  echo '<option class="matchResult" contest-id=1 selected-id='.$matchTeams['id'].'>'.$matchTeams['teamName'].'</option>';
                                }
                                
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group match_winner_container">
                            <label for="">Toss Winner:</label>
                            <select class="custom-select">
                              <option selected disabled="">Select</option>
                              <?php
                              foreach($updateMatchResult->matchTeams as $matchTeams){
                                if ($updateMatchResult->tossWinnerResult==$matchTeams['id']) {
                                    echo '<option class="matchResult" selected contest-id=1 selected-id='.$matchTeams['id'].'>'.$matchTeams['teamName'].'</option>';
                                }else{
                                  echo '<option class="matchResult" contest-id=2 selected-id='.$matchTeams['id'].'>'.$matchTeams['teamName'].'</option>';
                                }
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group match_winner_container">
                            <label for="">Team Hit Most Four:</label>
                            <select class="custom-select">
                              <option selected disabled="">Select</option>
                              <?php
                              foreach($updateMatchResult->matchTeams as $matchTeams){
                                if ($updateMatchResult->mostFourTeam==$matchTeams['id']) {
                                  echo '<option class="matchResult" selected contest-id=4 selected-id='.$matchTeams['id'].'>'.$matchTeams['teamName'].'</option>';
                                }else{
                                    echo '<option class="matchResult" contest-id=4 selected-id='.$matchTeams['id'].'>'.$matchTeams['teamName'].'</option>';
                                }
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group match_winner_container">
                            <label for="">Team Hit Most Sixes:</label>
                            <select class="custom-select">
                              <option selected disabled="">Select</option>
                              <?php
                              foreach($updateMatchResult->matchTeams as $matchTeams){
                                if ($updateMatchResult->mostSixTeam==$matchTeams['id']) {
                                  echo '<option class="matchResult" selected contest-id=3 selected-id='.$matchTeams['id'].'>'.$matchTeams['teamName'].'</option>';
                                }else{
                                    echo '<option class="matchResult" contest-id=3 selected-id='.$matchTeams['id'].'>'.$matchTeams['teamName'].'</option>';
                                }
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group match_winner_container">
                            <label for="">Highest Run Scorer By Team:</label>
                            <div class="mb-3">
                              <select class="custom-select mostRunTeam1">
                              <option selected disabled="">Select</option>
                              <?php
                              foreach($updateMatchResult->matchPlayersTeam1 as $matchTeamsPlayer1){
                                if ($updateMatchResult->mostRunPlayer1==$matchTeamsPlayer1['id']) {
                                  echo '<option class="matchResult" selected contest-id=5 selected-id='.$matchTeamsPlayer1['id'].' team-id='.$matchTeamsPlayer1['teamId'].'>'.$matchTeamsPlayer1['firstName'] .$matchTeamsPlayer1['lastName'].'</option>';
                                }else{
                                    echo '<option class="matchResult" contest-id=5 selected-id='.$matchTeamsPlayer1['id'].' team-id='.$matchTeamsPlayer1['teamId'].'>'.$matchTeamsPlayer1['firstName'] .$matchTeamsPlayer1['lastName'].'</option>';
                                }
                              }
                              ?>
                            </select>
                          </div>
                            <select class="custom-select mostRunTeam2">
                              <option selected disabled="">Select</option>
                              <?php
                              foreach($updateMatchResult->matchPlayersTeam2 as $matchTeamsPlayer2){
                                if ($updateMatchResult->mostRunPlayer2==$matchTeamsPlayer2['id']) {
                                  echo '<option class="matchResult" selected contest-id=5 selected-id='.$matchTeamsPlayer2['id'].' team-id='.$matchTeamsPlayer2['teamId'].'>'.$matchTeamsPlayer2['firstName'].$matchTeamsPlayer2['lastName'].'</option>';
                                }else{
                                  echo '<option class="matchResult" contest-id=5 selected-id='.$matchTeamsPlayer2['id'].' team-id='.$matchTeamsPlayer2['teamId'].'>'.$matchTeamsPlayer2['firstName'].$matchTeamsPlayer2['lastName'].'</option>';
                                }
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group match_winner_container">
                            <label for="">Highest Wicket Taker:</label>
                            <div class="mb-3">
                            <select class="custom-select mostWicketTeam1">
                              <option selected disabled="">Select</option>
                              <?php
                              foreach($updateMatchResult->matchPlayersTeam1 as $matchTeamsPlayer1){
                                if ($updateMatchResult->mostWicketPlayer1==$matchTeamsPlayer1['id']) {
                                  echo '<option class="matchResult" selected contest-id="6" selected-id='.$matchTeamsPlayer1['id'].' team-id='.$matchTeamsPlayer1['teamId'].'>'.$matchTeamsPlayer1['firstName'] .$matchTeamsPlayer1['lastName'].'</option>';
                                }else{
                                    echo '<option  class="matchResult" contest-id="6" selected-id='.$matchTeamsPlayer1['id'].' team-id='.$matchTeamsPlayer1['teamId'].'>'.$matchTeamsPlayer1['firstName'] .$matchTeamsPlayer1['lastName'].'</option>';
                                }
                              }
                              ?>
                            </select>
                          </div>
                            <select class="custom-select mostWicketTeam2">
                              <option selected disabled="">Select</option>
                              <?php
                              foreach($updateMatchResult->matchPlayersTeam2 as $matchTeamsPlayer2){
                                if ($updateMatchResult->mostWicketPlayer1==$matchTeamsPlayer2['id']) {
                                  echo '<option class="matchResult" selected contest-id=6 selected-id='.$matchTeamsPlayer2['id'].' team-id='.$matchTeamsPlayer2['teamId'].'>'.$matchTeamsPlayer2['firstName'].$matchTeamsPlayer2['lastName'].'</option>';
                                }else{
                                    echo '<option class="matchResult" contest-id=6 selected-id='.$matchTeamsPlayer2['id'].' team-id='.$matchTeamsPlayer2['teamId'].'>'.$matchTeamsPlayer2['firstName'].$matchTeamsPlayer2['lastName'].'</option>';
                                }
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group text-center">
                            <button type="submit" class="btn btn-sm foodBtn updateMatchDetailsBtn" name="updateMatchDetails"> SAVE </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
