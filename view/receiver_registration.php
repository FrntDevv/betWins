<?php
require_once CONTROLLER_DIR.'user_registration.php';
require_once VIEW_DIRECTORY.'homeHeader.php';
?>
<link rel="stylesheet" type="text/css" href="./styles/receiver_registration.css" />
<script type="text/javascript" src="./js/receiver_registration.js"></script>
<div class="container-fluid bgImg" style="margin-top:-40px;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
        <div class="userSignupFormdiv my-5 p-3 p-sm-5">
          <div class="form-group">
            <h2 class="text-center">Register</h2>
          </div>
          <form id="receiverSignupForm">
            <div class="form-group">
              <label>Full Name:</label>
              <input type="text" name="user_name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Email:</label>
              <input type="email" name="email_id" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Mobile:</label>
              <input type="text" name="mobile_number" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Date of Birth:</label>
                <input type="date" name="user_dob" class="form-control" required>
              
            </div>
            <div class="form-group">
              <label>Password:</label>
              <input type="password" name="user_password" class="form-control" required>
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn foodBtn userRegistrationBtn" name="userDataSubmit">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>