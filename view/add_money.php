<?php
require_once CONTROLLER_DIR."addMoney.php";
require_once VIEW_DIRECTORY."receiverHeader.php";
?>
<link rel="stylesheet" type="text/css" href="./styles/receiver_registration.css" />
<script type="text/javascript" src="./js/add_money.js"></script>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
  <?php if(!isset($_SESSION['payment']['order_id'])){
    echo "<div class='row justify-content-center align-items-center' style='height:80vh;'><div class='col-sm-6 shadow py-5 px-3 border'>
        <label class='bg-light' for='demo'>Add Money:</label>
          <div class='input-group mb-3'>
            <input type='text' class='form-control depositAmount' placeholder='Add up to 200-20000'>
            <div class='input-group-append'>
              <button class='input-group-tex btn btn-primary addMoney'>Add Money</button>
            </div>
          </div></div></div></div>";
    }else{
      $amount = $_SESSION['payment']['amount'];
      $order_id = $_SESSION['payment']['order_id'];
      echo '<div class="container">
      <div class="row justify-content-center">
        <div class="col-6 bg-white text-center py-5">
          <p> By click pay secure, you will be redirected to the payment page, Please don not press any  button while payment is in process</p>
          <form action="verifyPayment" method="POST">
            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_FEDUc4HtQcznIm" data-currency="INR" data-order_id="'.$order_id.'" data-buttontext="Pay Secure" data-name="Cricket Betting" data-description="Payment for your order" data-prefill.name="'.$_SESSION['receiverSession']['name'].'" data-prefill.contact="'.$_SESSION['receiverSession']['mobile'].'" data-prefill.email="'.$_SESSION['receiverSession']['email_id'].'" data-image="" data-amount="'.$amount.'"></script>
            <input type="hidden" custom="Hidden Element" name="hidden">
          </form>
        </div>
      </div>
    </div>';
    }
  ?>
</div>
</div>
</div>
<?php
require_once VIEW_DIRECTORY."footer.php";
?>
