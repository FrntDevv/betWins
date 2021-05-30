<?php
require_once CONTROLLER_DIR.'user_registration.php';
require_once VIEW_DIRECTORY.'homeHeader.php'; 
?>
<link rel="stylesheet" href="./styles/hospital_registration.css" />
<script src="./js/hospital_registration.js"></script>
<div class="container-fluid bgImg" style="margin-top: -40px;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6">
        <div class="userSignupFormdiv my-5 p-3 p-sm-5">
          <div class="form-group">
            <h2 class="text-center">Register Hospital</h2>
          </div>
          
          <form id="hospitalSignupForm">
            <div class="form-group">
              <label>Hospital Name:</label>
              <input type="text" name="hospital_name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Email:</label>
              <input type="email" name="email_id" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
            </div>
            <div class="form-group">
              <label>Password:</label>
              <input type="password" name="hospital_password" class="form-control" required>
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn foodBtn restroRegistrationBtn" name="restroRegistrationDataSubmit">Submit</button>
            </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>