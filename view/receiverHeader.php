<?php
  require_once CONTROLLER_DIR.'receiver_dashboard.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="includes/bootstrap/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" integrity="sha256-zmfNZmXoNWBMemUOo1XUGFfc0ihGGLYdgtJS3KCr/l0=" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styles/home.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
</head>
<body>
  <link rel="stylesheet" type="text/css" href="styles/login.css" />
  <script src="js/homeheader.js"></script>
  <nav class="navbar navbar-expand-lg bloodBankHeader fixed-top">
    <a class="navbar-brand" href="./home">Cricket Betting</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link wallet" href="./add-money">Balance <?php echo $receiverDashboard->userData['walletBalance']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link wallet" href="./my-bets">My Bets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link wallet" href="./withdraw">Withdraw</a>
          </li>
          <li class="nav-item">
            <a class="nav-link wallet" href="./transctions">Transctions</a>
          </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="./dashboard">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link userLogout" href="javascript:void(0);">Logout</a>
          </li>
      </ul>
    </div>
  </nav>
  <div class="p-4 mb-5"></div>
</body>
</html>