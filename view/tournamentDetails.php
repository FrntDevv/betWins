<?php
require_once CONTROLLER_DIR.'tournamentDetails.php';
require_once VIEW_DIRECTORY.'homeHeader.php';
?>
<link rel="stylesheet" href="./styles/hospital_registration.css" />
<script src="./js/tournamentDetails.js"></script>
<div class="container-fluid bgImg mt-5">
  <div class="container shadow" style="background-color: floralwhite;">
    <div class="row justify-content-center">
        <div class="col-lg-12">
        <?php $tournamentData = $tournamentDetails->tournamenDetails;?>
        <h1 class="text-center mt-3">Tournament Details</h1>
        <hr class="bg-warning">
        <form id="tournaments-details-form">
        <table class="table table-bordered table-striped table-sm">
            <tbody>
                <tr>
                    <th>Name:</th>
                    <td colspan="2">
                        <input type="text" value="<?php echo $tournamentData['tournamentName']?>" class="form-control" name="tourname_name">
                        <input type="hidden" value="<?php echo $tournamentData['tournament_id']?>" class="form-control" name="tourname_id">
                    </td>
                </tr>
                <?php foreach ($tournamentData['teams'] as $key =>$value) {
                    $teamNum = $key+1;
                echo '<tr>
                        <th colspan="3" class="text-center"><h4 class="text-primary">margin</h4>
                        
                    </tr>
                    <tr>
                        <th colspan="3" class="text-center teamNumber"><h4 class="text-primary ">Team '.$teamNum.'</h4>
                        <input type="hidden" name="team['.$key.'][teamId]" value="'.$value['teamId'].'"></th>
                    </tr>
                    <tr>
                        <th scope="col">Team Name</th>
                        <td colspan="2" class="text-center"><input type="text" name="team['.$key.'][teamName]" value="'.$value['teamName'].'" class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col">Most Hit Rate</th>
                        <td colspan="2" class="text-center"><input type="text"  name="team['.$key.'][mostFourHitRate]" value="'.$value['mostFourHitRate'].'" class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col">Most Hit Six Rate</th>
                        <td colspan="2" class="text-center"><input type="text" name="team['.$key.'][mostSixHitRate]" value="'.$value['mostSixHitRate'].'" class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col">Tournament Win Rate</th>
                        <td colspan="2" class="text-center"><input type="text" name="team['.$key.'][tournamentWinRate]" value="'.$value['tournamentWinRate'].'" class="form-control"></td>
                    </tr>
                    <tr class="text-center text-warning"><th colspan="3">'.$value['teamName'].' Players</th></tr>';
                            foreach ($value['players'] as $key2 => $value2) {
                                $in = $key2+1;
                                echo '
                                <tr>
                                <th>'.$value2['name'].'</th>
                                    <td>
                                        <div class="input-group">
                                        <input type="hidden" class="form-control" value="'.$value2['id'].'"
                                        name="team['.$key.'][players]['.$key2.'][id]">
                                        <input type="text" class="form-control" value="'.$value2['battingRate'].'"
                                        name="team['.$key.'][players]['.$key2.'][battingRate]">
                                        <div class="input-group-append">
                                          <span class="input-group-text">Batting Rate</span>
                                        </div>
                                      </div>
                                        </td>
                                        <td>
                                          <div class="input-group">
                                        <input type="text" class="form-control" value="'.$value2['wicketRate'].'">
                                        <div class="input-group-append">
                                          <span class="input-group-text">Wicket Rate</span>
                                        </div>
                                      </div>
                                        </td>
                                </tr>';
                            }
                            '<tr><th colspan="3" class="py-2 bg-success"></tr>';
                        }
                    ?>
                <tr>
                    <td colspan="3"><button type="submit" name="tournamentDetailsUpdate" class="btn btn-primary btn-lg btn-block">Save Data</button></td>
                </tr> 
            </tbody>
        </table>
    </form>

        </div>
    </div>
  </div>
</div>
</body>

</html>