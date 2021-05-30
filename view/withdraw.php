<?php
require_once CONTROLLER_DIR.'userAddBank.php'; 
require_once VIEW_DIRECTORY.'receiverHeader.php';
?>
<!DOCTYPE html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="styles/login.css" />
<script src="js/addBankDetails.js?v={jsversion()}"></script>
<div class="container-fluid bgImg" style="margin-top: -97px;">
  <div class="loginFormsSection">
    <div class="loginSectionMain">
      <div class="container">
        <div class="row justify-content-center no-gutters">
          <div class="col-12 col-sm-8 col-md-7 col-lg-6 col-xl-6 loginFormSection bg-white">
            <div class="row text-center no-gutters" style="cursor: pointer;">
              <div class="col-12 btn-light border reslgbtn p-2">Withdraw Money</div>
            </div>
            <div class="row justify-content-center no-gutters">
              <div class="col-sm-12 p-0">
                <div class="receiverLoginSection">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-12">
                        <form id="withdrawAmount">
                          <div class="form-group">
                            <label for="">Amount:</label>
                            <input type="text" name="amount" class="form-control" required>
                          </div>
                          <div class="form-group text-center">
                            <button type="submit" class="btn btn-sm foodBtn" name="withdrawAmount"> Request </button>
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
    </div>
  </div>
</div>

</body>
</html>
