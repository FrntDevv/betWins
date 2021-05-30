<?php
require_once CONTROLLER_DIR.'userAddBank.php'; 
require_once VIEW_DIRECTORY.'homeHeader.php';
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
              <div class="col-12 btn-light border reslgbtn p-2">Bank Account Details</div>
            </div>
            <div class="row justify-content-center no-gutters">
              <div class="col-sm-12 p-0">
                <div class="receiverLoginSection">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-12">
                        <form id="userBankDetails">
                          <div class="form-group">
                            <label for="">Bank Name:</label>
                            <input type="text" name="bank_name" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label for="">Account No:</label>
                            <input type="password" name="account_no" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label for="">IFSC Code:</label>
                            <input type="password" name="ifsc_code" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label for="">Account Holder Name:</label>
                            <input type="password" name="account_holder_name" class="form-control" required>
                          </div>
                          <div class="form-group text-center">
                            <button type="submit" class="btn btn-sm foodBtn" name="addBankDetails"> + ADD </button>
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
