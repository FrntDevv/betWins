<?php
require_once CONTROLLER_DIR.'userLogin.php'; 
require_once VIEW_DIRECTORY.'homeHeader.php';
?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="styles/login.css" />
<script src="js/login.js?v={jsversion()}"></script>
<div class="container-fluid bgImg" style="margin-top: -97px;">
  <div class="loginFormsSection">
    <div class="loginSectionMain">
      <div class="container">
        <div class="row justify-content-center no-gutters">
          <div class="col-12 col-sm-8 col-md-7 col-lg-6 col-xl-6 loginFormSection bg-white">
            <div class="row text-center no-gutters" style="cursor: pointer;">
              <div class="col-12 btn-light border reslgbtn p-2">User Login</div>
            </div>
            <div class="row justify-content-center no-gutters">
              <div class="col-sm-12 p-0">
                <div class="receiverLoginSection">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-12">
                        <form id="receiverLogin">
                          <div class="form-group">
                            <label for="">User Email:</label>
                            <input type="text" name="receiver_email" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label for="">User Password:</label>
                            <input type="password" name="receiver_password" class="form-control" required>
                          </div>
                          <div class="form-group text-center">
                            <button type="submit" class="btn btn-sm foodBtn" name="receiverLogin">Login</button>
                          </div>
                        </form>
                      </div>
                      <div class="col-sm-12 text-center">
                        <small> If you don't have account <a href=<?php echo "./user-registration"?>>Create Now</a></small>
                      </div>
                    </div>
                  </div>
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
