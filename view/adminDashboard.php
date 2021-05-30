<?php
//require_once CONTROLLER_DIR.'userLogin.php'; 
require_once VIEW_DIRECTORY.'adminHeader.php';
?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="styles/adminDashboard.css" />
<script src="js/login.js?v={jsversion()}"></script>
<div class="container-fluid bgImg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-4">
            <div class="betWinsModelContainer p-2 bg-light border text-white shadow-lg">
              <h3 class="text-center bg-secondary border">Tournaments</h3>
              <div class="createTournamentContainer">
                <a href="./cricket-tournament-create" class="btn btn-outline-primary btn-sm btn-block mb-2">Create New Tournament</a>
                <a href="./admin-tournament-list" class="btn btn-outline-primary btn-sm btn-block mb-2">Tournament List</a>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="betWinsModelContainer p-2 bg-light border text-white shadow-lg">
              <h3 class="text-center bg-secondary border">Matches</h3>
              <div class="createTournamentContainer">
                <a href="./create-match" class="btn btn-outline-primary btn-sm btn-block mb-2">Create New Match</a>
                <a href="./admin-match-list" class="btn btn-outline-primary btn-sm btn-block mb-2">Matches List</a>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="betWinsModelContainer p-2 bg-light border text-white shadow-lg">
              <h3 class="text-center bg-secondary border">Players</h3>
              <div class="createTournamentContainer">
                <a href="!#" class="btn btn-outline-primary btn-sm btn-block mb-2">Create New Player</a>
                <a href="!#" class="btn btn-outline-primary btn-sm btn-block mb-2">Players List</a>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="betWinsModelContainer p-2 bg-light border text-white shadow-lg mt-4">
              <h3 class="text-center bg-secondary border">Teams</h3>
              <div class="createTournamentContainer">
                <a href="!#" class="btn btn-outline-primary btn-sm btn-block mb-2">Create New Teams</a>
                <a href="!#" class="btn btn-outline-primary btn-sm btn-block mb-2">Team List</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

</body>
</html>
