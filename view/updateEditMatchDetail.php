<?php
require_once CONTROLLER_DIR.'updateEditMatchDetails.php';
require_once VIEW_DIRECTORY.'homeHeader.php';
?>
<link rel="stylesheet" href="./styles/hospital_registration.css" />
<script src="./js/tournamentDetails.js"></script>
<div class="container-fluid bgImg mt-5">
  <div class="container shadow" style="background-color: floralwhite;">
    <div class="row justify-content-center">
        <div class="col-lg-12">
        <?php $matchData = $matchDetails->matchDetails?>
        <h1 class="text-center mt-3">Match Details</h1>
        <hr class="bg-warning">
        
        <form id="match-details-form">
            <div class="row">
            <div class="col-lg-12">
        <table class="table table-hover table-bordered table-striped table-sm">
            <tbody>
                <tr>
                    <th>Name:</th>
                    <td colspan="2">
                        <input type="text" value="<?php echo $matchData['tournamentName']?>" class="form-control" name="tournament_name" readonly>
                    </td>
                </tr>

                    <tr>
                        <th scope="col"> Start Timing</th>
                        <td colspan="2" class="text-center"><input type="text" name="match_time" 
                            value="<?php echo $matchData['matchTime']?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col">Match Date</th>
                        <td colspan="2" class="text-center"><input type="text" name="match_date" 
                            value="<?php echo $matchData['matchDate']?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col">Match Venue </th>
                        <td colspan="2" class="text-center"><input type="text" name="match_date" 
                            value="<?php echo $matchData['matchVenue']?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col">Most Run Rate </th>
                        <td colspan="2" class="text-center"><input type="text" name="battingRate" 
                            value="<?php echo $matchData['battingRate']?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col">Most Wicket Rate </th>
                        <td colspan="2" class="text-center"><input type="text" name="bowlingRate" 
                            value="<?php echo $matchData['bowlingRate']?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col"> Match Status </th>
                        <td colspan="2" class="text-center"><input type="text" name="matchStatus" 
                            value="<?php echo $matchData['matchStatus']?>" class="form-control"></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
            <div class="col-lg-6">
                <div class="table-responsive" style="background-color: #c6fcff;">
            <table class="table table-bordered table-striped table-sm">
            <tbody>
                    <tr>
                        <th scope="col" colspan="2" class="text-center text-primary"> <?php echo $matchData['teamFirstName']?> 
                            <input type="hidden" value="<?php echo $matchData['teamFirstId']?>" name="teamFirstId">
                        </th>
                    </tr>
                    <tr>
                        <th scope="col"> Winning Rate </th>
                        <td class="text-center"><input type="text" name="team1winningRate" 
                            value="<?php echo $matchData['team1winningRate']?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col">Toss Winning Rate </th>
                        <td class="text-center"><input type="text" name="team1TossWinRate" 
                            value="<?php echo $matchData['team1TossWinRate']?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col"> Most Four Rate </th>
                        <td class="text-center"><input type="text" name="team1MostFourRate" 
                    
                            value="<?php echo $matchData['team1MostFourRate']?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col"> Most Six Rate </th>
                        <td class="text-center"><input type="text" name="team1MostSixRate" 
                    
                            value="<?php echo $matchData['team1MostSixRate']?>" class="form-control"></td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
            <div class="col-lg-6">
                <div class="table-responsive" style="background-color: #c6fcff;">
            <table class="table table-bordered table-striped table-sm">
            <tbody>
                    <tr>
                        <th scope="col" colspan="2" class="text-center text-primary"><?php echo $matchData['teamSecondName']?>
                            <input type="hidden" value="<?php echo $matchData['teamSecondId']?>" name="teamSecondId">
                        </th>
                    </tr>
                    <tr>
                        <th scope="col"> Winning Rate </th>
                        <td class="text-center"><input type="text" name="team2winningRate" 
                            value="<?php echo $matchData['team2winningRate']?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col">Toss Winning Rate </th>
                        <td class="text-center"><input type="text" name="team2TossWinRate" 
                            value="<?php echo $matchData['team2TossWinRate']?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col"> Most Four Rate </th>
                        <td class="text-center"><input type="text" name="team2MostFourRate" 
                    
                            value="<?php echo $matchData['team2MostFourRate']?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col"> Most Six Rate </th>
                        <td class="text-center"><input type="text" name="team2MostSixRate" 
                    
                            value="<?php echo $matchData['team2MostsixRate']?>" class="form-control"></td>
                    </tr>
                    
            </tbody>
        </table>
    </div>
</div>
            <div class="col-lg-12">
            <table class="table table-hover table-bordered table-striped table-sm">
            <tbody>
                    <tr>
                        <td colspan="3">
                            <button type="submit" name="matchDetailsUpdate" class="btn btn-primary btn-lg btn-block">Save Data</button>
                        </td>
                    </tr> 
            </tbody>
        </table>
    </div>
</div>
    </form>

        </div>
    </div>
  </div>
</div>
</body>

</html>